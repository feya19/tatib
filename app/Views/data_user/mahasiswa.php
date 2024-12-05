<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<div class="container-fluid p-4 bg-white rounded">
    <a href="mhs_tambah" class="mb-2 btn btn-primary">
        <i class="fa fa-plus"></i>
        Tambah
    </a>
    <div class="table-toolbar">
        <div class="row align-items-center">
            <label for="prodi" class="col-sm-1 col-form-label fw-semibold">Prodi</label>
            <div class="col-sm-7 ps-4">
                <select class="form-select" name="prodi" id="prodi">
                    <option value="semua">Semua</option>
                    <option value="sib">D-IV Sistem Informasi Bisnis</option>
                    <option value="ti">D-IV Teknik Informatika</option>
                    <option value="ppls">D-II Pengembangan Piranti Lunak Situs</option>
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
        search: true ,
        // searchSelector: '#search',
        toolbar: '.table-toolbar',
        columns: [
            {
                field: 'nim',
                title: 'NIM',
                width: '90px'
            }, {
                field: 'name',
                title: 'Nama Mahasiswa',
                width: '120px'
            }, {
                field: 'class_name',
                title: 'Kelas',
                width: '120px'
            }, {
                field: 'program_study_name',
                title: 'Program Studi',
                width: '120px'
            }, {
                field: 'student_year',
                title: 'Tahun Masuk',
                width: '50px'
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