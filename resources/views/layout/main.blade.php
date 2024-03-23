<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/assets') }}/dashboard/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('/assets') }}/dashboard/css/all.css">
    <link rel="stylesheet" href="/Atlas/Atlas/css/custom.css">
    <!-- bootstrap.min.css -->
    {{-- <link rel="stylesheet" href="/Atlas/Atlas/css/bootstrap.min.css"> --}}
    <!-- font-awesome -->
    <link rel="stylesheet" href="/Atlas/Atlas/font-awesome-4.7.0/css/font-awesome.min.css">

    <title>BLT Desa Keude Krueng</title>
</head>

<!-- Navbar -->
<nav>
    <ul>
        <li>
            <a class="logo btn_nav">
                <img src="{{ asset('/assets') }}/logo.png" alt="" />
                <span class="nav-item">BLT Keude Krueng</span>
            </a>
        </li>
        <li>
            <a href="/" class="btn_nav">
                <i class="fa fa-solid fa-gauge"></i>
                <span class="nav-item">Dashboard</span>
            </a>
        </li>
        <li id="penduduk" style="display: none;">
            <a href="/penduduks" class="btn_nav">
                <i class="fa fa-solid fa-house"></i>
                <span class="nav-item">Data Penduduk</span>
            </a>
        </li>
        <li id="bantuan" style="display: none;">
            <a href="/bantuans" class="btn_nav">
                <i class="fa fa-solid fa-ranking-star"></i>
                <span class="nav-item">Calon Penerima</span>
            </a>
        </li>
        <li id="kriteria" style="display: none;">
            <a href="/kriterias" class="btn_nav">
                <i class="fa fa-chart-bar"></i>
                <span class="nav-item">Kriteria</span>
            </a>
        </li>
        <li>
            <form method="POST" action="/logout" class="log-out btn_nav">
                @csrf
                <button type="submit" onclick="logout()">
                    <i class="fa fa-solid fa-arrow-right-from-bracket  panah" style="font-size: 20px"></i>
                    <span class="nav-item"><b>KELUAR</b></span>
                </button>
            </form>
        </li>
    </ul>
</nav>
<!-- End Navbar -->

{{-- content --}}
<div class="mt-2">
    <div class="container">@yield('content')</div>
</div>
{{-- End --}}

@stack('js')
<script src="{{ asset('/assets') }}/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<script>
    // Mendapatkan data 'email' dari local storage
    var user = localStorage.getItem('email');

    // Jika ada data 'email' di Local Storage, tampilkan elemen sesuai kondisi
    if (user === 'pegawai1@admin.com') {
        document.getElementById('penduduk').style.display = 'block';
    }


    if (user === 'pegawai2@admin.com') {
        document.getElementById('bantuan').style.display = 'block';
    }


    if (user === 'admin@admin.com') {
        document.getElementById('penduduk').style.display = '';
        document.getElementById('bantuan').style.display = '';
        document.getElementById('kriteria').style.display = '';
    }

    function logout() {
        localStorage.clear();
    }
</script>

</html>
