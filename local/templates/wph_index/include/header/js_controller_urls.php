<?php
use Kolos\Studio\Helpers\AjaxHelper;
?>

<script data-skip-moving="true">
    window.createPageFromPDF = '<?= AjaxHelper::getControllerActionUrl(new \Kolos\Studio\Controllers\PdfController(), 'pagesPDF') ?>';
</script>

