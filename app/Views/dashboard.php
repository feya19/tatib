<?php 
use Core\Request;
$userdata = \Core\Session::get('userdata');
?>
<div id="dashboard">
    <!-- Welcome -->
    <div class="welcome-container">
        <h1 class="position-absolute" style="color: #C45A01; z-index: 1; font-size: 40px; font-weight: bold;">
            Selamat Datang <?= \Core\Session::get('userdata')['name'] ?>
        </h1>
        <img src="/assets/img/background-dashboard.png" alt="Background" class="img-fluid" style="height: 100%; width: 100%;">
    </div>
    <!-- Cards -->
    <div class="row mt-4">
        <!-- Dashboard Admin -->
        <?php if($userdata['is_admin']): ?>
            <!-- Card Total Pelanggaran -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/laporan" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Pelanggaran</h5>
                                <h2 class="text-primary fw-bold mb-3"><?php echo $totalPelanggaran; ?></h2>
                                <p class="text-muted">Total pelanggaran keseluruhan </p>
                            </div>
                            <img src="/assets/img/icon-1.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Pengguna Mahasiswa -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/data_user/mahasiswa" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Mahasiswa</h5>
                                <h2 class="text-primary fw-bold mb-3"><?php echo $totalMahasiswa; ?></h2>
                                <p class="text-muted">Total pengguna mahasiswa</p>
                            </div>
                            <img src="/assets/img/icon-mhs.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Pengguna Dosen -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/data_user/dosen" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Dosen</h5>
                                <h2 class="text-primary fw-bold mb-3"><?php echo $totalDosen; ?></h2>
                                <p class="text-muted">Total pengguna dosen</p>
                            </div>
                            <img src="/assets/img/icon-dosen.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
        <!-- Dashboard Dosen -->
        <?php elseif($userdata['lecturer_id']): ?>
            <h4 class="mb-4 fw-semibold">Statistik Pelaporan</h4>
            <!-- Card Total Pelaporan Dosen -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/pelaporan" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Seluruh Pelaporan</h5>
                                <h2 class="text-primary fw-bold mb-3">3</h2>
                                <p class="text-muted">Total seluruh pelaporan dosen</p>
                            </div>
                            <img src="/assets/img/icon-1.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Pelaporan Diterima Dosen -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Pelaporan Diterima</h5>
                                <h2 class="text-primary fw-bold mb-3">2</h2>
                                <p class="text-muted">Total pelaporan Anda yang diterima</p>
                            </div>
                            <img src="/assets/img/icon-3.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Total Pelaporan Dosen -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Pelaporan Ditolak</h5>
                                <h2 class="text-primary fw-bold mb-3">1</h2>
                                <p class="text-muted">Total pelaporan Anda yang ditolak</p>
                            </div>
                            <img src="/assets/img/icon-2.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Jika Dosennya DPA -->
            <?php if(!empty($userdata['classes'])): ?>
                <h4 class="mb-4 fw-semibold">Statistik Pelanggaran Kelas Anda</h4>
                <!-- Card Total Laporan Kelas DPA -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="/pelaporan" class="text-decoration-none">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4 d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title fw-bold mb-3">Seluruh Laporan</h5>
                                    <h2 class="text-primary fw-bold mb-3">5</h2>
                                    <p class="text-muted">Total pelanggaran yang telah dilaporkan</p>
                                </div>
                                <img src="/assets/img/icon-4.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Card Laporan Yang Perlu Dikonfirmasi DPA -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4 d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title fw-bold mb-3">Laporan Perlu Konfirmasi</h5>
                                    <h2 class="text-primary fw-bold mb-3">2</h2>
                                    <p class="text-muted">Total laporan yang perlu dikonfirmasi</p>
                                </div>
                                <img src="/assets/img/icon-5.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Card Laporan Terkonfirmasi DPA -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4 d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title fw-bold mb-3">Laporan Terkonfirmasi</h5>
                                    <h2 class="text-primary fw-bold mb-3">3</h2>
                                    <p class="text-muted">Total laporan yang sudah dikonfirmasi</p>
                                </div>
                                <img src="/assets/img/icon-6.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <!-- Card buat laporan dosen -->
            <div class="col-lg-12 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-3 d-flex align-items-center justify-content-center gap-5">
                        <div>
                            <img src="/assets/img/dashboard-dosen.png" alt="Ilustrasi Dashboard Dosen" class="img-fluid" style="max-width: 300px;">
                        </div>
                        <div class="text-center">
                            <h4 class="fw-bold">Ingin mengajukan laporan?</h4>
                            <p class="text-muted">Pastikan laporan Anda dilengkapi dengan bukti yang valid!</p>
                            <a href="/pelaporan/tambah" class="btn btn-primary mt-5" style="padding: 10px 50px;">Buat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Dashboard Mahasiswa -->
        <?php else: ?>
            <!-- Card Pelanggaran Mahasiswa -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/pelanggaran" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Seluruh Pelanggaran</h5>
                                <h2 class="text-primary fw-bold mb-3"><?php ?></h2>
                                <p class="text-muted">Total pelanggaran keseluruhan </p>
                            </div>
                            <img src="/assets/img/icon-1.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Tanggungan Pelanggaran Mahasiswa -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Tanggungan Pelanggaran</h5>
                                <h2 class="text-danger fw-bold mb-3">2</h2>
                                <p class="text-muted">Total pelanggaran yang belum terselesaikan</p>
                            </div>
                            <img src="/assets/img/icon-2.png" alt="Icon representing pending violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card Penyelesaian Pelanggaran Mahasiswa -->
            <div class="col-lg-4 col-md-12 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">Penyelesaian Pelanggaran</h5>
                                <h2 class="text-success fw-bold mb-3">1</h2>
                                <p class="text-muted">Total pelanggaran yang sudah terselesaikan</p>
                            </div>
                            <img src="/assets/img/icon-3.png" alt="Icon representing resolved violations" class="ms-4 pb-4" width="80">
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>