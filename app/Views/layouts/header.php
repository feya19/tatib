<?php
use App\Models\ViewViolationsDetails;
$userdata = \Core\Session::get('userdata');
use Core\Request;
$statusClasses = ViewViolationsDetails::enumStatusClass();

$notifications = [
    'mahasiswa' => [
        'new' => 'Anda mendapatkan pelanggaran <br> baru',
        'action_rejected' => 'Laporan pelaksanaan sanksi <br> anda ditolak',
        'done' => 'Laporan pelaksanaan sanksi <br> anda diterima',
    ],
    'dosen' => [
        'rejected' => 'Laporan yang anda ajukan <br>ditolak',
        'process' => 'Laporan yang anda ajukan <br>disetujui.',
        'done' => 'Laporan yang anda ajukan <br>telah diselesaikan',
    ],
    'admin' => [
        'new' => 'Laporan baru telah diajukan',
        'done' => 'Laporan telah terselesaikan',
    ],
];

$seeAllLink = '#';
$notif_count = 0;
if (!empty($userdata['student_id'])) {
    $seeAllLink = '/pelanggaran';
    $notif_count = count($notifications['mahasiswa']);
} elseif (!empty($userdata['lecturer_id'])) {
    $seeAllLink = '/pelaporan';
    $notif_count = count($notifications['dosen']);
} elseif (!empty($userdata['is_admin'])) {
    $seeAllLink = '/laporan';
    $notif_count = count($notifications['admin']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? 'Dashboard'?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-table.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-select2.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="/assets/css/toastr.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap-table.js"></script>
    <script src="/assets/js/fontawesome.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script src="/assets/js/flatpickr.min.js"></script>
    <link href="/assets/css/flatpickr.min.css" rel="stylesheet">
    <script src="/assets/js/select2.min.js"></script>
    <link href="/assets/css/select2.min.css" rel="stylesheet">
    <script src="/assets/js/sweetalert2.min.js"></script>
    <link href="/assets/css/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand p-0 fw-bold" href="#">
                <div class="text-center">
                    <img src="/assets/img/logo-tatib.png" alt="Logo" class="img-fluid" style="max-width: 180px;">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <!-- Notification -->
                    <li class="nav-item me-2 dropdown">
                        <button class="btn btn-light position-relative" id="notificationButton"
                            data-bs-toggle="dropdown">
                            <img src="/assets/img/bell.png" alt="Notification Bell" height="25" width="25" />
                            <span class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-danger"
                                style="font-size: 0.6rem; padding: 0.2em 0.4em">
                                <?=$notif_count > 0 ? $notif_count : '';?>
                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end p-2" id="notifikasi" style="width: 275px">
                            <li class="d-flex justify-content-between align-items-center fw-bold px-2 mb-2">
                                <span>Notifikasi</span>
                                <a href="<?=$seeAllLink?>" class="btn btn-sm btn-primary">Lihat Semua</a>
                            </li>

                            <!-- Loop through Notifications based on user role -->
                            <?php if (!empty($userdata['student_id'])): ?>
                            <?php foreach ($notifications['mahasiswa'] as $status => $message): ?>
                            <li>
                                <a href="/pelanggaran" class="dropdown-item d-flex align-items-center mb-2  p-1">
                                    <div class="icon me-1">
                                        <?php if ($status == 'new'): ?>
                                        <img src="/assets/img/icon-notif-pelanggaran.png" alt="New Notification">
                                        <?php elseif ($status == 'action_rejected'): ?>
                                        <img src="/assets/img/icon-notif-ditolak.png" alt="Action Rejected">
                                        <?php elseif ($status == 'done'): ?>
                                        <img src="/assets/img/icon-notif-diterima.png" alt="Done">
                                        <?php endif;?>
                                    </div>
                                    <span class="notification-text"><?php echo $message; ?></span>
                                </a>
                            </li>
                            <?php endforeach;?>
                            <?php elseif (!empty($userdata['lecturer_id'])): ?>
                            <?php foreach ($notifications['dosen'] as $status => $message): ?>
                            <li>
                                <a href="/pelaporan" class="dropdown-item d-flex align-items-center mb-2 p-1">
                                    <div class="icon me-3">
                                        <?php if ($status == 'rejected'): ?>
                                        <img src="/assets/img/icon-notif-ditolak.png" alt="Rejected">
                                        <?php elseif ($status == 'process'): ?>
                                        <img src="/assets/img/icon-notif-diterima.png" alt="Process">
                                        <?php elseif ($status == 'done'): ?>
                                        <img src="/assets/img/icon-notif-diterima.png" alt="Done">
                                        <?php endif;?>
                                    </div>
                                    <span class="notification-text"><?php echo $message; ?></span>
                                </a>
                            </li>
                            <?php endforeach;?>
                            <?php elseif (!empty($userdata['is_admin'])): ?>
                            <?php foreach ($notifications['admin'] as $status => $message): ?>
                            <li>
                                <a href="/laporan" class="dropdown-item d-flex align-items-center mb-2 p-1">
                                    <div class="icon">
                                        <?php if ($status == 'new'): ?>
                                        <img src="/assets/img/icon-notif-pelanggaran.png" alt="New Notification">
                                        <?php elseif ($status == 'done'): ?>
                                        <img src="/assets/img/icon-notif-diterima.png" alt="Done">
                                        <?php endif;?>
                                    </div>
                                    <span class="notification-text"><?php echo $message; ?></span>
                                </a>
                            </li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </li>



                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <span><?=$userdata['name']?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profil">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            <!-- Add more items here if needed -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="d-flex bg-white" id="sidebar">
        <ul class="nav flex-column p-2" style="min-width: 240px; max-width: 240px">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link <?=Request::is('/dashboard') ? 'active' : ''?>">
                    <i class="fa-duatone fa-solid fa-grid-2" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <!-- Sidebar Dosen -->
            <?php if ($userdata['lecturer_id']): ?>
            <li class="nav-item">
                <a href="/pelaporan" class="nav-link <?=Request::is('/pelaporan') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-file-lines"></i></i> Pelaporan
                </a>
            </li>
            <!-- Sidebar Mahasiswa -->
            <?php elseif ($userdata['student_id']): ?>
            <li class="nav-item">
                <a href="/pelanggaran" class="nav-link <?=Request::is('/pelanggaran') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-file-lines"></i> Pelanggaran
                </a>
            </li>
            <!-- Sidebar Admin -->
            <?php else: ?>
            <li class="nav-item">
                <a href="/laporan" class="nav-link <?=Request::is('/laporan') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-file-lines"></i> Pelanggaran
                </a>
            </li>
            <?php endif;?>
            <!-- Sidebar Sekjur -->
            <?php if ($userdata['is_sekjur']): ?>
                <li class="nav-item">
                <a href="/laporan/sekjur" class="nav-link <?=Request::is('/laporan/sekjur') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-file-lines"></i> Pelanggaran
                </a>
            </li>    
            <?php endif;?>
            <!-- Sidebar Verifikasi -->
            <?php if ($userdata['is_sekjur'] || !empty($userdata['classes'])): ?>
            <li class="nav-item">
                <a href="#verifikasiSubmenu" data-bs-toggle="collapse"
                    class="nav-link <?=Request::is('/verifikasi/*') ? 'active' : ''?>">
                    <div class="d-flex justify-content-between ">
                        <span><i class="fa-duotone fa-solid fa-file-check"></i> Verifikasi</span> <i
                            class="fa-duotone fa-solid fa-chevron-<?=Request::is('/verifikasi/*') ? 'down' : 'up'?> my-auto rotate-icon"
                            data-parent="verifikasiSubmenu"></i>
                    </div>
                </a>
                <!-- Verifikasi DPA -->
                <ul id="verifikasiSubmenu" class="collapse nav ms-4 <?=Request::is('/verifikasi/*') ? 'show' : ''?>">
                    <?php if (!empty($userdata['classes'])): ?>
                    <li class="nav-item flex w-100">
                        <a class="nav-link <?=Request::is('/verifikasi/kelas') ? 'active' : ''?>"
                            href="/verifikasi/kelas">
                            <i class="fa-duotone fa-solid fa-building"></i> Kelas
                        </a>
                    </li>
                    <?php endif;?>
                    <!-- Verifikasi Sekjur -->
                    <?php if ($userdata['is_sekjur']): ?>
                    <li class="nav-item flex w-100">
                        <a class="nav-link <?=Request::is('/verifikasi/jurusan') ? 'active' : ''?>"
                            href="/verifikasi/jurusan">
                            <i class="fa-duotone fa-solid fa-buildings"></i> Jurusan
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <!-- Sidebar Data Master Admin -->
            <?php if ($userdata['is_admin']): ?>
            <p class="text-muted text-center my-2">Data Master</p>
            <li class="nav-item">
                <a href="#verifikasiSubmenu" data-bs-toggle="collapse"
                    class="nav-link <?=Request::is('/data_user/*') ? 'active' : ''?>">
                    <div class="d-flex justify-content-between ">
                        <span><i class="fa-duotone fa-solid fa-users"></i> User</span> <i
                            class="fa-duotone fa-solid fa-chevron-<?=Request::is('/data_user/*') ? 'down' : 'up'?> my-auto rotate-icon"
                            data-parent="verifikasiSubmenu"></i>
                    </div>
                </a>
                <ul id="verifikasiSubmenu" class="collapse nav ms-4 <?=Request::is('/data_user/*') ? 'show' : ''?>">
                    <?php if ($userdata['is_admin']): ?>
                    <li class="nav-item flex w-100">
                        <a class="nav-link <?=Request::is('/data_user/mahasiswa') ? 'active' : ''?>"
                            href="/data_user/mahasiswa">
                            <i class="fa-duotone fa-solid fa-graduation-cap"></i> Mahasiswa
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if ($userdata['is_admin']): ?>
                    <li class="nav-item flex w-100">
                        <a class="nav-link <?=Request::is('/data_user/dosen') ? 'active' : ''?>"
                            href="/data_user/dosen">
                            <i class="fa-duotone fa-solid fa-chalkboard-teacher"></i> Dosen
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <!-- Sidebar Data Tata Tertib Admin -->
            <?php if ($userdata['is_admin']): ?>
            <li class="nav-item">
                <a href="/data_tatib" class="nav-link <?=Request::is('/data_tatib') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-book"></i></i> Tata Tertib
                </a>
            </li>
            <!-- Sidebar Tata Tertib Mahasiswa & Dosen -->
            <?php else: ?>
            <li class="nav-item">
                <a href="/panduan" class="nav-link <?=Request::is('/panduan') ? 'active' : ''?>">
                    <i class="fa-duotone fa-solid fa-book"></i></i> Tata Tertib
                </a>
            </li>
            <?php endif;?>
        </ul>

        <!-- Main Content -->
        <div id="content" class="flex-grow-1 p-4">