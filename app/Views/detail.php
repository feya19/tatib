<h2 class="mb-4 fw-semibold"><?= $title ?></h2>

<div id="detail">
<div class="container mt-5">
        <!--Detail Pelanggaran (view) -->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="text-dark d-flex align-items-center ">
                <h3 class="p-2 mb-1">Detail Pelanggaran</h3>
                <span class="badge bg-success" style="font-size: 1.2em; padding: 0.4em 0.8em;">Selesai</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <h6>Hari, Tanggal</h6>
                            <h5>Senin, 11 November 2024</h5><br>
                        </div>
                        <div>
                            <h6>NIM</h6>
                            <h5>2341702234</h5><br>
                        </div>
                        <div>
                            <h6>Nama Mahasiswa</h6>
                            <h5>Anya Callistta Chriswantiari</h5><br>
                        </div>
                        <div>
                            <h6>Kelas</h6>
                            <h5>TI 2A</h5><br>
                        </div>
                        <div>
                            <h6>Nama Pelapor</h6>
                            <h5>Azizi Asadel S.T., M.Kom.</h5><br>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="col-12">
                            <h6>Pelanggaran</h6>
                            <h5>Berkomunikasi dengan tidak sopan, baik tertulis atau tidak tertulis kepada
                                mahasiswa, dosen, karyawan, atau orang lain.</h5><br>
                        </div>
                        <div class="col-12">
                            <h6>Tingkat</h6>
                            <h5>V</h5><br>
                        </div>
                        <div class="col-12">
                            <h6>Sanksi</h6>
                            <h5>Teguran lisan disertai dengan surat pernyataan tidak mengulangi perbuatan tersebut,
                                dibubuhi materai, ditandatangani mahasiswa yang bersangkutan dan DPA.</h5><br>
                        </div>
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Keterangan tambahan</h5><br>
                        </div>

                    </div>

                    <!-- Bukti Pelanggaran -->
                    <div class="col-md-3 text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="https://via.placeholder.com/300" alt="Bukti Pelanggaran"
                                class="img-fluid rounded">
                        </a>
                        <p class="mt-2"><strong>Bukti Pelanggaran</strong></p>
                        <a href="https://via.placeholder.com/300" download="bukti_pelanggaran.jpg"
                            class="btn btn-primary">Download Bukti</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal untuk preview gambar -->
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

        <!--Verifikasi Laporan Pelanggaran (DPA/SEKJUR) -->
        <div class="p-4 card mb-4 shadow-sm">

            <div class="text-dark d-flex align-items-center">
                <h3 class="p-2 mb-1">Verifikasi Laporan Pelanggaran</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Unggah Laporan</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Konfirmasi</h6>
                            <h5>-</h5><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Laporan belum dikonfirmasi.</h5><br>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Catatan (Wajib diisi jika ditolak)</h6>
                        <textarea class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..."></textarea>
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <div class="d-flex justify-content-center" style="gap: 300px;">
                            <button type="button" class="btn btn-danger px-4 py-2" style="width: 250px;">Tolak</button>
                            <button type="button" class="btn btn-success px-4 py-2"
                                style="width: 250px;">Setujui</button>
                        </div>
                    </div>

                    <!-- <div class="col-md-12 text-center mt-4">
                        <div class="d-flex justify-content-center" style="gap: 300px;">
                            <button type="button" class="btn btn-outline-danger" style="width: 250px;">Tolak</button>
                            <button type="button" class="btn btn-outline-success" style="width: 250px;">Setujui</button>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

        <!-- Verifikasi Laporan Pelanggaran (View)-->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="text-dark d-flex align-items-center">
                <h3 class="p-2 mb-1">Verifikasi Laporan Pelanggaran</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Unggah Laporan</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Konfirmasi</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Laporan diterima oleh Mungki Astiningrum.</h5><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h6>Catatan </h6>
                            <h5>Keterangan tambahan</h5><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pelaksanaan Sanksi (Mahasiswa) -->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="text-dark">
                <h3 class="mb-3">Pelaksanaan Sanksi</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <label for="uploadSanksi" class="form-label fw-bold">Bukti Pengerjaan Sanksi</label>
                        <input class="form-control" type="file" id="uploadSanksi">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary px-5 py-2">
                            Unggah Bukti Sanksi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pelaksanaan Sanksi (View) -->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="text-dark mb-0">Pelaksanaan Sanksi</h3>
                <button type="button" class="btn btn-outline-primary px-5 py-2"
                    onclick="previewPDF('path/to/Laporan_Pengerjaan_Sanksi_2341702234.pdf')">
                    Lihat Pratinjau
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h6>Bukti Pengerjaan Sanksi</h6>
                        <div class="d-flex align-items-center">
                            <a href="path/to/Laporan_Pengerjaan_Sanksi_2341702234.pdf" id="downloadSanksi"
                                class="btn btn-link" download>
                                Laporan Pengerjaan Sanksi_2341702234.pdf
                            </a>
                            <span class="text-muted">15 November 2024, 09:00 AM</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Laporan diterima oleh Mungki Astiningrum.</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>catatan</h6>
                            <h5>jangan diulang ya dik ya</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Verifikasi Pelaksanaan Sanksi (DPA/SEKJUR) -->
        <div class="p-4 card mb-4 shadow-sm">

            <div class="text-dark d-flex align-items-center">
                <h3 class="p-2 mb-1">Verifikasi Pelaksanaan Sanksi</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Unggah Laporan</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Konfirmasi</h6>
                            <h5>-</h5><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Pelaksanaan Sanksi belum dikonfirmasi.</h5><br>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Catatan (Wajib diisi jika ditolak)</h6>
                        <textarea class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..."></textarea>
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <div class="d-flex justify-content-center" style="gap: 300px;">
                            <button type="button" class="btn btn-danger px-4 py-2" style="width: 250px;">Tolak</button>
                            <button type="button" class="btn btn-success px-4 py-2"
                                style="width: 250px;">Setujui</button>
                        </div>
                    </div>

                    <!-- <div class="col-md-12 text-center mt-4">
                        <div class="d-flex justify-content-center" style="gap: 300px;">
                            <button type="button" class="btn btn-outline-danger" style="width: 250px;">Tolak</button>
                            <button type="button" class="btn btn-outline-success" style="width: 250px;">Setujui</button>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

        <!-- Verifikasi Pelaksanaan Sanksi  (View)-->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="text-dark d-flex align-items-center">
                <h3 class="p-2 mb-1">Verifikasi Pelaksanaan Sanksi</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Unggah Laporan</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>Tanggal Konfirmasi</h6>
                            <h5>11 November 2024</h5><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <h6>Keterangan</h6>
                            <h5>Laporan diterima oleh Mungki Astiningrum.</h5><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h6>Catatan </h6>
                            <h5>Keterangan tambahan</h5><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumen Pembebasan Pelanggaran -->
        <div class="p-4 card mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="text-dark mb-0">Dokumen Pembebasan Pelanggaran</h3>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary px-5 py-2"
                        onclick="previewPDF('path/to/Surat_Bebas_Pelanggaran_2341702234.pdf')">
                        Lihat Pratinjau
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Surat Bebas Pelanggaran -->
                    <div class="col-md-12 mb-3">
                        <h6>Surat Bebas Pelanggaran</h6>
                        <div class="d-flex align-items-center">
                            <a href="path/to/Surat_Bebas_Pelanggaran_2341702234.pdf" id="downloadSurat"
                                class="btn btn-link" download>
                                Surat Bebas Pelanggaran_2341702234.pdf
                            </a>
                            <span class="text-muted">15 November 2024, 09:00 AM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal untuk menampilkan preview PDF -->
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
</div>

<script>
        function previewPDF(pdfUrl) {
            // Atur sumber (src) iframe dengan URL PDF yang diklik
            document.getElementById('pdfViewer').src = pdfUrl;

            // Tampilkan modal dengan iframe PDF
            var pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'), {
                keyboard: false
            });
            pdfModal.show();
        }
        $(document).ready(function () {
            // AJAX call for downloading report documents
            $("#downloadSanksi").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/path/to/download/sanksi", // replace with your download link
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
                    url: "/path/to/download/surat", // replace with your download link
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