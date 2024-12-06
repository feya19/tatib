<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <a href="mhs_tambah" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        Tambah
    </a>
    <table id="table"></table>
</div>
<script>
    $('#table').bootstrapTable({
        pagination: true,
        search: true ,
        // searchSelector: '#search',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'nidn',
                title: 'NIDN',
                width: '90px'
            }, {
                field: 'nip',
                title: 'NIP',
                width: '90px'
            }, {
                field: 'name',
                title: 'Nama Dosen',
                width: '120px'
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