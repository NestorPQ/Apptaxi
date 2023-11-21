<?php
session_start(); // Crea o hereda la sessión


if (!isset($_SESSION["status"]) || $_SESSION["status"] == false) {
  # code...
  echo "<h1 class='mt-5 text-center'>Acesso denegado 🤨 </h1>";
  echo "<a href='../../index.php'>Iniciar Sessión</a>";
  exit();
}
?>



<!DOCTYPE html>
<html lang="es">


<head>
  <!-- Required meta tags -->
  <link rel="icon" href="../../images/ico/favicon.png" type="image/x-icon" />
  <link rel="shortcut icon" href="../../images/ico/favicon.png" type="image/x-icon" />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!----css3---->
  <link rel="stylesheet" href="css/custom.css" />
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
</head>

<body>


  <div class="wrapper">
    <div class="body-overlay"></div>
    <!-- Sidebar  -->
    <?php require_once './views/sidebar.php' ?>

    <?php
    $defaultPage = 'inicio';

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      $filePath = "./views/$page.php";

      if (file_exists($filePath)) {
        include $filePath;
      } else {
        include "views/$defaultPage.php";
      }
    } else {
      include "views/$defaultPage.php";
    }
    ?>

    <?php require_once './views/footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/funcion.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
          $("#sidebar").toggleClass("active");
          $("#content").toggleClass("active");
        });

        $(".more-button,.body-overlay").on("click", function() {
          $("#sidebar,.body-overlay").toggleClass("show-nav");
        });
      });
    </script>
</body>

</html>