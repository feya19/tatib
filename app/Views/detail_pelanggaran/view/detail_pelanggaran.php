<div id="detail">
    <!--Detail Pelanggaran (view) -->
    <div class="p-4 card shadow-sm">
        <div class="d-flex">
            <h3 class="fw-semibold mb-1">Detail Pelanggaran</h3>&ensp;<span class="badge badge-<?= $model->statusClass ?> fs-5 px-2 py-2"><?= $model->statusText ?></span>
        </div>

        <div class="card-body p-0">
            <div class="row">
                <div class="row col-md-9 gy-3">
                    <div class="col-md-6 mt-0">
                        <h6 class="fw-semibold">Nomor Pelanggaran</h6>
                        <h6><?= $model->violation_number ?></h6>
                    </div>
                    <div class="col-md-6 mt-0">
                        <h6 class="fw-semibold">Hari, Tanggal</h6>
                        <h6><?= human_date($model->report_date) ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">NIM</h6>
                        <h6><?= $model->nim ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Nama Mahasiswa</h6>
                        <h6><?= $model->student_name ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Kelas</h6>
                        <h6><?= $model->student_class ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Nama Pelapor</h6>
                        <h6><?= $model->reporter_name ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Pelanggaran</h6>
                        <h6><?= $model->violation_type_name ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Sanksi</h6>
                        <h6><?= $model->sanction_description ?></h6>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Level</h6>
                        <h6><?= $model->sanction_level ?></h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Keterangan</h6>
                        <h6><?= $model->description ?: '-' ?></h6>
                    </div>
                </div>
                <!-- Bukti Pelanggaran -->
                <div class="col-md-3 text-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">
                        <img src="<?= $model->photo_evidence ?>" alt="Bukti Pelanggaran" class="img-fluid rounded">
                    </a>
                    <p class="mt-2"><strong>Bukti Pelanggaran</strong></p>
                    <a href="<?= $model->photo_evidence ?>" download="Bukti Pelanggaran_<?= $model->violation_number ?>" class="btn btn-outline-primary"><i class="fa-regular fa-download"></i> Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
