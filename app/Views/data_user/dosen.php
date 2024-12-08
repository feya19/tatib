<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <a href="/data_user/add" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            <i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <table id="table"></table>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataForm" action="/data_user/addDosen" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nidn" class="form-label">NIDN</label>
                        <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="class_id" name="class_id" required>
                            <option value="">Pilih Role</option>
                            <option value="Dosen Pengajar">Dosen Pengajar</option>
                            <option value="Dosen Pengajar">DPA</option>
                            <option value="Dosen Pengajar">Sekjur</option>
                            <option value="Dosen Pengajar">Admin</option>
                        </select>
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
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nidn" class="form-label">NIDN</label>
                        <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="class_id" name="class_id" required>
                            <option value="">Pilih Role</option>
                            <option value="Dosen Pengajar">Dosen Pengajar</option>
                            <option value="Dosen Pengajar">DPA</option>
                            <option value="Dosen Pengajar">Sekjur</option>
                            <option value="Dosen Pengajar">Admin</option>
                        </select>
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
        url: '/data_user/dosen', // Initial URL
        sidePagination: 'server',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'nidn',
                title: 'NIDN',
                width: '1',
                sortable: true,
            }, {
                field: 'nip',
                title: 'NIP',
                width: '1',
                sortable: true,
            }, {
                field: 'username',
                title: 'Username',
                width: '1',
                sortable: true,
            }, {
                field: 'email',
                title: 'Email',
                width: '1',
                sortable: true,
            }, {
                field: 'name',
                title: 'Nama Dosen',
                width: '1',
                sortable: true,
            }, {
                field: 'role',
                title: 'Role',
                width: '1',
                sortable: true,
            }, {
                field: 'aksi',
                title: 'Aksi',
                width: '1',
                formatter: actionFormat
            }
        ],
    });
</script>

<style>
    .btn-group-sm .btn {
        padding: 0.4rem 0.6rem;
        font-size: 0.875rem; 
        margin-right: 5px; 
    }

    .btn-group-sm .btn:last-child {
        margin-right: 0;
    }

</style>