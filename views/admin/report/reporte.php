<?php

//  1. Componenete COMPOSER
require '../../../vendor/autoload.php';

//  2. Namespace
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;



if (isset($_GET['reporte'])) {
  $objeto_recibido = json_decode(urldecode($_GET['reporte']), true);
} else {
  // echo "No se recibió ningún objeto.";
}

try {
  //  3. Instancia
  //  Intentar => acciones que deseamos ejecutar
  //  constructor (Orientación[Portrait|Landscape], TipoPapel, idioma)
  $reporte = new Html2Pdf("P", "A4", "es", true, "UTF-8", [15, 20, 15, 10]);
  $reporte->setDefaultFont("Arial");

  //  Iniciamos la lectura del archivo
  ob_start();
  include './estilos.html';
  include './reporte-General.php';
  $contenido = ob_get_clean();

  $reporte->writeHTML($contenido);

  $reporte->output("Reporte.pdf");
} catch (Html2PdfException $e) {
  //  Error => debemos realizar alguna acción
  $reporte->clean();
  $datosError = new ExceptionFormatter($e);

  //  Mostrar error en el navegador
  echo $datosError->getHtmlMessage();
}
