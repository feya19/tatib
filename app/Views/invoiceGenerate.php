<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pemberitahuan Pelanggaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 2px solid #000;
        }
        .header .logo {
            width: 80px;
            height: auto;
        }
        .header .text {
            text-align: center;
            flex: 1;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .header h2 {
            margin: 5px 0 0;
            font-size: 18px;
        }
        .address {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }
        .content {
            padding: 20px;
        }
        h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .details {
            margin: 20px 0;
            display: table;
            width: 100%;
        }
        .details p {
            margin: 5px 0;
            font-size: 16px;
            display: table-row;
        }
        .details .label {
            display: table-cell;
            font-weight: bold;
            text-align: left;
            padding-right: 15px;
            width: 13%;
        }
        .details .value {
            display: table-cell;
            text-align: left;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="header">
        <img src="public/assets/img/logo-polinema.png" alt="polinema" class="logo">
        <div class="text">
            <h1>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI
                <br>POLITEKNIK NEGERI MALANG
                <br>JURUSAN TEKNOLOGI INFORMASI
            </h1>
            <div class="address">
                <p>Jl. Soekarno Hatta No.9 Jatimulyo, Lowokwaru, Malang, 65141</p>
                <p>Telp. (0341) 404424 - 404425, Fax (0341) 404420</p>
            </div>
        </div>
        <img src="public/assets/img/logo-jti.png" alt="jti" class="logo">
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <h3>SURAT BEBAS PELANGGARAN</h3>
        <p>Dengan hormat,<br>Sehubungan dengan surat ini, dinyatakan bahwa mahasiswa:</p>

        <!-- Detail Mahasiswa -->
        <div class="details">
            <p><span class="label">Nama Mahasiswa</span><span class="value">: <?= htmlspecialchars($data['student_name']) ?></span></p>
            <p><span class="label">NIM</span><span class="value">: <?= htmlspecialchars($data['nim']) ?></span></p>
            <p><span class="label">Kelas</span><span class="value">: <?= htmlspecialchars($data['student_class']) ?></span></p>
        </div>
        <p>telah menyelesaikan sanksi dan terbebas dari pelanggaran:</p>
        
        <!-- Detail Pelanggaran -->
        <div class="details">
            <p><span class="label">Nomor Pelanggaran</span><span class="value">: <?= htmlspecialchars($data['violation_id']) ?></span></p>
            <p><span class="label">Tanggal Laporan</span><span class="value">: <?= htmlspecialchars($data['report_date']) ?></span></p>
            <p><span class="label">Pelanggaran</span><span class="value">: <?= htmlspecialchars($data['violation_type_name']) ?></span></p>
            <p><span class="label">Tingkat Pelanggaran</span><span class="value">: <?= htmlspecialchars($data['sanction_level']) ?></span></p>
            <p><span class="label">Deskripsi Sanksi</span><span class="value">: <?= htmlspecialchars($data['sanction_level_description']) ?></span></p>
        </div>

        <!-- Verifier -->
        <div class="signature">
            <p><strong>Mengetahui,</strong></p>
            <p><strong><?= htmlspecialchars($data['verifier_name']) ?></strong></p>
            <p>NIP. <?= htmlspecialchars($data['verifier_nip']) ?></p>
        </div>
    </div>
</body>
</html>
