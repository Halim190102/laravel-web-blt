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
                <tr>
                    <th>No.</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_kriteria }}</td>
                        <td>{{ $row->kriteria }}</td>
                        <td>
                            <form action="/kriterias/{{ $row->id }}/edit" method="GET">
                                <button type="submit" class="btn_edit"><i class="fa-solid fa-pen"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total Nilai</td>
                    <td><?php echo $nilai; ?></td>
                    <td colspan="2"></td>

                </tr>
            </tbody>
        </table>
        <br><br>

        <h2>Kriteria Penduduk</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Pedagang</th>
                    <th>Buruh</th>
                    <th>Swasta</th>
                    <th>Nelayan</th>
                    <th>Petani/Berkebun</th>
                    <th>Tidak Bekerja/Ibu Rumah Tangga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaan as $p)
                    <tr>
                        <td>{{ $p->pedagang }}</td>
                        <td>{{ $p->buruh }}</td>
                        <td>{{ $p->swasta }}</td>
                        <td>{{ $p->nelayan }}</td>
                        <td>{{ $p->petani }}</td>
                        <td>{{ $p->tidak }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/pekerjaan/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Kepemilikan Rumah</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Rumah Pribadi</th>
                    <th>Rumah Orang Tua/Anak</th>
                    <th>Rumah Sewa</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($kepemilikanrumah as $k)
                    <tr>
                        <td>{{ $k->pribadi }}</td>
                        <td>{{ $k->ortu }}</td>
                        <td>{{ $k->sewa }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/kepemilikanrumah/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Bahan Bakar</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Gas</th>
                    <th>Minyak Tanah</th>
                    <th>Kayu Bakar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($bahanbakar as $b)
                    <tr>
                        <td>{{ $b->gas }}</td>
                        <td>{{ $b->minyak }}</td>
                        <td>{{ $b->kayu }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/bahanbakar/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Tegangan Listrik</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>2 Ampere</th>
                    <th>4 Ampere</th>
                    <th>6 Ampere</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teganganlistrik as $t)
                    <tr>
                        <td>{{ $t->dua }}</td>
                        <td>{{ $t->empat }}</td>
                        <td>{{ $t->enam }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/teganganlistrik/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Jenis Bangunan</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Kayu</th>
                    <th>Semi Permanen</th>
                    <th>Beton</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisbangunan as $j)
                    <tr>
                        <td>{{ $j->kayu }}</td>
                        <td>{{ $j->semi }}</td>
                        <td>{{ $j->beton }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/jenisbangunan/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Jumlah Tanggungan</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Lebih dari 8</th>
                    <th>5 sampai 8</th>
                    <th>1 sampai 4</th>
                    <th>Tidak Ada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jumlahtanggungan as $jumlah)
                    <tr>
                        <td>{{ $jumlah->a }}</td>
                        <td>{{ $jumlah->b }}</td>
                        <td>{{ $jumlah->c }}</td>
                        <td>{{ $jumlah->d }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/jumlahtanggungan/edit/1" class="btn_back">Edit</a>
        </div>

        <br><br>
        <h2>Kriteria Penyakit Tahunan</h2>
        <table class="tbl" style=" table-layout: absolute; width: 100%; ">
            <thead>
                <tr>
                    <th>Karena Usia</th>
                    <th>Lumpuh/Struk</th>
                    <th>Difabel</th>
                    <th>Tidak Ada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyakittahunan as $penyakit)
                    <tr>
                        <td>{{ $penyakit->usia }}</td>
                        <td>{{ $penyakit->lumpuh }}</td>
                        <td>{{ $penyakit->difabel }}</td>
                        <td>{{ $penyakit->tidak }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="/penyakittahunan/edit/1" class="btn_back">Edit</a>
        </div>
    </div>

    <br><br>
    <h2>Kriteria Pendapatan Perbulan</h2>
    <table class="tbl" style=" table-layout: absolute; width: 100%; ">
        <thead>
            <tr>
                <th>Rp.600.000 kebawah</th>
                <th>Diatas Rp.600.000 sampai Rp.1.000.000</th>
                <th>Diatas Rp.1.000.000 sampai Rp.1.500.000</th>
                <th>Diatas Rp.1.500.000 sampai Rp.2.000.000</th>
                <th>Diatas Rp.2.000.000 sampai Rp.2.500.000</th>
                <th>Diatas Rp.2.500.000</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendapatanbulanan as $pendapatan)
                <tr>
                    <td>{{ $pendapatan->a }}</td>
                    <td>{{ $pendapatan->b }}</td>
                    <td>{{ $pendapatan->c }}</td>
                    <td>{{ $pendapatan->d }}</td>
                    <td>{{ $pendapatan->e }}</td>
                    <td>{{ $pendapatan->f }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <div style="float: right;">
        <a href="/pendapatanbulanan/edit/1" class="btn_back">Edit</a>
    </div>

    <br><br>
    <h2>Kriteria Pengeluaran Perbulan</h2>
    <table class="tbl" style=" table-layout: absolute; width: 100%; ">
        <thead>
            <tr>
                <th>Rp.600.000 kebawah</th>
                <th>Diatas Rp.600.000 sampai Rp.1.000.000</th>
                <th>Diatas Rp.1.000.000 sampai Rp.1.500.000</th>
                <th>Diatas Rp.1.500.000 sampai Rp.2.000.000</th>
                <th>Diatas Rp.2.000.000 sampai Rp.2.500.000</th>
                <th>Diatas Rp.2.500.000 sampai Rp.3.500.000</th>
                <th>Diatas Rp.3.500.000</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaranbulanan as $pengeluaran)
                <tr>
                    <td>{{ $pengeluaran->a }}</td>
                    <td>{{ $pengeluaran->b }}</td>
                    <td>{{ $pengeluaran->c }}</td>
                    <td>{{ $pengeluaran->d }}</td>
                    <td>{{ $pengeluaran->e }}</td>
                    <td>{{ $pengeluaran->f }}</td>
                    <td>{{ $pengeluaran->g }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <div style="float: right;">
        <a href="/pengeluaranbulanan/edit/1" class="btn_back">Edit</a>
    </div>
    <!-- End table -->
@endsection
