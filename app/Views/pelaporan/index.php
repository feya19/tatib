<h2 class="mb-4 fw-semibold"><?= $title ?></h2>

<div class="container-fluid p-4 bg-white rounded">
    <a href="pelaporan/tambah" class="mb-2 btn btn-primary">
        <i class="fa fa-plus"></i>
        Tambah
    </a>
    <div class="table-toolbar">
        <div class="row align-items-center">
            <label for="prodi" class="col-sm-1 col-form-label fw-semibold">Prodi</label>
            <div class="col-sm-7 ps-4">
                <select class="form-select" name="prodi" id="prodi">
                    <option value="">Pilih</option>
                </select>
            </div>
            <label for="kelas" class="col-sm-1 col-form-label fw-semibold">Kelas</label>
            <div class="col-sm-3 ps-4">
                <select class="form-select" name="kelas" id="kelas">
                    <option value="">Pilih</option>
                </select>
            </div>
        </div>
    </div>
    <table id="table"></table>
</div>
<script>
    $('#table').bootstrapTable({
        pagination: true,
        search: true,
        url: '/pelaporan',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'report_date',
                title: 'Tanggal'
            }, {
                field: 'nim',
                title: 'NIM'
            }, {
                field: 'class_name',
                title: 'Kelas'
            }, {
                field: 'type_name',
                title: 'Pelanggaran'
            }, {
                field: 'level_name',
                title: 'Level'
            }, {
                field: 'status',
                title: 'Status'
            }, {
                field: 'violation_id',
                title: 'Aksi'
            }
        ]
    })
</script>