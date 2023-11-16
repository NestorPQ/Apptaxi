<!doctype html>
<html lang="es">

<head>
  <title>Contenido</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>

<body>

  <?php require_once '../slidemenu/slidemenu.php'; ?>

  <div style="width: 70%;">
    <canvas id="migrafico"></canvas>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <!-- CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    function $(id) {
      return document.querySelector(id);
    }

    //  Referenciamos
    const contexto = document.querySelector("#migrafico");

    const departamentos = [
      { departamento: "Ica", dato: 24 },
      { departamento: "Lima", dato: 67 },
      { departamento: "Arequipa", dato: 73 },
      { departamento: "Cuzco", dato: 46 },
    ];

    const coloresBorde = [
      "rgba(13,138,193,1)",
      "rgba(167,167,162,1)",
      "rgba(227,77,65,1)",
      "rgba(231,241,75,1)",
    ];

    const coloresFondo = [
      "rgba(13,138,193,0.3)",
      "rgba(167,167,162,0.3)",
      "rgba(227,77,65,0.3)",
      "rgba(231,241,75,0.3)",
    ];

    const grafico = new Chart(contexto, {
      type: 'pie',
      data: {
        labels: departamentos.map(row => row.departamento),
        datasets: [{
          label: "Alquileres por Departamento",
          data: departamentos.map(row => row.dato),
          borderColor: coloresBorde,
          backgroundColor: coloresFondo,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    });

  </script>
</body>

</html>