<!doctype html>
<html lang="es">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <?php require_once '../header/header.php'; ?>



  <div class="container text-center">
    <h1 class="my-4">Alquiler de Autos</h1>
    <img src="../../images/fondodash.jpg" class="img-fluid" alt="Imagen de fondo" style="max-width: 100%; height: auto;">
  </div>

  <div class="card my-4 container">
    <h2 class="text-center mb-4">Nuestros Autos Disponibles</h2>

    <p class="mx-auto text-center">
      CMG Car Rental es una empresa de servicio de alquiler de autos compactos y sedan, para cualquier TIPO DE EVENTO que el cliente solicite, POR DÍAS, SEMANAS O MESES, nuestra principal característica es que contamos con precios altamente competitivos acompañado de una atención personalizada, rápida y efectiva, con personal comprometido y capacitado para entregar a nuestros clientes soluciones a sus requerimientos con eficacia y eficiencia.
      Todas nuestras unidades cuentan con Póliza de Seguro Contra Todo Riesgo, Servicio 24/365 estamos siempre disponible para atenderlo, obtén un servicio rápido, simple y de calidad.
    </p>

    <div class="row justify-content-center">
      <div class="col-md-2 mb-4 ms-2 me-1">
        <div class="card">
          <img src="../../images/Toyota_Etios.jpg" class="card-img-top" alt="Imagen del Auto 1">
          <div class="card-body">
            <h5 class="card-title">Toyota Etios</h5>
            <p class="card-text">Super cómodo y elegante, listo para aventuras de mucho recorrido.</p>
            <p class="card-text"><small class="text-muted">Precio por día: S/.65</small></p>
            <p class="card-text"><small class="text-muted">Precio por semana: S/.430</small></p>
            <a href="../detallesauto/detalles.html" class="btn btn-primary d-block mx-auto">Quiero alquilarlo</a>
          </div>
        </div>
      </div>
      <!-- Se repiten bloques similares para otros autos disponibles -->
      <div class="col-md-2 mb-4">
        <div class="card">
          <img src="../../images/Kia_Rio.jpg" class="card-img-top" alt="Imagen del Auto 1">
          <div class="card-body">
            <h5 class="card-title">Kia Rio</h5>
            <p class="card-text">Super cómodo y elegante, listo para aventuras de mucho recorrido.</p>
            <p class="card-text"><small class="text-muted">Precio por día: S/.75</small></p>
            <p class="card-text"><small class="text-muted">Precio por semana: S/.440</small></p>
            <a href="#" class="btn btn-primary d-block mx-auto">Quiero alquilarlo</a>
          </div>
        </div>
      </div>
      <div class="col-md-2 mb-4">
        <div class="card">
          <img src="../../images/Kia_Rio.jpg" class="card-img-top" alt="Imagen del Auto 1">
          <div class="card-body">
            <h5 class="card-title">Kia Rio</h5>
            <p class="card-text">Super cómodo y elegante, listo para aventuras de mucho recorrido.</p>
            <p class="card-text"><small class="text-muted">Precio por día: S/.75</small></p>
            <p class="card-text"><small class="text-muted">Precio por semana: S/.440</small></p>
            <a href="#" class="btn btn-primary d-block mx-auto">Quiero alquilarlo</a>
          </div>
        </div>
      </div>

      <div class="col-md-2 mb-4 ms-1 me-3">
        <div class="card">
          <img src="../../images/Kia_soluto.jpg" class="card-img-top" alt="Imagen del Auto 1">
          <div class="card-body">
            <h5 class="card-title">Toyota Soluto</h5>
            <p class="card-text">Super cómodo y elegante, listo para aventuras de mucho recorrido.</p>
            <p class="card-text"><small class="text-muted">Precio por día: S/.80</small></p>
            <p class="card-text"><small class="text-muted">Precio por semana: S/.530</small></p>
            <a href="#" class="btn btn-primary d-block mx-auto">Quiero alquilarlo</a>
          </div>
        </div>
      </div>

      <footer>
        <?php //include '../footer/footer.php'; ?>
      </footer>


      <!-- Bootstrap JavaScript Libraries -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> -->
</body>

</html>