@extends('layout.main')
@section('content')
    <div class="card-body">
        @if (session('message') || session('error'))
            <div class="alert {{ session('message') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show"
                role="alert">
                <strong>{{ session('message') ? session('message') : session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


    </div>

    <!-- Table -->
    <div class="tbl_container">
        <h2>Pemberian Kriteria BLT Desa Keude Krueng</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <a href="/bantuans/create" class="btn_add" style="float: right; margin-bottom: 10px;">
                    <i class="fa-solid fa-plus"></i> Tambah Data Penerima
                </a><br><br>

                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Pekerjaan</th>
                    <th>Kepemilikan Rumah</th>
                    <th>Bahan Bakar</th>
                    <th>Tegangan Listrik</th>
                    <th>Jenis Bangunan</th>
                    <th>Jumlah Tanggungan</th>
                    <th>Penyakit Tahunan</th>
                    <th>Pend. Perbulan</th>
                    <th>Peng. Perbulan</th>
                    <th>Foto KTP</th>
                    <th>Foto KK</th>
                    <th>Foto Rumah</th>
                    <th>Surat Miskin</th>
                    <th>Nilai</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bantu as $b)
                    <?php
                    $i = $loop->iteration;
                    $a = $b['bantuan'];
                    $p = $a->pendudukse;
                    ?>
                    <tr>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $i }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $p->nik }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $p->nama }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $p->gender == 'laki-laki' ? 'Laki - Laki' : 'Perempuan' }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $p->alamat }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $p->no_hp }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($p->pekerjaan == '0')
                                Pedagang
                            @elseif ($p->pekerjaan == '1')
                                Buruh
                            @elseif ($p->pekerjaan == '2')
                                Swasta
                            @elseif ($p->pekerjaan == '3')
                                Nelayan
                            @elseif ($p->pekerjaan == '4')
                                Petani/Berkebun
                            @else
                                @if ($p->gender == 'perempuan' && $a->pendudukse->status_perkawinan != '0')
                                    Ibu Rumah Tangga
                                @else
                                    Tidak Bekerja
                                @endif
                            @endif
                        </td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($a->kepemilikan_rumah == '0')
                                Rumah Pribadi
                            @elseif ($a->kepemilikan_rumah == '1')
                                Rumah Orang Tua/Anak
                            @else
                                Rumah Sewa
                            @endif
                        </td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($a->bahan_bakar == '0')
                                Gas LPG
                            @elseif ($a->bahan_bakar == '1')
                                Minyak Tanah
                            @else
                                Kayu Bakar
                            @endif
                        </td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($a->tegangan_listrik == '0')
                                2 Ampere
                            @elseif ($a->tegangan_listrik == '1')
                                4 Ampere
                            @else
                                6 Ampere
                            @endif
                        </td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($a->jenis_bangunan == '0')
                                Kayu
                            @elseif ($a->jenis_bangunan == '1')
                                Semi Permanen
                            @else
                                Beton
                            @endif
                        </td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ $a->jumlah_tanggungan }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>
                            @if ($a->penyakit_tahunan == '0')
                                Karena Usia
                            @elseif ($a->penyakit_tahunan == '1')
                                Lumpuh / Struk
                            @elseif ($a->penyakit_tahunan == '2')
                                Difabel
                            @else
                                Tidak Ada
                            @endif
                        </td>

                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ 'Rp. ' . number_format($a->pendapatan_perbulan, 0, '.') }}</td>
                        <td <?php echo $i < 19 ? 'style="color: rgba(0, 141, 0, 0.859);"' : 'style="color: rgb(159, 0, 0);"'; ?>>{{ 'Rp. ' . number_format($a->pengeluaran_perbulan, 0, '.') }}</td>

                        <td>
                            <button type="submit" onclick="openPDF('/uploads/{{ $a->foto_ktp }}')">
                                <i class="fa-solid fa-eye"></i></button>
                        </td>


                        <td>
                            <button type="submit" onclick="openPDF('/uploads/{{ $a->foto_kk }}')">
                                <i class="fa-solid fa-eye"></i></button>
                        </td>

                        <td>
                            <button type="submit" onclick="openPDF('/uploads/{{ $a->foto_rumah }}')">
                                <i class="fa-solid fa-eye"></i></button>
                        </td>


                        <td>
                            <button type="submit" onclick="openPDF('/uploads/{{ $a->surat_miskin }}')">
                                <i class="fa-solid fa-eye"></i></button>
                        </td>



                        <td>{{ $b['nilai'] }}</td>



                        <td>
                            <form action="/bantuans/{{ $a->id }}/edit" method="GET">
                                <button type="submit" class="btn_edit"><i class="fa-solid fa-pen"></i></button>
                            </form>
                        </td>

                        <td>
                            <form action="/bantuans/{{ $a->id }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn_trash"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- End table -->
@endsection

@push('js')
    <script>
        function openPDF(pdfUrl) {
            var width = 500;
            var height = 500;
            var top = 100;
            var left = 500;

            window.open(pdfUrl, '', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
        }
    </script>
@endpush
