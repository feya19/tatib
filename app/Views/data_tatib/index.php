<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <a href="mhs_tambah" class="mb-4 btn btn-primary">
        <i class="fa fa-plus"></i>
        Tambah
    </a>
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
    <table id="table"></table>
</div>
<script>
    $('#table').bootstrapTable({
        pagination: true,
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'type_id',
                title: 'No',
                width: '5px',
                align: 'center',
            }, {
                field: 'type_name',
                title: 'Pelanggaran',
                width: '700px'
            }, {
                field: 'level_id',
                title: 'Tingkat',
                width: '5px',
                align: 'center',
            }, {
                field: 'aksi',
                title: 'Aksi',
                width: '100px',
                formatter: function(value, row, index) {
                    return '<a href="Detail/'+ value +'" class="btn btn-sm btn-primary">Detail</a> <a href="Cetak/'+ value +'" class="btn btn-sm btn-primaryr">Cetak</a>';
                }
            }
        ],
        data:<?= json_encode($data) ?>
    })
</script>