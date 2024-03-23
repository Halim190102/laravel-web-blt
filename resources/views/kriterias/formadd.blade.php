@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA PENERIMA BLT<br>DESA KEUDE KRUENG</h2>

            <form method="POST" action="/kriterias/{{ $kriterias->id }} " enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" id="nama_kriteria" name="nama_kriteria" value="{{ $kriterias->nama_kriteria }}"
                        class="@error('nama_kriteria') is-invalid @enderror" readonly>
                </div>

                <div class="form-group">
                    <label for="kriteria">Nilai Kriteria</label>
                    <input type="number" value="{{ $kriterias->kriteria }}" class="@error('kriteria') is-invalid @enderror"
                        id="kriteria" name="kriteria" required>
                    @error('kriteria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div style="float: right;">
                    <a href="/kriterias" class="btn_back">Kembali</a>
                    <button type="submit" class="btn_add">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
