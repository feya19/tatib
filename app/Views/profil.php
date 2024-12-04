<?php
// Simulasi data mahasiswa yang diambil dari database (statis untuk demo)
// $username = '2341720234';

// // Query untuk mengambil data mahasiswa
// $query = "SELECT * FROM mahasiswa WHERE username = '$username'";
// $result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) > 0) {
//     // Ambil data mahasiswa
//     $mahasiswa = mysqli_fetch_assoc($result);
// }

// Simulasi data mahasiswa yang diambil dari database (statis untuk demo)
$user = [
    'role' => 'Mahasiswa',
    'nama' => 'Anya Callissta Chriswantari',
    'nim' => '2341720234',
    'email' => 'anyaforger@gmail.com',
    'jurusan' => 'Teknologi Informasi',
    'program_studi' => 'D4 Teknik Informatika',
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f7fa;
            color: #333;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
        }
        .profile-header h2 {
            padding: 10px;
            margin: 0;
            font-size: 24px;
        }
        .profile-header p {
            padding: 10px;
            margin: 0;
        }
        .profile-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
        }
        .profile-info h5 {
            font-weight: normal;
        }
        .profile-info h6 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #6C757D;
        }
        .mb-3 {
            padding: 10px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Header Profil -->
        <div class="profile-header">
            <div>
                <h2 style="text-transform: uppercase;"><?= strtoupper($user['nama']) ?></h1>
                <p><?= $user['role'] ?> / <?= $user['nim'] ?></p>
            </div>
        </div>

        <!-- Informasi Profil -->
        <div class="profile-info mt-4">
            <div class="row">
                <h3 style="padding: 20px;">Informasi Pribadi</h3>
                <!-- Kolom Kiri: Nama, NIM/NIP, Email -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6>Nama</h6>
                        <h5><?= $user['nama'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <?php if ($user['role'] == 'Mahasiswa') { ?>
                            <h6>NIM</h6>
                            <h5><?= $user['nim'] ?></h5>
                        <?php } elseif ($user['role'] == 'Dosen' || $user['role'] == 'Admin') { ?>
                            <h6>NIP</h6>
                            <h5><?= $user['nip'] ?></h5>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <h6>Email</h6>
                        <h5><?= $user['email'] ?></h5>
                    </div>
                </div>
                <!-- Kolom Kanan: Jurusan, Program Studi -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6>Jurusan</h6>
                        <h5><?= $user['jurusan'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <h6>Program Studi</h6>
                        <h5><?= $user['program_studi'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
