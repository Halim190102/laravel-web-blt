<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Http\Requests\StorePostRequest; // Corrected the namespace
use App\Http\Requests\UpdatePostRequest; // Corrected the namespace
use App\Models\BahanBakar;
use App\Models\JenisBangunan;
use App\Models\JumlahTanggungan;
use App\Models\KepemilikanRumah;
use App\Models\Kriteria;
use App\Models\Pekerjaan;
use App\Models\PendapatanBulanan;
use App\Models\Penduduk;
use App\Models\PengeluaranBulanan;
use App\Models\PenyakitTahunan;
use App\Models\TeganganListrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantu = [];
        $dataBantuan = Bantuan::with('pendudukse')->get();
        $kriteria = Kriteria::all();
        $pekerjaan = Pekerjaan::all();
        $kepemilikanrumah = KepemilikanRumah::all();
        $bahanbakar = BahanBakar::all();
        $teganganlistrik = TeganganListrik::all();
        $jenisbangunan = JenisBangunan::all();
        $jumlahtanggungan = JumlahTanggungan::all();
        $penyakittahunan =  PenyakitTahunan::all();
        $pendapatanbulanan = PendapatanBulanan::all();
        $pengeluaranbulanan = PengeluaranBulanan::all();

        foreach ($dataBantuan as $bantuan) {
            $bantu[] = [
                'bantuan' => $bantuan,
                'nilai' => $this->mfep($bantuan, $kriteria, $pekerjaan, $kepemilikanrumah, $bahanbakar, $teganganlistrik, $jenisbangunan, $jumlahtanggungan, $penyakittahunan, $pendapatanbulanan, $pengeluaranbulanan)
            ];
        }

        usort($bantu, function ($a, $b) {
            if ($a['nilai'] == $b['nilai']) {
                return strcmp($a['bantuan']->pendudukse->nama, $b['bantuan']->pendudukse->nama);
            };
            return $a['nilai'] > $b['nilai'] ? -1 : 1;
        });

        return view('bantuans.data', [
            'bantu' => $bantu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availablePenduduk = Penduduk::whereNotIn('id', Bantuan::pluck('id_penduduk'))->get();

        return view('bantuans.formadd', compact('availablePenduduk'));

        $penduduk = Penduduk::all();
        if ($penduduk->count() <= 0) {
            return redirect('bantuans')->with('error', 'Data penduduk masih kosong');
        }
        return view('bantuans.formadd')->with([
            'penduduks' => $penduduk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_penduduk' => 'required|unique:bantuans',
            'kepemilikan_rumah' => 'required',
            'bahan_bakar' => 'required',
            'tegangan_listrik' => 'required',
            'jenis_bangunan' => 'required',
            'jumlah_tanggungan' => 'required',
            'penyakit_tahunan' => 'required',
            'pendapatan_perbulan' => 'required',
            'pengeluaran_perbulan' => 'required',
            'foto_ktp' => 'required|file|mimes:pdf',
            'foto_kk' => 'required|file|mimes:pdf',
            'surat_miskin' => 'required|file|mimes:pdf',
            'foto_rumah' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $ktp = $request->file('foto_ktp');
            $nama_ktp = time() . rand(1, 99999999) . "." . $ktp->getClientOriginalExtension();
            $ktp->move('uploads', $nama_ktp);
            $validator['foto_ktp'] = $nama_ktp;
        }
        if ($request->hasFile('foto_kk')) {
            $kk = $request->file('foto_kk');
            $nama_kk =  time() . rand(1, 99999999) . "." . $kk->getClientOriginalExtension();
            $kk->move('uploads', $nama_kk);
            $validator['foto_kk'] = $nama_kk;
        }
        if ($request->hasFile('foto_rumah')) {
            $rumah = $request->file('foto_rumah');
            $nama_rumah =  time() . rand(1, 99999999) . "." . $rumah->getClientOriginalExtension();
            $rumah->move('uploads', $nama_rumah);
            $validator['foto_rumah'] = $nama_rumah;
        }
        if ($request->hasFile('surat_miskin')) {
            $miskin = $request->file('surat_miskin');
            $nama_miskin =  time() . rand(1, 99999999) . "." . $miskin->getClientOriginalExtension();
            $miskin->move('uploads', $nama_miskin);
            $validator['surat_miskin'] = $nama_miskin;
        }

        Bantuan::create($validator);
        return redirect('bantuans')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bantuan $bantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bantuan $bantuan)
    {

        return view('bantuans.formadd', [
            'bantuans' => $bantuan,
            'availablePenduduk' => Penduduk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $validator = [
            'kepemilikan_rumah' => 'required',
            'bahan_bakar' => 'required',
            'tegangan_listrik' => 'required',
            'jenis_bangunan' => 'required',
            'jumlah_tanggungan' => 'required',
            'penyakit_tahunan' => 'required',
            'pendapatan_perbulan' => 'required',
            'pengeluaran_perbulan' => 'required',
        ];



        if ($request->hasFile('foto_ktp')) {
            File::delete('uploads/' . $bantuan->foto_ktp);
            $ktp = $request->file('foto_ktp');
            $nama_ktp = time() . rand(1, 99999999) . "." . $ktp->getClientOriginalExtension();
            $ktp->move('uploads', $nama_ktp);
            $validator['foto_ktp'] = $nama_ktp;
        } else {
            unset($validator['foto_ktp']);
        }
        if ($request->hasFile('foto_kk')) {
            File::delete('uploads/' . $bantuan->foto_kk);
            $kk = $request->file('foto_kk');
            $nama_kk =  time() . rand(1, 99999999) . "." . $kk->getClientOriginalExtension();
            $kk->move('uploads', $nama_kk);
            $validator['foto_kk'] = $nama_kk;
        } else {
            unset($validator['foto_kk']);
        }
        if ($request->hasFile('foto_rumah')) {
            File::delete('uploads/' . $bantuan->foto_rumah);
            $rumah = $request->file('foto_rumah');
            $nama_rumah =  time() . rand(1, 99999999) . "." . $rumah->getClientOriginalExtension();
            $rumah->move('uploads', $nama_rumah);
            $validator['foto_rumah'] = $nama_rumah;
        } else {
            unset($validator['foto_rumah']);
        }
        if ($request->hasFile('surat_miskin')) {
            File::delete('uploads/' . $bantuan->surat_miskin);
            $miskin = $request->file('surat_miskin');
            $nama_miskin =  time() . rand(1, 99999999) . "." . $miskin->getClientOriginalExtension();
            $miskin->move('uploads', $nama_miskin);
            $validator['surat_miskin'] = $nama_miskin;
        } else {
            unset($validator['surat_miskin']);
        }

        if ($request->id_penduduk != $bantuan->id_penduduk) {
            $validator['id_penduduk'] = 'required|unique:bantuans';
        }

        $valid = $request->validate($validator);

        $bantuan->update($valid);
        return redirect('bantuans')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bantuan $bantuan)
    {
        File::delete(['uploads/' . $bantuan->foto_ktp, 'uploads/' . $bantuan->foto_kk, 'uploads/' . $bantuan->foto_rumah, 'uploads/' . $bantuan->surat_miskin]);
        $bantuan->delete();

        return redirect('bantuans')->with('message', 'Data berhasil dihapus');
    }



    protected function mfep($data, $kritera, $pekerjaan, $kepemilikanrumah, $bahanbakar, $teganganlistrik, $jenisbangunan, $jumlahtanggungan, $penyakittahunan, $pendapatanbulanan, $pengeluaranbulanan)
    {
        $nilaiKepemilikanRumah = ($data->kepemilikan_rumah === '0') ? $kepemilikanrumah[0]->pribadi : (($data->kepemilikan_rumah === '1') ? $kepemilikanrumah[0]->ortu : $kepemilikanrumah[0]->sewa);
        $nilaiBahanBakar = ($data->bahan_bakar === '2') ? $bahanbakar[0]->kayu : (($data->bahan_bakar === '1') ? $bahanbakar[0]->minyak : $bahanbakar[0]->gas);
        $nilaiTeganganListrik = ($data->tegangan_listrik === '0') ? $teganganlistrik[0]->dua : (($data->tegangan_listrik === '1') ? $teganganlistrik[0]->empat : $teganganlistrik[0]->enam);
        $nilaiJenisBangunan = ($data->jenis_bangunan === '0') ? $jenisbangunan[0]->kayu : (($data->jenis_bangunan === '1') ? $jenisbangunan[0]->semi : $jenisbangunan[0]->beton);
        $nilaiJumlahTanggungan = ($data->jumlah_tanggungan > 8) ? $jumlahtanggungan[0]->a : (($data->jumlah_tanggungan > 4 && $data->jumlah_tanggungan < 9) ? $jumlahtanggungan[0]->b : (($data->jumlah_tanggungan > 0 && $data->jumlah_tanggungan < 5) ? $jumlahtanggungan[0]->c : $jumlahtanggungan[0]->d));
        $nilaiNilaiAset = ($data->penyakit_tahunan === '0') ? $penyakittahunan[0]->usia : (($data->penyakit_tahunan === '1') ? $penyakittahunan[0]->lumpuh : (($data->penyakit_tahunan === '2') ? $penyakittahunan[0]->difabel : $penyakittahunan[0]->tidak));
        $nilaiPendapatanPerbulan = ($data->pendapatan_perbulan <= 600000) ? $pendapatanbulanan[0]->a : (($data->pendapatan_perbulan > 600000 && $data->pendapatan_perbulan <= 1000000) ? $pendapatanbulanan[0]->b : (($data->pendapatan_perbulan > 1000000 && $data->pendapatan_perbulan <= 1500000) ? $pendapatanbulanan[0]->c : (($data->pendapatan_perbulan > 1500000 && $data->pendapatan_perbulan <= 2000000) ? $pendapatanbulanan[0]->d : (($data->pendapatan_perbulan > 2000000 && $data->pendapatan_perbulan <= 2500000) ? $pendapatanbulanan[0]->e : $pendapatanbulanan[0]->f))));
        $nilaiPengeluaranPerbulan = ($data->pengeluaran_perbulan <= 600000) ? $pengeluaranbulanan[0]->a : (($data->pengeluaran_perbulan > 600000 && $data->pengeluaran_perbulan <= 1000000) ? $pengeluaranbulanan[0]->b : (($data->pengeluaran_perbulan > 1000000 && $data->pengeluaran_perbulan <= 1500000) ? $pengeluaranbulanan[0]->c : (($data->pengeluaran_perbulan > 1500000 && $data->pengeluaran_perbulan <= 2000000) ? $pengeluaranbulanan[0]->d : (($data->pengeluaran_perbulan > 2000000 && $data->pengeluaran_perbulan <= 2500000) ? $pengeluaranbulanan[0]->e : (($data->pengeluaran_perbulan > 2500000 && $data->pengeluaran_perbulan <= 3500000) ? $pengeluaranbulanan[0]->f : $pengeluaranbulanan[0]->g)))));
        $nilaiPekerjaan = ($data->pendudukse->pekerjaan === '0') ? $pekerjaan[0]->pedagang : (($data->pendudukse->pekerjaan === '1') ? $pekerjaan[0]->buruh : (($data->pendudukse->pekerjaan === '2') ? $pekerjaan[0]->swasta : (($data->pendudukse->pekerjaan === '3') ? $pekerjaan[0]->nelayan : (($data->pendudukse->pekerjaan === '4') ? $pekerjaan[0]->petani : $pekerjaan[0]->tidak))));

        $nilai = $kritera->isNotEmpty() ? array_sum($kritera->pluck('kriteria')->toArray()) : 0;


        $totalNilai = (
            ($nilaiPekerjaan * ($kritera[0]->kriteria) / $nilai) +
            ($nilaiKepemilikanRumah * ($kritera[1]->kriteria) / $nilai) +
            ($nilaiBahanBakar * ($kritera[2]->kriteria) / $nilai) +
            ($nilaiTeganganListrik * ($kritera[3]->kriteria) / $nilai) +
            ($nilaiJenisBangunan * ($kritera[4]->kriteria) / $nilai) +
            ($nilaiJumlahTanggungan * ($kritera[5]->kriteria) / $nilai) +
            ($nilaiNilaiAset * ($kritera[6]->kriteria) / $nilai) +
            ($nilaiPendapatanPerbulan * ($kritera[7]->kriteria) / $nilai) +
            ($nilaiPengeluaranPerbulan * ($kritera[8]->kriteria) / $nilai)
        );


        return $totalNilai;
    }
}
