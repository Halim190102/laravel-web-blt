@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA TEGANGAN LISTRIK</h2>

            <form method="POST" action="/teganganlistrik/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="dua">2 Ampere</label>
                    <input type="number" value="{{ $teganganlistrik->dua }}" class="@error('dua') is-invalid @enderror"
                        id="dua" name="dua" required>
                    @error('dua')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="empat">4 Ampere</label>
                    <input type="number" value="{{ $teganganlistrik->empat }}" class="@error('empat') is-invalid @enderror"
                        id="empat" name="empat" required>
                    @error('empat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="enam">6 Ampere</label>
                    <input type="number" value="{{ $teganganlistrik->enam }}" class="@error('enam') is-invalid @enderror"
                        id="enam" name="enam" required>
                    @error('enam')
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
