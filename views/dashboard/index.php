<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="../../styles/style-dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <input type="checkbox" id="menu-toggle">
  <?php include './views/siderbar.php' ?>

  <div class="main-content">

    <?php include './views/header.php' ?>

    <?php
    // Default view (Dashboard)
    // include './views/dashboard.php';
    $defaultPage = 'dashboard';  // Define a default page

    // Comprobar si se solicita una página específica
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

  </div>



</body>

</html>