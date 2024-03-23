@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA PEKERJAAN</h2>

            <form method="POST" action="/pekerjaan/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="pedagang">Pedagang</label>
                    <input type="number" value="{{ $pekerjaan->pedagang }}" class="@error('pedagang') is-invalid @enderror"
                        id="pedagang" name="pedagang" required>
                    @error('pedagang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="buruh">Buruh</label>
                    <input type="number" value="{{ $pekerjaan->buruh }}" class="@error('buruh') is-invalid @enderror"
                        id="buruh" name="buruh" required>
                    @error('buruh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="swasta">Swasta</label>
                    <input type="number" value="{{ $pekerjaan->swasta }}" class="@error('swasta') is-invalid @enderror"
                        id="swasta" name="swasta" required>
                    @error('swasta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nelayan">Nelayan</label>
                    <input type="number" value="{{ $pekerjaan->nelayan }}" class="@error('nelayan') is-invalid @enderror"
                        id="nelayan" name="nelayan" required>
                    @error('nelayan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="petani">Petani/Berkebun</label>
                    <input type="number" value="{{ $pekerjaan->petani }}" class="@error('petani') is-invalid @enderror"
                        id="petani" name="petani" required>
                    @error('petani')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tidak">Tidak Bekerja/Ibu Rumah Tangga</label>
                    <input type="number" value="{{ $pekerjaan->tidak }}" class="@error('tidak') is-invalid @enderror"
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
