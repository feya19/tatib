<div class="mt-4">
    <!-- Verifikasi Laporan Pelanggaran (View)-->
    <div class="p-4 card shadow-sm">
        <div class="d-flex mb-3">
            <h3 class="fw-semibold mb-1">Verifikasi Laporan Pelanggaran</h3>
        </div>

        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="fw-semibold">Tanggal Unggah Laporan</h6>
                    <h6><?= datetime($model->created_at) ?></h6>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-semibold">Tanggal Konfirmasi</h6>
                    <h6><?= datetime($model->assigned_date) ?></h6>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-semibold">Catatan </h6>
                    <h6><?= $model->verification_comment ?: '-' ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
