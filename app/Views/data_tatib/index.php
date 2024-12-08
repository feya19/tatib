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
        <div class="btn-group btn-group-sm gap-2">
            <a href='#' class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDataModal">Edit</a>
            <a href='#' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a>
        </div>
        `
    }

    function generateNumber(value, row, index) {
        const pageSize = $table.bootstrapTable('getOptions').pageSize; 
        const pageNumber = $table.bootstrapTable('getOptions').pageNumber; 
        return (pageSize * (pageNumber - 1)) + index + 1; 
    }

    $table.bootstrapTable({
        pagination: true,
        search: true,
        url: '/data_tatib', // Initial URL
        sidePagination: 'server',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'no',
                title: 'No',
                width: '50',
                align: 'center',
                formatter: generateNumber
            }, {
                field: 'type_name',
                title: 'Pelanggaran',
                width: '500',
                sortable: true
            }, {
                field: 'level_id',
                title: 'Tingkat',
                width: '70',
                align: 'center',
                sortable: true
            }, {
                field: 'aksi',
                title: 'Aksi',
                width: '100',
                align: 'center',
                formatter: actionFormat
            }
        ],
    });
</script>

