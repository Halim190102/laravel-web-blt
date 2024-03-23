@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA JUMLAH TANGGUNGAN</h2>

            <form method="POST" action="/jumlahtanggungan/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="a">Lebih dari 8</label>
                    <input type="number" value="{{ $jumlahtanggungan->a }}" class="@error('a') is-invalid @enderror"
                        id="a" name="a" required>
                    @error('a')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="b">5 Sampai 8</label>
                    <input type="number" value="{{ $jumlahtanggungan->b }}" class="@error('b') is-invalid @enderror"
                        id="b" name="b" required>
                    @error('b')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="c">1 Sampai 4</label>
                    <input type="number" value="{{ $jumlahtanggungan->c }}" class="@error('c') is-invalid @enderror"
                        id="c" name="c" required>
                    @error('c')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="d">Tidak Ada</label>
                    <input type="number" value="{{ $jumlahtanggungan->d }}" class="@error('d') is-invalid @enderror"
                        id="d" name="d" required>
                    @error('d')
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
