<div id="dashboard">
    <!-- Welcome -->
    <div class="welcome-container">
        <h1 class="position-absolute" style="color: #C45A01; z-index: 1; font-size: 40px; font-weight: bold;">
            Selamat Datang <?= \Core\Controller::getSession('userdata')['name'] ?>
        </h1>
        <img src="/assets/img/background-dashboard.png" alt="Background" class="img-fluid" style="height: 100%; width: 100%;">
    </div>
    <!-- Cards -->
    <div class="row mt-4">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title fw-bold mb-3">Seluruh Pelanggaran</h5>
                            <h2 class="text-primary fw-bold mb-3">3</h2>
                            <p class="text-muted">Total pelanggaran keseluruhan mahasiswa</p>
                        </div>
                        <img src="/assets/img/icon-1.png" alt="Icon representing total violations" class="ms-4 pb-4" width="80">
                    </div>
                </div>
            </a>
        </div>
        <!-- Card 2 -->
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
        <!-- Card 3 -->
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
    </div>
</div>