<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penduduks.data', [
            'penduduks' => Penduduk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penduduks.formadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'nik' => 'required|unique:penduduks',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'dusun' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
        ]);

        Penduduk::create($validator);
        return redirect('penduduks')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        return view('penduduks.formadd', [
            'penduduks' => $penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validator = [
            'nama' => 'required',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'pekerjaan' => 'required',
            'gender' => 'required',
            'status_perkawinan' => 'required',
        ];
        if ($request->nik != $penduduk->nik) {
            $validator['nik'] = 'required|unique:penduduks';
        }

        $valid = $request->validate($validator);

        $penduduk->update($valid);
        return redirect('penduduks')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        if ($penduduk->bantuanse != null) {
            return redirect('penduduks')->with('error', 'Data penduduk digunakan pada data BLT');
        }
        $penduduk->delete();
        return redirect('penduduks')->with('message', 'Data berhasil dihapus');
    }
}
