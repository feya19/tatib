<h2 class="mb-4 fw-semibold">Daftar Pelanggaran</h2>
<p class="text-muted">Pelanggaran</p>

<div class="container-fluid p-4 bg-white rounded">
    <div class="table-toolbar">
        <div class="row align-items-center">
            <label for="prodi" class="col-sm-1 col-form-label fw-semibold">Prodi</label>
            <div class="col-sm-7 ps-4">
                <select class="form-select" name="prodi" id="prodi">
                    <option value="">D-IV Teknik Informatika</option>
                    <option value="">D-IV Sistem Informasi Bisnis</option>
                    <option value="">D-II Rekayasa Peranti Web</option>
                </select>
            </div>
            <label for="kelas" class="col-sm-1 col-form-label fw-semibold">Kelas</label>
            <div class="col-sm-3 ps-4">
                <select class="form-select" name="kelas" id="kelas">
                    <option value="">TI-2A</option>
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
        toolbar: '.table-toolbar',
        columns: [{
            field: 'id',
            title: 'Item ID'
        }, {
            field: 'name',
            title: 'Item Name'
        }, {
            field: 'price',
            title: 'Item Price'
        }],
        data: [{
            id: 1,
            name: 'Item 1',
            price: '$1'
        }, {
            id: 2,
            name: 'Item 2',
            price: '$2'
        }]
    })
</script>