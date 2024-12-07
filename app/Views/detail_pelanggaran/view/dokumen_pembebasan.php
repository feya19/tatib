<div class="mt-4">
    <!-- Dokumen Pembebasan Pelanggaran -->
    <div class="p-4 card shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-semibold mb-0">Dokumen Pembebasan Pelanggaran</h3>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-primary"
                    onclick="previewPDF('<?= $model->clearence_file ?>')">
                    <i class="fa-regular fa-eye"></i> Pratinjau
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <h6 class="fw-semibold">Surat Bebas Pelanggaran</h6>
            <div class="d-flex align-items-center">
                <?php if($model->clearence_file): ?>
                <i class="fa-solid fa-file"></i>&ensp;
                <a href="<?= $model->clearence_file ?>" id="downloadSanksi" class="" download="Surat Bebas Pelanggaran_<?= $model->violation_number ?>.pdf">
                    Surat Bebas Pelanggaran_<?= $model->violation_number ?>.pdf
                </a>
                <span class="ms-5 text-muted"><?= datetime($model->action_verified_at) ?></span>
                <?php else: ?>
                -
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
