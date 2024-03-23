@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA BAHAN BAKAR</h2>

            <form method="POST" action="/bahanbakar/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="gas">Gas</label>
                    <input type="number" value="{{ $bahanbakar->gas }}" class="@error('gas') is-invalid @enderror"
                        id="gas" name="gas" required>
                    @error('gas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="minyak">Minyak Tanah</label>
                    <input type="number" value="{{ $bahanbakar->minyak }}" class="@error('minyak') is-invalid @enderror"
                        id="minyak" name="minyak" required>
                    @error('minyak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kayu">Kayu Bakar</label>
                    <input type="number" value="{{ $bahanbakar->kayu }}" class="@error('kayu') is-invalid @enderror"
                        id="kayu" name="kayu" required>
                    @error('kayu')
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
