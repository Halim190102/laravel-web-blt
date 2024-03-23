@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA PENYAKIT TAHUNAN</h2>

            <form method="POST" action="/penyakittahunan/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="usia">Karena Usia</label>
                    <input type="number" value="{{ $penyakittahunan->usia }}" class="@error('usia') is-invalid @enderror"
                        id="usia" name="usia" required>
                    @error('usia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lumpuh">Lumpuh</label>
                    <input type="number" value="{{ $penyakittahunan->lumpuh }}"
                        class="@error('lumpuh') is-invalid @enderror" id="lumpuh" name="lumpuh" required>
                    @error('lumpuh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="difabel">Difabel</label>
                    <input type="number" value="{{ $penyakittahunan->difabel }}"
                        class="@error('difabel') is-invalid @enderror" id="difabel" name="difabel" required>
                    @error('difabel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tidak">Tidak Ada</label>
                    <input type="number" value="{{ $penyakittahunan->tidak }}" class="@error('tidak') is-invalid @enderror"
                        id="tidak" name="tidak" required>
                    @error('tidak')
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
