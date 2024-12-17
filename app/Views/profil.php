<html>
    <head>
        <link href="/assets/css/profil.css" rel="stylesheet">
    </head>
    <body>
        <div id="profile">
            <!-- Header Profil -->
            <div class="profile-header">
                <div>
                    <!-- Display user name in uppercase -->
                    <h2 style="text-transform: uppercase;"><?= strtoupper($user['name'] ?? '') ?></h2> <!-- Access user name -->
                    <p>
                    <?php 
                    // Display student_id as NIM or lecturer_id as NIP, and include the role as Admin if applicable
                    if (!empty($user['student_id'])) {
                        echo "Mahasiswa / " . $user['student_id'];
                    } elseif (!empty($user['lecturer_id'])) {
                        echo "Dosen / " . $user['lecturer_id'];
                    } elseif ($user['is_admin']) {
                        echo "Admin";
                    }
                    ?>
                    </p>
                </div>
            </div>
        
            <!-- Informasi Profil -->
            <div class="profile-info mt-4">
                <div class="row">
                    <h3 style="padding: 20px;">Informasi Pribadi</h3>
                    <!-- Kolom Kiri: Nama, NIM/NIP -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6>Nama</h6>
                            <h5><?= $user['name'] ?? '' ?></h5> <!-- Access user name -->
                        </div>
                        <div class="mb-3">
                            <!-- Display NIM if user has student_id, otherwise display NIP if user has lecturer_id -->
                            <?php if (!empty($user['student_id'])) { ?>
                                <h6>NIM</h6>
                                <h5><?= $user['student_id'] ?? '' ?></h5> <!-- Display student_id as NIM -->
                            <?php } elseif (!empty($user['lecturer_id'])) { ?>
                                <h6>NIP</h6>
                                <h5><?= $user['lecturer_id'] ?? '' ?></h5> <!-- Display lecturer_id as NIP -->
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Kolom Kanan: Email, Program Studi -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6>Email</h6>
                            <h5><?= $user['email'] ?? '' ?></h5> <!-- Access user email -->
                        </div>
                        <div class="mb-3">
                            <?php if (!empty($user['program_study_name'])): ?>
                                <h6>Program Studi</h6>
                                <h5><?= $user['program_study_name'] ?></h5> <!-- Access and display program_study -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
