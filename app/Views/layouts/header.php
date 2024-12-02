<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
            <div class="text-center">
                <img src="/assets/img/logo-tatib.png" alt="Logo" class="img-fluid" style="max-width: 160px;">
            </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <span>Anya Callista</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profil">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="d-flex bg-white" style="min-height: 100vh;">
        <!-- Sidebar -->
        <ul class="nav flex-column p-3" style="min-width: 240px;">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="bi bi-grid me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/violations" class="nav-link">
                    <i class="bi bi-clipboard me-2"></i> Pelanggaran
                </a>
            </li>
            <li class="nav-item">
                <a href="/panduan" class="nav-link">
                    <i class="bi bi-file-earmark-text me-2"></i> Tata Tertib
                </a>
            </li>
        </ul>


        <!-- Main Content -->
        <div id="content" class="flex-grow-1 p-4">
