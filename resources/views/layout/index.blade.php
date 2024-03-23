@extends('layout.main')

@section('content')
    <!-- banner -->
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(/Atlas/Atlas/img/jumbotron.jpg);">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-Star">
                    <div class="col-2">
                        {{-- <img src="/Atlas/Atlas/img/logo2.png" alt="logo"> --}}
                    </div>

                </div>
            </header>
            <h1>
                BLT<br>
                Metode MFEEP
            </h1>
            <p>
                Sistem Pendukung keputusan kelayakan Penerima Bnatuan BLT
                <br> Kepada Masyarakat Desa Keude Krueng Dengan Metode MFEEP
            </p>

        </div>
    </div>

    <div>

    </div>


    <!-- AOS -->
    @push('js')
        <script src="/Atlas/Atlas/js/aos.js"></script>
        <script>
            AOS.init({});
        </script>
    @endpush
@endsection
