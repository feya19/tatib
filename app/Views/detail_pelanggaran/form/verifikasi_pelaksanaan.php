<div class="mt-4">
    <!--Verifikasi Pelaksanaan Sanksi (DPA/SEKJUR) -->
    <div class="p-4 card shadow-sm">
        <div class="d-flex mb-3">
            <h3 class="fw-semibold mb-1">Verifikasi Pelaksanaan Sanksi</h3>
        </div>
        <form action="" method="post" id="verification">
            <div class="card-body p-0">
                <div class="row gy-3 mb-4">
                    <div class="col-md-4">
                        <h6 class="fw-semibold">Tanggal Unggah File</h6>
                        <h6><?= datetime($model->action_date) ?></h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="fw-semibold">Tanggal Konfirmasi</h6>
                        <h6><?= datetime($model->action_verified_at) ?></h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="fw-semibold">Keterangan</h6>
                        <h6><?= $model->action_verified_at ? 'File '.($model->comment ? 'ditolak' : 'dikonfirmasi').' oleh '.  $model->verifier_name : 'File belum dikonfirmasi' ?></h6>
                    </div>
                    <div class="col-md-12">
                        <h6 class="fw-semibold">Catatan <small>(Wajib diisi jika ditolak)</small></h6>
                        <input type="hidden" name="type">
                        <textarea name="comment" class="form-control" rows="4" placeholder="Tulis catatan Anda di sini..."><?= $model->comment ?></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="<?= $back ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <div>
                        <button type="button" onclick="tolak()" class="btn btn-danger me-2"><i class="fa-solid fa-close"></i> Tolak</button>
                        <button type="button" onclick="setuju()" class="btn btn-primary"><i class="fa-solid fa-check"></i> Setuju</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const tolak = () => {
        $('input[name="type"]').val('action_rejected');
        if (!$('textarea[name="comment"]').val()){
            swalBootstrap.fire({
                title: "Peringatan!",
                text: "Catatan wajib diisi jika ditolak!",
                icon: "warning"
            });
            return;
        }
        swalBootstrap.fire({
            title: "Apakah anda yakin menolak pelaksanaan sanksi ini?",
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: "Ya, tolak",
            cancelButtonText: "Tidak, batal",
            
        }).then((result) => {
            if (result.isConfirmed) {
                $('#verification').submit();
            }
        });
    }

    const setuju = () => {
        $('input[name="type"]').val('done');
        swalBootstrap.fire({
            title: "Apakah anda yakin menyetujui pelaksanaan sanksi ini?",
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: "Ya, setuju",
            cancelButtonText: "Tidak, batal",
            
        }).then((result) => {
            if (result.isConfirmed) {
                $('#verification').submit();
            }
        });
    }
</script>