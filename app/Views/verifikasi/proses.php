<h2 class="mb-4 fw-semibold"><?=$title?></h2>
<?php \Core\Controller::view('layouts/message'); ?>
<?php

use App\Models\ViewViolationsDetails;

foreach($views as $view):
    \Core\Controller::view(ViewViolationsDetails::FILE_PATH.$view, ['model' => $model, 'back' => $back]);
endforeach;
?>

<!-- Modal preview PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">Pratinjau Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfViewer" src="" frameborder="0" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
    
<script>
    function previewPDF(pdfUrl) {
        document.getElementById('pdfViewer').src = pdfUrl;
        var pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'), {
            keyboard: false
        });
        pdfModal.show();
    }
</script>