<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiTatib POLINEMA</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Logo -->
    <a class="position-absolute top-0 start-0 m-3" href="/">
        <img src="/assets/img/logo-tatib.png" alt="SiTatib POLINEMA" class="img-fluid" style="max-width: 220px;">
    </a>

    <!-- Login Container -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h1 class="h4 fw-bold">Login</h1>
                    </div>

                    <!-- Info Box -->
                    <div class="alert alert-info" role="alert">
                        <strong>Informasi:</strong>
                        <ul class="mb-0">
                            <li>Bagi Mahasiswa: Gunakan akun Siakad</li>
                            <li>Bagi DPA/Admin: Gunakan akun Portal Polinema</li>
                        </ul>
                    </div>

                    <!-- Error Messages -->
                    <?php if ($errors = \Core\Session::getFlash('errors')): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php 
                                if (is_array($errors)) {
                                    foreach ($errors as $error):
                                        echo '<li>'. htmlspecialchars($error) .'</li>';
                                    endforeach;
                                } else {
                                    echo '<li>'. htmlspecialchars($errors) .'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="idAnggota" class="form-label">ID Anggota</label>
                            <input 
                                type="text" 
                                class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" 
                                id="idAnggota" 
                                name="username"
                                placeholder="Isikan NIM/akun Portal Polinema" 
                                value="<?= htmlspecialchars($old['username'] ?? '') ?>"
                            >
                            <?php if (isset($errors['username'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['username']) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                                id="password" 
                                name="password"
                                placeholder="Isikan Password"
                            >
                            <?php if (isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['password']) ?></div>
                            <?php endif; ?>
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

    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script>
        // Toggle password visibility
        $('#showPassword').on('click', function () {
            const passwordField = $('#password');
            const passwordFieldType = passwordField.attr('type');
            passwordField.attr('type', passwordFieldType === 'password' ? 'text' : 'password');
        });
    </script>
</body>

</html>