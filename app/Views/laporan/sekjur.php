<h2 class="mb-4 fw-semibold"><?=$title?></h2>
<div class="container-fluid p-4 bg-white rounded d-flex align-items-center">
    <div class="mb-1 d-flex gap-3 align-items-end">
        <!-- Filter Tanggal -->
        <div>
            <label for="filter-start-date" class="form-label">Tanggal Awal</label>
            <input type="date" id="filter-start-date" class="form-control" />
        </div>
        <div>
            <label for="filter-end-date" class="form-label">Tanggal Akhir</label>
            <input type="date" id="filter-end-date" class="form-control" />
        </div>
        <!-- Filter Angkatan -->
        <div>
            <label for="filter-student-year" class="form-label">Angkatan</label>
            <input type="number" id="filter-student-year" class="form-control" placeholder="Contoh: 2023" />
        </div>
        <!-- Filter Status -->
        <div>
            <label for="filter-status" class="form-label">Status</label>
            <select id="filter-status" class="form-select">
                <option value="">Semua</option>
                <option value="new">Baru</option>
                <option value="rejected">Ditolak</option>
                <option value="process">Diproses</option>
                <option value="action_rejected">File Ditolak</option>
                <option value="done">Selesai</option>
            </select>
        </div>
        <!-- Filter Level -->
        <div>
            <label for="filter-level" class="form-label">Level</label>
            <select id="filter-level" class="form-select">
                <option value="">Semua</option>
                <option value="V">V</option>
                <option value="IV">IV</option>
                <option value="III">III</option>
                <option value="II">II</option>
                <option value="I">I</option>
            </select>
        </div>
        <!-- Tombol Apply Filter -->
        <div>
            <button id="apply-filter" class="btn btn-primary">Terapkan Filter</button>
        </div>
    </div>
</div>
<div class="container-fluid p-4 bg-white rounded">
    <table id="table">
        <thead>
            <tr>
                <th data-field="report_date" class="text-nowrap">Tanggal</th>
                <th data-field="violation_number" class="text-nowrap">Tanggal</th>
                <th data-field="nim" class="text-nowrap">NIM</th>
                <th data-field="student_name" class="text-nowrap">Nama</th>
                <th data-field="student_class" class="text-nowrap">Kelas</th>
                <th data-field="program_study_name" class="text-truncate max-w-20">Program Studi</th>
                <th data-field="student_year" class="text-nowrap">Angkatan</th>
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
    const $table =  $('#table');
    const $status = JSON.parse('<?= json_encode($status) ?>');
    const $status_class = JSON.parse('<?= json_encode($status_class) ?>');
    // Function to update table data based on filters
    function statusFormat(value, row, index) {
        const statusLabel = $status[row.status] || row.status;
        const statusClass = $status_class[row.status] || 'secondary';
     
        return `<span class="fs-6 fw-normal px-2 py-1 badge badge-${statusClass}">${statusLabel}</span>`;
    }

    function actionFormat(value, row, index) {
        return `<a href='/pelanggaran/detail/${value}' class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-circle-info"></i> Detail</a>`
    }

    // Initialize the Bootstrap table
    $table.bootstrapTable({
        pagination: true,
        search: true,
        url: '/laporan/sekjur', // Initial URL
        sidePagination: 'server',
        toolbar: '.table-toolbar',
        columns: [
            {
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
                field: 'nim',
                title: 'NIM',
                width: '1',
                sortable: true
            }, {
                field: 'student_name',
                title: 'Nama Mahasiswa',
                width: '1',
                sortable: true
            }, {
                field: 'student_class',
                title: 'Kelas',
                width: '1',
                sortable: true
            },{
                field: 'program_study_name',
                title: 'Program Studi',
                width: '1',
                sortable: true
            },{
                field: 'student_year',
                title: 'Angkatan',
                width: '1',
                sortable: true
            },{
                field: 'reporter_name',
                title: 'Nama Pelapor',
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
            }
        ]
    });

    // Filter
    $('#apply-filter').on('click', function () {
        // Ambil nilai filter
        const startDate = $('#filter-start-date').val();
        const endDate = $('#filter-end-date').val();
        const studentYear = $('#filter-student-year').val();
        const status = $('#filter-status').val();
        const level = $('#filter-level').val();

        const params = {
            'start_date': startDate,
            'end_date': endDate,
            'student_year': studentYear,
            'status': status,
            'sanction_level': level,
        };

        $table.bootstrapTable('refresh', {
            query: params
        });
    });
</script>