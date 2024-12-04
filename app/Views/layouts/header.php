<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?></title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-table.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/fontawesome.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap-table.js"></script>
    <script src="/assets/js/fontawesome.min.js"></script>
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
                    <li class="nav-item me-2">
                        <button class="btn btn-light position-relative">
                            <img src="/assets/img/bell.png" alt="Notification Bell" height="25" width="25">
                            <span class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; padding: 0.2em 0.4em;">
                                99+
                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        </button>
                    </li>
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <span><?= \Core\Session::get('userdata')['name'] ?></span>
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
        <!-- Sidebar -->
        <ul class="nav flex-column p-3" style="min-width: 240px;">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="fa-duotone fa-solid fa-grid-2"></i></i> Dashboard
                </a>
            </li>
            <?php if(\Core\Session::get('userdata')['lecturer_id']): ?>
            <li class="nav-item">
                <a href="/pelaporan" class="nav-link">
                    <i class="fa-duotone fa-solid fa-file-lines"></i></i> Pelaporan
                </a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a href="/pelanggaran" class="nav-link">
                    <i class="fa-duotone fa-solid fa-file-lines"></i> Pelanggaran
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="/panduan" class="nav-link">
                    <i class="fa-duotone fa-solid fa-book"></i></i> Tata Tertib
                </a>
            </li>
        </ul>


        <!-- Main Content -->
        <div id="content" class="flex-grow-1 p-4">
