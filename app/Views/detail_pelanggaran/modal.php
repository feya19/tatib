<!-- Modal preview PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Pratinjau Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfViewer" src="" frameborder="0" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <a href="" id="downloadLink" class="btn btn-primary" download>Unduh PDF</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal preview gambar -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Preview Bukti Pelanggaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="https://via.placeholder.com/800" alt="Bukti Pelanggaran" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        function previewPDF(pdfUrl) {
            document.getElementById('pdfViewer').src = pdfUrl;
            var pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'), {
                keyboard: false
            });
            pdfModal.show();
        }
        $(document).ready(function () {
            $("#downloadSanksi").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/path/to/download/sanksi",
                    method: "GET",
                    success: function () {
                        alert("Dokumen sanksi sedang diunduh...");
                    },
                    error: function () {
                        alert("Gagal mengunduh dokumen.");
                    }
                });
            });

            $("#downloadSurat").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/path/to/download/surat",
                    method: "GET",
                    success: function () {
                        alert("Surat pembebasan pelanggaran sedang diunduh...");
                    },
                    error: function () {
                        alert("Gagal mengunduh surat pembebasan.");
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>