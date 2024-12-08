<h2 class="mb-4 fw-semibold"><?=$title?></h2>

<div class="container-fluid p-4 bg-white rounded">
    <table id="table">
        <thead>
            <tr>
                <th data-field="report_date" class="text-nowrap">Tanggal</th>
                <th data-field="violation_number" class="text-nowrap">Nomor Pelaporan</th>
                <th data-field="reporter_name" class="text-nowrap">Pelapor</th>
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

function statusFormat(value, row, index) {
    const statusLabel = $status[row.status] || row.status;
    const statusClass = $status_class[row.status] || 'secondary';

    return `<span class="fs-6 fw-normal px-2 py-1 badge badge-${statusClass}">${statusLabel}</span>`;
}

function actionFormat(value, row, index) {
    let btn =  `<a href='/pelanggaran/detail/${value}' class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-circle-info"></i> Detail</a>`;
    if ((row.status == 'process' && !row.sanction_action_file) || row.status == 'action_rejected') {
        btn = `<a href='/pelanggaran/proses/${value}' class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-cog"></i> Proses</a>`;
    }
    return btn;
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
        field: 'reporter_name',
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