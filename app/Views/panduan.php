<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Tata Tertib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f0f2f5;
        }

        h4 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container-custom {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .alert-custom {
            background-color: #e9f7ef;
            border-color: #d4edda;
            color: #155724;
        }

        .table-custom {
            border: 1px solid #dee2e6;
        }

        .table-custom thead th {
            background-color: #007bff;
            color: white;
        }

        .table-custom tbody tr {
            transition: background-color 0.2s ease;
        }

        .table-custom tbody tr:hover {
            background-color: #f1f1f1;
        }

        .filter-inputs {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .table-custom td,
        .table-custom th {
            vertical-align: middle;
        }

        .badge-level {
            font-size: 1rem;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
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
                            <tr>
                                <td><span class="badge-level">V</span></td>
                                <td>Pelanggaran ringan.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">IV</span></td>
                                <td>Pelanggaran sedang.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">III</span></td>
                                <td>Pelanggaran cukup berat.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">II</span></td>
                                <td>Pelanggaran berat.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">I</span></td>
                                <td>Pelanggaran sangat berat.</td>
                            </tr>
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
                        <th style="width: 10%; position: sticky;top: 0;">Tingkat</th>
                    </tr>
                </thead>
                <tbody id="pelanggaranTable">
                    <?php if (!empty($violations)): ?>
                        <?php foreach ($violations as $violation): ?>
                            <tr>
                                <td><?= htmlspecialchars($violation['type_id']); ?></td>
                                <td><?= htmlspecialchars($violation['type_name']); ?></td>
                                <td><span class="badge-level"><?= htmlspecialchars($violation['level_id']); ?></span></td>
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
        <div class="container-custom">
            <div class="row">
                <div class="col-md-12">
                    <h4>Sanksi Pelanggaran</h4>
                    <table class="table table-bordered table-custom">
                        <thead>
                            <tr>
                                <th>Tingkat</th>
                                <th>Sanksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge-level">V</span></td>
                                <td>Teguran lisan disertai dengan surat pernyataan tidak mengulangi perbuatan tersebut,
                                    dibubuhi materai, ditandatangani mahasiswa yang bersangkutan dan DPA.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">IV</span></td>
                                <td>Teguran tertulis disertai dengan pemanggilan orang tua/wali dan membuat surat
                                    pernyataan tidak mengulangi perbuatan tersebut, dibubuhi materai, ditandatangani
                                    mahasiswa, orang tua/wali, dan DPA.</td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">III</span></td>
                                <td>
                                    <li>a. Membuat surat pernyataan tidak mengulangi perbuatan tersebut, dibubuhi
                                        materai ditandatangani mahasiswa, orang tua/wali, dan DPA;</li>
                                    <li>b. Melakukan tugas khusus, misalnya bertanggungjawab untuk memperbaiki atau
                                        membersihkan kembali, dan tugas-tugas lainnya.</li>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">II</span></td>
                                <td>
                                    <li>a. Dikenakan penggantian kerugian atau penggantian benda/ barang semacamnya
                                        dan/atau.</li>
                                    <li>b. Melakukan tugas layanan sosial dalam jangka waktu tertentu dan/atau.</li>
                                    <li>c. Diberikan nilai D pada mata kuliah terkait saat melakukan pelanggaran.</li>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="badge-level">I</span></td>
                                <td>
                                    <li>a. Dinonaktifkan (Cuti Akademik/ Terminal) selama dua semester dan/atau;</li>
                                    <li>b. Diberhentikan sebagai mahasiswa.</li>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Fungsi untuk memuat ulang data berdasarkan filter dan pencarian
    function loadPelanggaran() {
        var level = $('#filterLevel').val();
        var search = $('#searchPelanggaran').val();

        // Kirim filter dan pencarian melalui URL
        window.location.href = '/panduan?level=' + encodeURIComponent(level) + '&search=' + encodeURIComponent(search);
    }

    // Fungsi untuk menangani event pencarian ketika tombol "Enter" ditekan
    $('#searchPelanggaran').on('keypress', function (e) {
        if (e.which === 13) {  // Cek apakah tombol "Enter" ditekan
            loadPelanggaran(); // Panggil fungsi loadPelanggaran
        }
    });

    // Menangani perubahan pada filter level (select)
    $('#filterLevel').on('change', function () {
        loadPelanggaran(); // Panggil fungsi loadPelanggaran saat ada perubahan pada select
    });

    // Set default value for the filter when the page loads
    $(document).ready(function () {
        var level = new URLSearchParams(window.location.search).get('level');
        var search = new URLSearchParams(window.location.search).get('search');
        
        if (level) {
            $('#filterLevel').val(level);  // Set nilai filter level sesuai query parameter
        }
        
        if (search) {
            $('#searchPelanggaran').val(search);  // Set nilai pencarian sesuai query parameter
        }
    });
</script>




</body>

</html>