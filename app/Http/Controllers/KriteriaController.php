<?php

namespace App\Http\Controllers;

use App\Models\BahanBakar;
use App\Models\JenisBangunan;
use App\Models\JumlahTanggungan;
use App\Models\KepemilikanRumah;
use App\Models\Kriteria;
use App\Models\Pekerjaan;
use App\Models\PendapatanBulanan;
use App\Models\PengeluaranBulanan;
use App\Models\PenyakitTahunan;
use App\Models\TeganganListrik;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();

        $kepemilikanrumah = KepemilikanRumah::all();

        $bahanbakar = BahanBakar::all();

        $teganganlistrik = TeganganListrik::all();

        $jenisbangunan = JenisBangunan::all();

        $jumlahtanggungan = JumlahTanggungan::all();

        $penyakittahunan = PenyakitTahunan::all();

        $pendapatanbulanan = PendapatanBulanan::all();

        $pengeluaranbulanan = PengeluaranBulanan::all();


        $kriteriaData = Kriteria::all();

        $nilai = $kriteriaData->isNotEmpty() ? array_sum($kriteriaData->pluck('kriteria')->toArray()) : 0;

        return view('kriterias.data', [
            'pekerjaan' => $pekerjaan,
            'kepemilikanrumah' => $kepemilikanrumah,
            'bahanbakar' => $bahanbakar,
            'teganganlistrik' => $teganganlistrik,
            'jenisbangunan' => $jenisbangunan,
            'jumlahtanggungan' => $jumlahtanggungan,
            'penyakittahunan' => $penyakittahunan,
            'pendapatanbulanan' => $pendapatanbulanan,
            'pengeluaranbulanan' => $pengeluaranbulanan,
            'nilai' => $nilai,
            'kriterias' => $kriteriaData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriterias.formadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        return view('kriterias.formadd', [
            'kriterias' => $kriteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Kriteria $kriteria)
    {
        $validator = $request->validate([
            'kriteria' => 'required'
        ]);


        $kriteria->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Kriteria $kriteria)
    {
        if ($kriteria->subkriteriase() != null) {
            return redirect('kriterias')->with('error', 'Data kriteria digunakan pada data BLT');
        }
        $kriteria->delete();
        return redirect('kriterias')->with('message', 'Data berhasil dihapus');
    }

    public function editpekerjaan(Pekerjaan $pekerjaan)
    {
        return view('kriterias.subkriterias.pekerjaan', [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatepekerjaan(Request $request, Pekerjaan $pekerjaan)
    {
        $validator = $request->validate([
            'pedagang' => 'required',
            'buruh' => 'required',
            'swasta' => 'required',
            'nelayan' => 'required',
            'petani' => 'required',
            'tidak' => 'required',
        ]);
        $pekerjaan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editkepemilikanrumah(KepemilikanRumah $kepemilikanrumah)
    {
        return view('kriterias.subkriterias.kepemilikanrumah', [
            'kepemilikanrumah' => $kepemilikanrumah
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatekepemilikanrumah(Request $request, KepemilikanRumah $kepemilikanrumah)
    {
        $validator = $request->validate([
            'pribadi' => 'required',
            'ortu' => 'required',
            'sewa' => 'required',
        ]);
        $kepemilikanrumah->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editbahanbakar(BahanBakar $bahanbakar)
    {
        return view('kriterias.subkriterias.bahanbakar', [
            'bahanbakar' => $bahanbakar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatebahanbakar(Request $request, BahanBakar $bahanbakar)
    {
        $validator = $request->validate([
            'gas' => 'required',
            'minyak' => 'required',
            'kayu' => 'required',
        ]);
        $bahanbakar->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editteganganlistrik(TeganganListrik $teganganlistrik)
    {
        return view('kriterias.subkriterias.teganganlistrik', [
            'teganganlistrik' => $teganganlistrik
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateteganganlistrik(Request $request, TeganganListrik $teganganlistrik)
    {
        $validator = $request->validate([
            'dua' => 'required',
            'empat' => 'required',
            'enam' => 'required',
        ]);
        $teganganlistrik->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editjenisbangunan(JenisBangunan $jenisbangunan)
    {
        return view('kriterias.subkriterias.jenisbangunan', [
            'jenisbangunan' => $jenisbangunan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatejenisbangunan(Request $request, JenisBangunan $jenisbangunan)
    {
        $validator = $request->validate([
            'kayu' => 'required',
            'semi' => 'required',
            'beton' => 'required',
        ]);
        $jenisbangunan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editjumlahtanggungan(JumlahTanggungan $jumlahtanggungan)
    {
        return view('kriterias.subkriterias.jumlahtanggungan', [
            'jumlahtanggungan' => $jumlahtanggungan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatejumlahtanggungan(Request $request, JumlahTanggungan $jumlahtanggungan)
    {
        $validator = $request->validate([
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
        ]);
        $jumlahtanggungan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editpenyakittahunan(PenyakitTahunan $penyakittahunan)
    {
        return view('kriterias.subkriterias.penyakittahunan', [
            'penyakittahunan' => $penyakittahunan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatepenyakittahunan(Request $request, PenyakitTahunan $penyakittahunan)
    {
        $validator = $request->validate([
            'usia' => 'required',
            'lumpuh' => 'required',
            'difabel' => 'required',
            'tidak' => 'required',
        ]);
        $penyakittahunan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editpendapatanbulanan(PendapatanBulanan $pendapatanbulanan)
    {
        return view('kriterias.subkriterias.pendapatanbulanan', [
            'pendapatanbulanan' => $pendapatanbulanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatependapatanbulanan(Request $request, PendapatanBulanan $pendapatanbulanan)
    {
        $validator = $request->validate([
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'f' => 'required',
        ]);
        $pendapatanbulanan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }

    public function editpengeluaranbulanan(PengeluaranBulanan $pengeluaranbulanan)
    {
        return view('kriterias.subkriterias.pengeluaranbulanan', [
            'pengeluaranbulanan' => $pengeluaranbulanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatepengeluaranbulanan(Request $request, PengeluaranBulanan $pengeluaranbulanan)
    {
        $validator = $request->validate([
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'f' => 'required',
            'g' => 'required',
        ]);
        $pengeluaranbulanan->update($validator);
        return redirect('kriterias')->with('message', 'Data berhasil diubah');
    }
}
