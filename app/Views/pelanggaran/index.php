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
            <!-- <div class="col-md-5 d-flex align-items-center">
                <label for="tanggal" class="form-label fw-semibold me-4 mb-0">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div> -->
        </div>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th data-field="report_date" class="text-nowrap">Tanggal</th>
                <th data-field="violation_number" class="text-nowrap">Nomor Pelaporan</th>
                <th data-field="name" class="text-nowrap">Pelapor</th>
                <th data-field="violation_type_name" class="text-truncate max-w-20">Pelanggaran</th>
                <th data-field="sanction_level" class="text-nowrap">Level</th>
                <th data-field="status" class="text-nowrap">Status</th>
                <th data-field="violation_id" class="text-nowrap">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
<script>
const $table = $('#table');
const $status = JSON.parse('<?=json_encode($status)?>');
const $status_class = JSON.parse('<?=json_encode($status_class)?>');
$(function() {
    // Attach change event listeners to dropdowns
    $('#prodi, #kelas').change(function() {
        reloadTable();
    });
})
// Function to update table data based on filters
function reloadTable() {
    const prodi = $('#prodi').val();
    const kelas = $('#kelas').val();

    // Reload the table with new URL params
    $table.bootstrapTable('refresh', {
        url: `/pelaporan?prodi=${prodi}&kelas=${kelas}`
    });
}

function statusFormat(value, row, index) {
    const statusLabel = $status[row.status] || row.status;
    const statusClass = $status_class[row.status] || 'secondary';

    return `<span class="fs-6 fw-normal px-2 py-1 badge border border-${statusClass} badge-${statusClass} text-${statusClass}">${statusLabel}</span>`;
}

function actionFormat(value, row, index) {
    return `<a href='/pelanggaran/detail/${value}' class="btn btn-sm btn-secondary">Detail</a>`
}

// Initialize the Bootstrap table
$table.bootstrapTable({
    pagination: true,
    search: true,
    url: '/pelanggaran',
    sidePagination: 'server',
    toolbar: '.table-toolbar',
    columns: [{
        field: 'report_date',
        title: 'Tanggal',
        width: '1',
        sortable: true
    }, {
        field: 'violation_number',
        title: 'Nomor Pelaporan',
        width: '1',
        sortable: true
    }, {
        field: 'name',
        title: 'Pelapor',
        width: '1',
        sortable: true
    }, {
        field: 'violation_type_name',
        title: 'Pelanggaran',
    }, {
        field: 'sanction_level',
        title: 'Level',
        width: '1',
        sortable: true,
    }, {
        field: 'status',
        title: 'Status',
        formatter: statusFormat,
        width: '1'
    }, {
        field: 'violation_id',
        title: 'Aksi',
        formatter: actionFormat,
        width: '1'
    }]
});
</script>