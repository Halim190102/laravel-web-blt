@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA PENDAPATAN PERBULAN</h2>

            <form method="POST" action="/pendapatanbulanan/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="a">Rp.600.000 kebawah</label>
                    <input type="number" value="{{ $pendapatanbulanan->a }}" class="@error('a') is-invalid @enderror"
                        id="a" name="a" required>
                    @error('a')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="b">Diatas Rp.600.000 sampai Rp.1.000.000</label>
                    <input type="number" value="{{ $pendapatanbulanan->b }}" class="@error('b') is-invalid @enderror"
                        id="b" name="b" required>
                    @error('b')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="c">Diatas Rp.1.000.000 sampai Rp.1.500.000</label>
                    <input type="number" value="{{ $pendapatanbulanan->c }}" class="@error('c') is-invalid @enderror"
                        id="c" name="c" required>
                    @error('c')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="d">Diatas Rp.1.500.000 sampai Rp.2.000.000</label>
                    <input type="number" value="{{ $pendapatanbulanan->d }}" class="@error('d') is-invalid @enderror"
                        id="d" name="d" required>
                    @error('d')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="e">Diatas Rp.2.000.000 sampai Rp.2.500.000</label>
                    <input type="number" value="{{ $pendapatanbulanan->e }}" class="@error('e') is-invalid @enderror"
                        id="e" name="e" required>
                    @error('e')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="f">Diatas Rp.2.500.000</label>
                    <input type="number" value="{{ $pendapatanbulanan->f }}" class="@error('f') is-invalid @enderror"
                        id="f" name="f" required>
                    @error('f')
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
