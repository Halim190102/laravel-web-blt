@extends('layout.main') @section('content')
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
    <div class=" tbl_container">
        <h2>Penduduk BLT Desa Keude Krueng</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <a href="/penduduks/create" class="btn_add" style="float: right; margin-bottom: 10px;">
                    <i class="fa-solid fa-plus"></i> Tambah Data Penduduk

                </a><br><br>

                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Dusun</th>
                    <th>No. HP</th>
                    <th>Status Perkawinan</th>
                    <th>Pekerjaan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>

                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            @foreach ($penduduks as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->gender == 'laki-laki' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->dusun }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td>
                        @if ($row->status_perkawinan == '0')
                            Belum Kawin
                        @elseif ($row->status_perkawinan == '1')
                            Kawin
                        @elseif($row->status_perkawinan == '2')
                            Cerai Hidup
                        @else
                            Cerai Mati
                        @endif
                    </td>
                    <td>
                        @if ($row->pekerjaan == '0')
                            Pedagang
                        @elseif ($row->pekerjaan == '1')
                            Buruh
                        @elseif ($row->pekerjaan == '2')
                            Swasta
                        @elseif ($row->pekerjaan == '3')
                            Nelayan
                        @elseif ($row->pekerjaan == '4')
                            Petani/Berkebun
                        @else
                            @if ($row->gender == 'perempuan' && $row->status_perkawinan != '0')
                                Ibu Rumah Tangga
                            @else
                                Tidak Bekerja
                            @endif
                        @endif
                    </td>
                    <td>{{ $row->tempat_lahir }}</td>
                    <td>{{ $row->tanggal_lahir }}</td>
                    <td>
                        @if ($row->agama == '0')
                            Islam
                        @elseif ($row->agama == '1')
                            Kristen Protestan
                        @elseif($row->agama == '2')
                            Kristen Katolik
                        @elseif($row->agama == '3')
                            Hindu
                        @elseif($row->agama == '3')
                            Buddha
                        @else
                            Khonghucu
                        @endif
                    </td>

                    <td>
                        <form action="/penduduks/{{ $row->id }}/edit" method="GET">
                            <button type="submit" class="btn_edit"><i class="fa-solid fa-pen"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="/penduduks/{{ $row->id }}" method="POST"
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
