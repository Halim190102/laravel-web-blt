@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>EDIT NILAI KRITERIA KEPEMILIKAN RUMAH</h2>

            <form method="POST" action="/kepemilikanrumah/update/1 " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="pribadi">Rumah Pribadi</label>
                    <input type="number" value="{{ $kepemilikanrumah->pribadi }}"
                        class="@error('pribadi') is-invalid @enderror" id="pribadi" name="pribadi" required>
                    @error('pribadi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ortu">Rumah Orang Tua/Anak</label>
                    <input type="number" value="{{ $kepemilikanrumah->ortu }}" class="@error('ortu') is-invalid @enderror"
                        id="ortu" name="ortu" required>
                    @error('ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sewa">Rumah Sewa</label>
                    <input type="number" value="{{ $kepemilikanrumah->sewa }}" class="@error('sewa') is-invalid @enderror"
                        id="sewa" name="sewa" required>
                    @error('sewa')
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
