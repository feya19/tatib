<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <a href="#" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            <i class="fa fa-plus"></i>
            Tambah
        </a>
    </div>
    <table id="table"></table>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="program_study_name" class="form-label">Program Studi</label>
                        <select class="form-control" id="program_study_name" name="program_study_name" required>
                            <option value="" class="text-muted">--Pilih Program Studi Mahasiswa--</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi Bisnis</option>
                            <option value="Teknik Elektro">Piranti Perangkat Lunak Sistem</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="class_name" class="form-label">Kelas</label>
                        <select class="form-control" id="class_name" name="class_name" required>
                            <option value="">--Pilih Kelas Mahasiswa--</option>
                            <option value="A">TI-1A</option>
                            <option value="B">SIB-1A</option>
                            <option value="C">PPLS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="student_year" class="form-label">Tahun Masuk</label>
                        <input type="number" class="form-control" id="student_year" name="student_year" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDataForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="program_study_name" class="form-label">Program Studi</label>
                        <select class="form-control" id="program_study_name" name="program_study_name" required>
                            <option value="" class="text-muted">--Pilih Program Studi Mahasiswa--</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi Bisnis</option>
                            <option value="Teknik Elektro">Piranti Perangkat Lunak Sistem</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="class_name" class="form-label">Kelas</label>
                        <select class="form-control" id="class_name" name="class_name" required>
                            <option value="">--Pilih Kelas Mahasiswa--</option>
                            <option value="A">TI-1A</option>
                            <option value="B">SIB-1A</option>
                            <option value="C">PPLS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="student_year" class="form-label">Tahun Masuk</label>
                        <input type="number" class="form-control" id="student_year" name="student_year" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal .form-control {
        font-size: 14px;
    }

    #table th, #table td {
        text-align: center; /* Pusatkan teks di dalam kolom */
        white-space: nowrap; /* Mencegah teks terpotong */
    }
    .btn-group-sm .btn {
        padding: 0.3rem 0.5rem; /* Kurangi padding tombol agar lebih kecil */
    }
</style>

<script>
    function actionFormat(value, row, index) {
        return `
        <div class="btn-group btn-group-sm gap-2">
            <a href='/laporan/detail/${value}' class="btn btn-sm btn-secondary">Detail</a>
            <a href='#' class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDataModal">Edit</a>
            <a href='#' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a>
        </div>
        `
    }

    $('#table').bootstrapTable({
    pagination: true,
    search: true,
    URL: '/data_user/mahasiswa',
    sidePagination: 'server',
    toolbar: '.table-toolbar',
    columns: [
        {
            field: 'nim',
            title: 'NIM',
            width: '80', // Lebar spesifik untuk data kecil
            align: 'center', // Pusatkan teks
        }, {
            field: 'name',
            title: 'Nama Mahasiswa',
            align: 'left', // Biarkan rata kiri
        }, {
            field: 'class_name',
            title: 'Kelas',
            width: '120', // Lebar proporsional
            align: 'center',
        }, {
            field: 'program_study_name',
            title: 'Program Studi',
            align: 'left', // Biarkan rata kiri
        }, {
            field: 'student_year',
            title: 'Tahun Masuk',
            width: '100', // Lebar kecil
            align: 'center',
        }, {
            field: 'aksi',
            title: 'Aksi',
            align: 'center',
            formatter: actionFormat,
        }
    ],
    data: <?= json_encode($data) ?>
});

</script>