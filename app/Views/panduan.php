<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Tata Tertib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-icons.min.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

</head>

<body id="panduan">
    <div class="container mt-4">
        <!-- Kontainer 1: Tingkat Pelanggaran dan Akumulasi Sanksi -->
        <div class="container-custom">
            <div class="row mb-4">
                <div class="col-md-5">
                    <h4>Tingkat Pelanggaran</h4>
                    <table class="table table-bordered table-custom">
                        <thead>
                            <tr>
                                <th>Tingkat</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($levels)): ?>
                                <?php foreach ($levels as $level): ?>
                                    <tr>
                                        <td><span class="badge-level"><?= htmlspecialchars($level['level_name']); ?></span></td>
                                        <td><?= htmlspecialchars($level['description']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data tingkat pelanggaran.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="alert alert-custom" role="alert">
                        <h4 class="alert-heading">Akumulasi Sanksi Pelanggaran</h4>
                        <p class="mb-0">Perbuatan / tindakan pelanggaran Tata Tertib Kehidupan Kampus akan
                            diakumulasikan untuk setiap kategori pelanggaran dan berlaku sepanjang mahasiswa masih
                            tercatat sebagai mahasiswa di Polinema.</p>
                        <ul>
                            <li>Apabila pelanggaran tingkat V dilakukan 3 (tiga) kali maka klasifikasi pelanggaran
                                tersebut
                                ditingkatkan menjadi pelanggaran tingkat IV.</li>
                            <li>Apabila pelanggaran tingkat IV dilakukan 3 (tiga) kali maka klasifikasi pelanggaran
                                tersebut
                                ditingkatkan menjadi pelanggaran tingkat III.</li>
                            <li>Apabila pelanggaran tingkat III dilakukan 3 (tiga) kali maka klasifikasi pelanggaran
                                tersebut ditingkatkan menjadi pelanggaran tingkat II.</li>
                            <li>Apabila pelanggaran tingkat II dilakukan 3 (tiga) kali maka klasifikasi pelanggaran
                                tersebut
                                ditingkatkan menjadi pelanggaran tingkat I.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<!-- Kontainer 2: Klasifikasi Pelanggaran -->
<div class="container-custom">
    <div class="row mb-4">
        <div class="col-md-12">
            <h4>Klasifikasi Pelanggaran</h4>
            <div class="row filter-inputs mb-3">
                <div class="col-md-3">
                    <select id="filterLevel" class="form-select">
                        <option value="">Semua Tingkat</option>
                        <option value="V">V (Pelanggaran ringan)</option>
                        <option value="IV">IV (Pelanggaran sedang)</option>
                        <option value="III">III (Pelanggaran cukup berat)</option>
                        <option value="II">II (Pelanggaran berat)</option>
                        <option value="I">I (Pelanggaran sangat berat)</option>
                    </select>
                </div>
                <div class="col-md-9">
                <input class="form-control me-2" type="search" id="searchPelanggaran" placeholder="Cari pelanggaran..." >
                </div>  
            </div>
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th style="width: 5%; position: sticky ;top: 0;">No</th>
                        <th style="position: sticky;top: 0;">Pelanggaran</th>
                        <th style="width: 8%; position: sticky;top: 0;">Tingkat</th>
                    </tr>
                </thead>
                <tbody id="pelanggaranTable">
                    <?php if (!empty($violations)): ?>
                        <?php foreach ($violations as $violation): ?>
                            <tr>
                                <td><?= htmlspecialchars($violation['type_id']); ?></td>
                                <td><?= htmlspecialchars($violation['type_name']); ?></td>
                                <td><span class="badge-level"><?= htmlspecialchars($violation['level_name']); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada pelanggaran yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
       <!-- Kontainer 3: Sanksi Pelanggaran -->
        <!-- Kontainer 3: Sanksi Pelanggaran -->
        <div class="container-custom">
            <div class="row">
                <div class="col-md-12">
                    <h4>Sanksi Pelanggaran</h4>
                    <table class="table table-bordered table-custom">
                        <thead>
                            <tr>
                                <th style="width: 8%;">Tingkat</th>
                                <th>Sanksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($sanctions)): ?>
                                <?php foreach ($sanctions as $sanction): ?>
                                    <tr>
                                        <td><span class="badge-level"><?= htmlspecialchars($sanction['level_name']); ?></span></td>
                                        <td><?= htmlspecialchars($sanction['sanction_description']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data sanksi pelanggaran.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function loadPelanggaran() {
                var level = $('#filterLevel').val();
                var search = $('#searchPelanggaran').val();

                $.get('/panduan', { level: level, search: search }, function (response) {
                    $('#pelanggaranTable').html($(response).find('#pelanggaranTable').html());
                });
            }

            $('#searchPelanggaran').on('keypress', function (e) {
                if (e.which === 13) {
                    loadPelanggaran();
                }
            });

            $('#filterLevel').on('change', loadPelanggaran);

            var params = new URLSearchParams(window.location.search);
            $('#filterLevel').val(params.get('level'));
            $('#searchPelanggaran').val(params.get('search'));
        });
    </script>
</body>
</html> 