@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA JENIS BANGUNAN</h2>

            <form method="POST" action="/jenisbangunan/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kayu">Kayu</label>
                    <input type="number" value="{{ $jenisbangunan->kayu }}" class="@error('kayu') is-invalid @enderror"
                        id="kayu" name="kayu" required>
                    @error('kayu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="semi">Semi Permanen</label>
                    <input type="number" value="{{ $jenisbangunan->semi }}" class="@error('semi') is-invalid @enderror"
                        id="semi" name="semi" required>
                    @error('semi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="beton">Beton</label>
                    <input type="number" value="{{ $jenisbangunan->beton }}" class="@error('beton') is-invalid @enderror"
                        id="beton" name="beton" required>
                    @error('beton')
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
