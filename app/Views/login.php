<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiTatib POLINEMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            margin-top: 80px;
        }

        .login-card {
            padding: 2rem;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .info-box {
            background-color: #e8f8f2;
            color: #055160;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .info-box ul {
            padding-left: 1.5rem;
            margin: 0;
        }

        .info-box ul li {
            list-style-type: disc;
        }

        .logo {
            position: absolute;
            top: 30px;
            left: 25px;
        }

        .logo img {
            max-width: 220px;
        }

        .btn-primary {
            background-color: darkblue;
            border: none;
        }

        .btn-primary:hover {
            background-color: #094dbd;
        }
    </style>
</head>

<body>
    <div class="logo">
    <img src="/assets/img/logo-tatib.png" alt="SiTatib POLINEMA" class="img-fluid">
    </div>
    <!-- Container untuk Form Login -->
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card login-card">
                    <div class="text-center mb-4">
                        <h1 class="login-title">Login</h1>
                    </div>

                    <!-- Box Informasi -->
                    <div class="info-box">
                        <strong>Informasi:</strong>
                        <ul>
                            <li>Bagi Mahasiswa: Gunakan akun Siakad</li>
                            <li>Bagi DPA/Admin: Gunakan akun Portal Polinema</li>
                        </ul>
                    </div>

                    <!-- Form Login -->
                    <form>
                        <div class="mb-3">
                            <label for="idAnggota" class="form-label">ID Anggota</label>
                            <input type="text" class="form-control" id="idAnggota"
                                placeholder="Isikan NIM/akun Portal Polinema">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Isikan Password">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // lihat password
        $('#showPassword').on('click', function () {
            const passwordField = $('#password');
            const passwordFieldType = passwordField.attr('type');
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
            }
        });
    </script>

</body>

</html>