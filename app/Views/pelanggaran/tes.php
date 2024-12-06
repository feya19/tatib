<h2 class="mb-4 fw-semibold"><?=$title?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <div class="row align-items-center">
            <!-- Status Filter -->
            <div class="col-md-5 d-flex align-items-center">
                <label for="status" class="form-label fw-semibold me-3 mb-0">Status:</label>
                <select class="form-select" name="status" id="status">
                    <option value="semua">Semua</option>
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <!-- Tanggal Filter -->
            <div class="col-md-5 d-flex align-items-center">
                <label for="tanggal" class="form-label fw-semibold me-4 mb-0">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
        </div>
    </div>
    <table id="table"></table>
</div>
<script>
$('#table').bootstrapTable({
    pagination: true,
    search: true,
    // searchSelector: '#search',
    toolbar: '.table-toolbar',
    columns: [{
        field: 'report_date',
        title: 'Tanggal',
        width: '90px'
    }, {
        field: 'name',
        title: 'Pelapor',
        width: '120px'
    }, {
        field: 'type_name',
        title: 'Pelanggaran',
        width: '300px'
    }, {
        field: 'level_name',
        title: 'Level',
        width: '60px'
    }, {
        field: 'status',
        title: 'Status',
        width: '70px'
    }, {
        field: 'violation_id',
        title: 'Aksi',
        width: '100px',
        formatter: function(value, row, index) {
            return '<a href="Detail/' + value +
                '" class="btn btn-sm btn-primary">Detail</a> <a href="Cetak/' + value +
                '" class="btn btn-sm btn-primaryr">Cetak</a>';
        }
    }],
    data: <?=json_encode($data)?>
})

$('#table').bootstrapTable({
    pagination: true,
    search: true,
    // searchSelector: '#search',
    toolbar: '.table-toolbar',
    columns: [{
        field: 'report_date',
        title: 'Tanggal',
        width: '90px'
    }, {
        field: 'student_name',
        title: 'Pelanggar',
        width: '120px'
    }, {
        field: 'reporter_name',
        title: 'Pelapor',
        width: '120px'
    }, {
        field: 'violation_type_name',
        title: 'Pelanggaran',
        width: '300px'
    }, {
        field: 'sanction_level',
        title: 'Level',
        width: '60px',
        align: 'center'
    }, {
        field: 'status',
        title: 'Status',
        width: '70px',
        align: 'center'
    }, {
        field: 'aksi',
        title: 'Aksi',
        width: '10px',
        formatter: function(value, row, index) {
            return '<a href="Detail/' + value +
                '" class="btn btn-sm btn-primary d-block align-items-center justify-content-center">Detail</a>';
        }
    }],
    data: <?=json_encode($data)?>
})
</script>