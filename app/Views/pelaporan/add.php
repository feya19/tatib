<h2 class="mb-4 fw-semibold"><?= $title ?></h2>
<?php \Core\Controller::view('layouts/message'); ?>
<div class="container-fluid p-4 bg-white rounded">
    <form action="/pelaporan/tambah" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="tanggal">Tanggal <span class="text-danger">*</span></label>
            <input required type="text" placeholder="Masukkan tanggal kejadian" name="report_date" id="tanggal" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nim">Mahasiswa <span class="text-danger">*</span></label>
            <select required name="nim" placeholder="Masukkan NIM/Nama Mahasiswa" id="nim" class="form-select">
             <option value=""></option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pelanggaran">Pelanggaran <span class="text-danger">*</span></label>
            <select required name="violation_type_id" id="pelanggaran" class="form-select">
            <option value=""></option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="evidence">Bukti Pelanggaran <span class="text-danger">*</span></label>
            <input class="form-control" type="file" name="photo_evidence" id="file" required accept="image/jpg,image/png,image/jpeg">
            <small class="mt-1 text-muted">
                Format file: jpg, jpeg, png
            </small>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Keterangan</label>
            <textarea rows="4" name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/pelaporan" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <button type="button" onclick="submitLaporan()" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        </div>
    </form>
</div>

<script>
    $('#tanggal').flatpickr();
    $('#nim').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Masukkan NIM/Nama Mahasiswa',
        minimumInputLength: 1,
        ajax: {
            delay: 250,
            url: '',
            data: function (params) {
                var query = {
                    type: 'nim',
                    search: params.term
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });
    $('#pelanggaran').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Masukkan Pelanggaran',
        minimumInputLength: 1,
        ajax: {
            delay: 250,
            url: '',
            data: function (params) {
                var query = {
                    type: 'pelanggaran',
                    search: params.term
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });

    const submitLaporan = () => {
        const form = document.querySelector('form');

        if (form.checkValidity()) {
            swalBootstrap.fire({
                title: "Apakah anda yakin membuat laporan ini?",
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonText: "Ya, simpan",
                cancelButtonText: "Tidak, batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            form.reportValidity();
        }
    };

</script>