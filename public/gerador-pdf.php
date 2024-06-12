<?php

use Dompdf\Dompdf;

require_once __DIR__ . '/../vendor/autoload.php';

$dompdf = new Dompdf();

ob_start();
require_once __DIR__ . '/conteudo-pdf.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream();