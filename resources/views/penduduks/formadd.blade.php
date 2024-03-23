@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>{{ isset($pendudukss) ? 'EDIT' : 'TAMBAH' }} DATA PENDUDUK<br>DESA KEUDE KRUENG</h2>
            <form method="POST" action="{{ isset($penduduks) ? '/penduduks/' . $penduduks->id : '/penduduks' }}"
                enctype="multipart/form-data">
                @csrf
                @if (isset($penduduks))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', isset($penduduks) ? $penduduks->nama : '') }}"
                        class="@error('nama') is-invalid @enderror" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="@error('gender') is-invalid @enderror" required>
                        <option value="laki-laki"
                            {{ old('gender', isset($penduduks) ? $penduduks->gender : '') == 'laki-laki' ? 'selected' : '' }}>
                            Laki-Laki</option>
                        <option value="perempuan"
                            {{ old('gender', isset($penduduks) ? $penduduks->gender : '') == 'perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" id="nik" name="nik"
                        value="{{ old('nik', isset($penduduks) ? $penduduks->nik : '') }}"
                        class="@error('nik') is-invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                        value="{{ old('alamat', isset($penduduks) ? $penduduks->alamat : '') }}"
                        class="@error('alamat') is-invalid @enderror" required>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Dusun</label>
                    <input type="text" id="dusun" name="dusun"
                        value="{{ old('dusun', isset($penduduks) ? $penduduks->dusun : '') }}"
                        class="@error('dusun') is-invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label for="">NO. HP</label>
                    <input type="nomor" id="no_hp" name="no_hp"
                        value="{{ old('no_hp', isset($penduduks) ? $penduduks->no_hp : '') }}"
                        class="@error('no_hp') is-invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label for="">Status Perkawinan</label>
                    <select id="status_perkawinan" name="status_perkawinan"
                        class="@error('status_perkawinan') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('status_perkawinan', isset($penduduks) ? $penduduks->status_perkawinan : '') == '0' ? 'selected' : '' }}>
                            Belum Kawin</option>
                        <option value="1"
                            {{ old('status_perkawinan', isset($penduduks) ? $penduduks->status_perkawinan : '') == '1' ? 'selected' : '' }}>
                            Kawin</option>
                        <option value="2"
                            {{ old('status_perkawinan', isset($penduduks) ? $penduduks->status_perkawinan : '') == '2' ? 'selected' : '' }}>
                            Cerai Hidup</option>
                        <option value="3"
                            {{ old('status_perkawinan', isset($penduduks) ? $penduduks->status_perkawinan : '') == '3' ? 'selected' : '' }}>
                            Cerai Mati</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan</label>
                    <select id="pekerjaan" name="pekerjaan" class="@error('pekerjaan') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '0' ? 'selected' : '' }}>
                            Pedagang</option>
                        <option value="1"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '1' ? 'selected' : '' }}>
                            Buruh</option>
                        <option value="2"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '2' ? 'selected' : '' }}>
                            Swasta</option>
                        <option value="3"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '3' ? 'selected' : '' }}>
                            Nelayan</option>
                        <option value="4"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '4' ? 'selected' : '' }}>
                            Petani/Berkebun</option>
                        <option id="kerja4" value="5"
                            {{ old('pekerjaan', isset($penduduks) ? $penduduks->pekerjaan : '') == '5' ? 'selected' : '' }}>
                            Tidak Bekerja</option>
                    </select>
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                        value="{{ old('tempat_lahir', isset($penduduks) ? $penduduks->tempat_lahir : '') }}"
                        class="@error('tempat_lahir') is-invalid @enderror" required>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', isset($penduduks) ? $penduduks->tanggal_lahir : '') }}"
                        class="@error('tanggal_lahir') is-invalid @enderror" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Agama</label>
                    <select id="agama" name="agama" class="form-control  @error('agama') is-invalid @enderror"
                        required>
                        <option value="0"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '0' ? 'selected' : '' }}>Islam
                        </option>
                        <option value="1"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '1' ? 'selected' : '' }}>
                            Kristen Protestan</option>
                        <option value="2"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '2' ? 'selected' : '' }}>
                            Kristen Katolik</option>
                        <option value="3"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '3' ? 'selected' : '' }}>
                            Hindu</option>
                        <option value="4"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '4' ? 'selected' : '' }}>
                            Buddha</option>
                        <option value="5"
                            {{ old('agama', isset($penduduks) ? $penduduks->agama : '') == '5' ? 'selected' : '' }}>
                            Khonghucu</option>
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div style="float: right;">
                    <a href="/penduduks" class="btn_back">Kembali</a>
                    <button class="btn_add" type="submit">Kirim</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const optionSelect = document.getElementById("kerja4");
        const pekerjaanSelect = document.getElementById("pekerjaan");
        const genderSelect = document.getElementById("gender");
        const perkawinanSelect = document.getElementById("status_perkawinan");

        function kerja() {
            var selectedValue1 = genderSelect.value;
            var selectedValue2 = perkawinanSelect.value;

            if (selectedValue1 === "perempuan" && selectedValue2 !== '0') {
                optionSelect.textContent = 'Ibu Rumah Tangga';
            } else {
                optionSelect.textContent = 'Tidak Bekerja';
            }
        }
        kerja();
        // Menambahkan event listener untuk pemilihan berubah pada elemen "gender"
        genderSelect.addEventListener("change", kerja);
        perkawinanSelect.addEventListener("change", kerja);
    </script>
@endpush
