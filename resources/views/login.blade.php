<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/login/css/style.css">

    <title>BLT</title>
</head>

<style>
    body {
        background-image: url('assets/gambar.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body style="display:flex; flex-direction:column; justify-content:center; min-height:100vh;">
    <div class="container">
        <div class="row justify-content-center form-login mt-5">
            <div class="col-md-6">
                <form action="/login" class="panel" method="post" onsubmit="saveEmail()">
                    @csrf

                    <img width="75" src="assets/logo.png" align="left" style="margin-left: 90px;" />
                    <h3 oncontextmenu='return false' onmousedown='return false' class="mb-4 text-center text-uppercase"
                        style="color: white; margin-right: 80px;" align="right">BLT Desa<br>Keude Krueng </h3>

                    @if (session('message'))
                        <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                            <h5>{{ session('message') }}</h5>
                        </div>
                    @endif

                    <div class="form-group ml-5 mr-5">
                        <input type="email" name="email" id="username"
                            style="background: black; border-color: black; color: white;"
                            class="form-control form-control-lg radius" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password" id="password"
                            style="background: black; border-color: black; color: white;"
                            class="form-control form-control-lg radius" placeholder="Password" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                        <button type="submit" class="btn btn-secondary btn-login block radius"
                            name="login">Login</button>
                    </div>

                    <br>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/login/js/bootstrap.min.js"></script>
    <script>
        function saveEmail() {
            // Mendapatkan nilai email dari formulir
            var email = document.getElementById('username').value;
            localStorage.setItem('email', email);

            // Menyimpan email di local storage
            if (email == 'pegawai2@admin.com') {
                window.location.href = 'http://127.0.0.1:8000/bantuans';
            }

        }
    </script>
</body>

</html>
