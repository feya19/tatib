<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <a href="#" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            <i class="fa fa-plus"></i>
            Tambah
        </a>
    </div>
</div>

<div class="container-fluid p-4 bg-white rounded">
    <table id="table">
        <thead>
            <tr>
                <th data-field="nim" class="text-nowrap">NIM</th>
                <th data-field="username" class="text-nowrap">Username</th>
                <th data-field="email" class="text-nowrap">Email</th>
                <th data-field="name" class="text-nowrap">Nama Mahasiswa</th>
                <th data-field="class_name" class="text-nowrap">Kelas</th>
                <th data-field="program_study_name" class="text-truncate max-w-20">Program Studi</th>
                <th data-field="student_year" class="text-nowrap">Angkatan</th>
                <th data-field="aksi" class="text-nowrap">Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataForm" action="/data_user/addMhs" method="post" >
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Mahasiswa" required>
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
                        <label for="class_id" class="form-label">Kelas</label>
                        <select class="form-select" id="class_id" name="class_id" required>
                            <option value="">Pilih Kelas</option>
                            <option value="6">TI-1A</option>
                            <option value="1">TI-2A</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="student_year" class="form-label">Tahun Masuk</label>
                        <input type="number" class="form-control" id="student_year" name="student_year" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
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
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Mahasiswa" required>
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
                        <label for="class_id" class="form-label">Kelas</label>
                        <select class="form-select" id="class_id" name="class_id" required>
                            <option value="">Pilih Kelas</option>
                            <option value="TI-1A">TI-1A</option>
                            <option value="TI-2A">TI-2A</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="student_year" class="form-label">Tahun Masuk</label>
                        <input type="number" class="form-control" id="student_year" name="student_year" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    const $table =  $('#table');
    function actionFormat(value, row, index) {
        return `
        <div class="btn-group btn-group-sm gap-2 d-flex justify-content-center">
            <a href='#' class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDataModal">Edit</a>
            <a href='#' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a>
        </div>
        `
    }

    $table.bootstrapTable({
        pagination: true,
        search: true,
        url: '/data_user/mahasiswa', // Initial URL
        sidePagination: 'server',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'nim',
                title: 'NIM',
                width: '1', 
                sortable: true
            }, {
                field: 'username',
                title: 'Username',
                width: '1',
                sortable: true
            }, {
                field: 'email',
                title: 'Email',
                width: '1',
                sortable: true
            }, {
                field: 'name',
                title: 'Nama Mahasiswa',
                width: '1',
                sortable: true
            }, {
                field: 'class_name',
                title: 'Kelas',
                width: '1', 
                sortable: true
            }, {
                field: 'program_study_name',
                title: 'Program Studi',
                width: '1',
                sortable: true
            }, {
                field: 'student_year',
                title: 'Tahun Masuk',
                width: '1', 
                sortable: true
            }, {
                field: 'aksi',
                title: 'Aksi',
                formatter: actionFormat,
                width: '1',
            }
        ],
    });
</script>

<style>
    .modal .form-control {
        font-size: 14px;
    }

    .btn-group-sm .btn {
        padding: 0.3rem 0.5rem; 
    }
</style>
