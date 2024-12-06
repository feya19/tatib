<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <a href="#" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            <i class="fa fa-plus"></i> Tambah
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
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Tata Tertib</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type_level" class="form-label">Tingkat</label>
                        <select class="form-control" id="type_level" name="type_level" required>
                            <option value="">--Pilih Tingkat Tata Tertib--</option>
                            <option value="A">V</option>
                            <option value="B">IV</option>
                            <option value="C">III</option>
                            <option value="D">II</option>
                            <option value="E">I</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_name" class="form-label">Pelanggaran</label>
                        <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Masukkan Pelanggaran" required>
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
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data Tata Tertib</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type_level" class="form-label">Tingkat</label>
                        <select class="form-control" id="type_level" name="type_level" required>
                            <option value="">--Pilih Tingkat Tata Tertib--</option>
                            <option value="A">V</option>
                            <option value="B">IV</option>
                            <option value="C">III</option>
                            <option value="D">II</option>
                            <option value="E">I</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_name" class="form-label">Pelanggaran</label>
                        <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Masukkan Pelanggaran" required>
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

<script>
    function actionFormat(value, row, index) {
        return `
            <a href='/laporan/detail/${value}' class="btn btn-sm btn-secondary">Detail</a>
            <a href='#' class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDataModal">Edit</a>
            <a href='#' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a>
        `
    }
    $('#table').bootstrapTable({
        pagination: true,
        toolbar: '.table-toolbar',
        search: true ,
        columns: [
            {
                field: 'type_id',
                title: 'No',
                width: '5%',
                align: 'center'
            },
            {
                field: 'type_name',
                title: 'Pelanggaran',
                width: '70%'
            },
            {
                field: 'level_id',
                title: 'Tingkat',
                width: '10%',
                align: 'center'
            },
            {
                field: 'aksi',
                title: 'Aksi',
                width: '10%',
                align: 'center',
                formatter: actionFormat
            }
        ],
        data:<?= json_encode($data) ?>
    })
</script>