<?php 

  //  1. Componenete COMPOSER
  require '../../vendor/autoload.php';

  //  2. Namespace
  use Spipu\Html2Pdf\Html2Pdf;
  use Spipu\Html2Pdf\Exception\Html2PdfException;
  use Spipu\Html2Pdf\Exception\ExceptionFormatter;

  try {
    //  3. Instancia
    //  Intentar => acciones que deseamos ejecutar
    //  constructor (Orientación[Portrait|Landscape], TipoPapel, idioma)
    $reporte = new Html2Pdf("P", "A4", "es", true, "UTF-8", [15,20,15,10]);
    $reporte -> setDefaultFont("Arial");

    //  Actualización
    //  Ahora nuestro archivo de contenido recibirá datos dinámicos (variables, arreglos, objetos)
    $desarrollador = "Nestor PQ";
    $dataTables = [
      ["sede" => "Chincha", "carrera" => "Ingenieria de Software"],
      ["sede" => "Pisco", "carrera" => "Mecánica Automotriz"],
      ["sede" => "Ica", "carrera" => "Mecatrónica Industrial"],
      ["sede" => "Ayacucho", "carrera" => "Diseño Grafico Digital"]
    ];
    $carreras = ["Electricista","Soldadura","Mecanico Mantenimiento","Administración"];


    //  Iniciamos la lectura del archivo
    ob_start();
    include './estilos.html';
    include './reporte3-contenido.php';
    $contenido = ob_get_clean();

    $reporte -> writeHTML($contenido);

    $reporte -> output("Reporte.pdf");


  } catch (Html2PdfException $e) {
    //  Error => debemos realizar alguna acción
    $reporte -> clean();
    $datosError = new ExceptionFormatter($e);

    //  Mostrar error en el navegador
    echo $datosError -> getHtmlMessage();
  }