@extends('layout.main') @section('content')
    <div class="form-card">
        <div class="form-container">
            <h2>{{ isset($bantuans) ? 'EDIT' : 'TAMBAH' }} DATA PENERIMA BLT<br>DESA KEUDE KRUENG</h2>

            <form method="POST" action="{{ isset($bantuans) ? '/bantuans/' . $bantuans->id : '/bantuans' }}"
                enctype="multipart/form-data">
                @csrf
                @if (isset($bantuans))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="NIK">NIK :</label>
                    <select id="id_penduduk" name="id_penduduk" class="@error('id_penduduk') is-invalid @enderror" required>
                        @foreach ($availablePenduduk as $p)
                            <option value="{{ $p->id }}"
                                {{ (isset($bantuans) && $bantuans->pendudukse->id == $p->id) || old('id_penduduk') == $p->id ? 'selected' : '' }}>
                                {{ $p->nik }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_penduduk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kepemilikan-rumah">Kepemilikan Rumah:</label>
                    <select id="kepemilikan-rumah" name="kepemilikan_rumah"
                        class="@error('kepemilikan_rumah') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('kepemilikan_rumah', isset($bantuans) ? $bantuans->kepemilikan_rumah : '') == '0' ? 'selected' : '' }}>
                            Rumah Pribadi</option>
                        <option value="1"
                            {{ old('kepemilikan_rumah', isset($bantuans) ? $bantuans->kepemilikan_rumah : '') == '1' ? 'selected' : '' }}>
                            Rumah Orang Tua/Anak</option>
                        <option value="2"
                            {{ old('kepemilikan_rumah', isset($bantuans) ? $bantuans->kepemilikan_rumah : '') == '2' ? 'selected' : '' }}>
                            Rumah Sewa</option>
                    </select>
                    @error('kepemilikan_rumah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar:</label>
                    <select id="bahan_bakar" name="bahan_bakar" class="@error('bahan_bakar') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('bahan_bakar', isset($bantuans) ? $bantuans->bahan_bakar : '') == '0' ? 'selected' : '' }}>
                            Gas LPG</option>
                        <option value="1"
                            {{ old('bahan_bakar', isset($bantuans) ? $bantuans->bahan_bakar : '') == '1' ? 'selected' : '' }}>
                            Minyak Tanah</option>
                        <option value="2"
                            {{ old('bahan_bakar', isset($bantuans) ? $bantuans->bahan_bakar : '') == '2' ? 'selected' : '' }}>
                            Kayu Bakar</option>
                    </select>
                    @error('bahan_bakar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tegangan_listrik">Tegangan Listrik:</label>
                    <select id="tegangan_listrik" name="tegangan_listrik"
                        class="@error('tegangan_listrik') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('tegangan_listrik', isset($bantuans) ? $bantuans->tegangan_listrik : '') == '0' ? 'selected' : '' }}>
                            2 Ampere</option>
                        <option value="1"
                            {{ old('tegangan_listrik', isset($bantuans) ? $bantuans->tegangan_listrik : '') == '1' ? 'selected' : '' }}>
                            4 Ampere</option>
                        <option value="2"
                            {{ old('tegangan_listrik', isset($bantuans) ? $bantuans->tegangan_listrik : '') == '2' ? 'selected' : '' }}>
                            6 Ampere</option>
                    </select>
                    @error('tegangan_listrik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_bangunan">Jenis Bangunan:</label>
                    <select id="jenis_bangunan" name="jenis_bangunan" class="@error('jenis_bangunan') is-invalid @enderror"
                        required>
                        <option value="0"
                            {{ old('jenis_bangunan', isset($bantuans) ? $bantuans->jenis_bangunan : '') == '0' ? 'selected' : '' }}>
                            Kayu</option>
                        <option value="1"
                            {{ old('jenis_bangunan', isset($bantuans) ? $bantuans->jenis_bangunan : '') == '1' ? 'selected' : '' }}>
                            Semi Permanen</option>
                        <option value="2"
                            {{ old('jenis_bangunan', isset($bantuans) ? $bantuans->jenis_bangunan : '') == '2' ? 'selected' : '' }}>
                            Beton</option>
                    </select>
                    @error('jenis_bangunan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_tanggungan">Jumlah Tanggungan:</label>
                    <input type="number"
                        value="{{ old('jumlah_tanggungan', isset($bantuans) ? $bantuans->jumlah_tanggungan : '') }}"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        id="jumlah_tanggungan" name="jumlah_tanggungan"
                        class="@error('jumlah_tanggungan') is-invalid @enderror" required>
                    @error('jumlah_tanggungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="penyakit_tahunan">Penyakit Tahunan:</label>
                    <select id="penyakit_tahunan" name="penyakit_tahunan"
                        class="@error('penyakit_tahunan') is-invalid @enderror" required>
                        <option value="0"
                            {{ old('penyakit_tahunan', isset($bantuans) ? $bantuans->penyakit_tahunan : '') == '0' ? 'selected' : '' }}>
                            Karena Usia</option>
                        <option value="1"
                            {{ old('penyakit_tahunan', isset($bantuans) ? $bantuans->penyakit_tahunan : '') == '1' ? 'selected' : '' }}>
                            Lumpuh / Struk</option>
                        <option value="2"
                            {{ old('penyakit_tahunan', isset($bantuans) ? $bantuans->penyakit_tahunan : '') == '2' ? 'selected' : '' }}>
                            Difabel</option>
                        <option value="3"
                            {{ old('penyakit_tahunan', isset($bantuans) ? $bantuans->penyakit_tahunan : '') == '3' ? 'selected' : '' }}>
                            Tidak Ada</option>

                    </select>
                    @error('penyakit_tahunan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pendapatan_perbulan">Pendapatan Per Bulan:</label>
                    <input type="number"
                        value="{{ old('pendapatan_perbulan', isset($bantuans) ? $bantuans->pendapatan_perbulan : '') }}"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="@error('pendapatan_perbulan') is-invalid @enderror" id="pendapatan_perbulan"
                        name="pendapatan_perbulan" required>
                    @error('pendapatan_perbulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pengeluaran_perbulan">Pengeluaran Per Bulan:</label>
                    <input type="number"
                        value="{{ old('pengeluaran_perbulan', isset($bantuans) ? $bantuans->pengeluaran_perbulan : '') }}"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="@error('pengeluaran_perbulan') is-invalid @enderror" id="pengeluaran_perbulan"
                        name="pengeluaran_perbulan" required>
                    @error('pengeluaran_perbulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_ktp">Foto KTP:</label>
                    <input type="file" id="foto_ktp" class="@error('foto_ktp') is-invalid @enderror" name="foto_ktp"
                        value="{{ old('foto_ktp', isset($bantuans) ? $bantuans->foto_ktp : '') }}"
                        {{ isset($bantuans) ? '' : 'required' }}>
                    @error('foto_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_kk">Foto KK:</label>
                    <input type="file" id="foto_kk" class="@error('foto_kk') is-invalid @enderror" name="foto_kk"
                        value="{{ old('foto_kk', isset($bantuans) ? $bantuans->foto_kk : '') }}"
                        {{ isset($bantuans) ? '' : 'required' }}>
                    @error('foto_kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_rumah">Foto Rumah:</label>
                    <input type="file" id="foto_rumah" class="@error('foto_rumah') is-invalid @enderror"
                        name="foto_rumah" value="{{ old('foto_rumah', isset($bantuans) ? $bantuans->foto_rumah : '') }}"
                        {{ isset($bantuans) ? '' : 'required' }}>
                </div>

                <div class="form-group">
                    <label for="surat_miskin">Surat Miskin:</label>
                    <input type="file" id="surat_miskin" class=" @error('surat_miskin') is-invalid @enderror"
                        name="surat_miskin"
                        value="{{ old('surat_miskin', isset($bantuans) ? $bantuans->surat_miskin : '') }}"
                        {{ isset($bantuans) ? '' : 'required' }}>
                    @error('surat_miskin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div style="float: right;">
                    <a href="/bantuans" class="btn_back">Kembali</a>
                    <button type="submit" class="btn_add">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
