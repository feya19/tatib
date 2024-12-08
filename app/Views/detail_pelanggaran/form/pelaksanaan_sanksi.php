<div class="mt-4">
    <!-- Pelaksanaan Sanksi (Mahasiswa) -->
    <div class="p-4 card shadow-sm">
        <h3 class="fw-semibold mb-3">Pelaksanaan Sanksi</h3>
        <div class="card-body p-0">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="uploadSanksi" class="form-label">Bukti Pengerjaan Sanksi <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" accept="application/pdf" required name="sanction_action_file" id="uploadSanksi">
                    <small class="mt-1 text-muted">
                        Format file: pdf
                    </small>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/pelanggaran" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <button type="button" onclick="simpan()" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const simpan = () => {
        const form = document.querySelector('form');

        if (form.checkValidity()) {
            swalBootstrap.fire({
                title: "Apakah anda yakin mengunggah file ini?",
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonText: "Ya, simpan",
                cancelButtonText: "Tidak, batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            form.reportValidity();
        }
    }
</script>