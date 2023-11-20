<!-- Iconos -->
<!-- https://materializecss.com/icons.html -->


<nav id="sidebar">
  <div class="sidebar-header">
    <h3>
      <img src="img/superu.png" class="img-fluid" /><span>ADMINISTRADOR</span>
    </h3>
  </div>
  <ul class="list-unstyled components">

    <li class="">
      <a href="index.php?page=inicio">
        <i class="material-icons">insert_chart</i>
        <span>Inicio</span>
      </a>
    </li>

    <li class="">
      <a href="index.php?page=marca"><i class="material-icons">library_books</i><span>Marca</span></a>
    </li>

    <li class="">
      <a href="index.php?page=formapago"><i class="material-icons">credit_card</i><span>Formas de pago</span></a>
    </li>

    <li class="">
      <a href="index.php?page=vehiculo"><i class="material-icons">time_to_leave</i><span>Vehiculo</span></a>
    </li>

    <li class="">
      <a href="index.php?page=alquiler"><i class="material-icons">assignment</i><span>Alquiler</span></a>
    </li>

    <li class="">
      <a href="index.php?page=usuario"><i class="material-icons">person_pin</i><span>Usuario</span></a>
    </li>

    <li class="">
      <a href="#" id="cerrar-sesion">
        <i class="material-icons">exit_to_app</i>
        <span>Cerrar Sesión</span>
      </a>
    </li>


    <div class="small-screen navbar-display">

      <!-- <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
        <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <i class="material-icons">notifications</i><span> 4 notification</span></a>
        <ul class="collapse list-unstyled menu" id="homeSubmenu0">
          <li>
            <a href="#">You have 5 new messages</a>
          </li>
          <li>
            <a href="#">You're now friend with Mike</a>
          </li>
          <li>
            <a href="#">Wish Mary on her birthday!</a>
          </li>
          <li>
            <a href="#">5 warnings in Server Console</a>
          </li>
        </ul>
      </li>

      <li class="d-lg-none d-md-block d-xl-none d-sm-block">
        <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
      </li>
    </div>

    <!-- <li class="dropdown">
      <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <i class="material-icons">content_copy</i><span>Pages</span></a>
      <ul class="collapse list-unstyled menu" id="pageSubmenu7">
        <li>
          <a href="#">Page 1</a>
        </li>
        <li>
          <a href="#">Page 2</a>
        </li>
        <li>
          <a href="#">Page 3</a>
        </li>
      </ul>
    </li>  -->

  </ul>
</nav>

<!-- Page Content  -->
<div id="content">
  <div class="top-navbar">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
          <span class="material-icons">arrow_back_ios</span>
        </button>

        <a class="navbar-brand" href="#"> Dashboard </a>

        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="material-icons">more_vert</span>
        </button>

        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="dropdown nav-item active">
              <a href="#" class="nav-link" data-toggle="dropdown">
                <span class="material-icons">notifications</span>
                <span class="notification">4</span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">You have 5 new messages</a>
                </li>
                <li>
                  <a href="#">You're now friend with Mike</a>
                </li>
                <li>
                  <a href="#">Wish Mary on her birthday!</a>
                </li>
                <li>
                  <a href="#">5 warnings in Server Console</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script>
      document.addEventListener('DOMContentLoaded', function(){
        const cerrarSesionLink = document.getElementById("cerrar-sesion");

        function cerrarSesion(){
          if (confirm("¿Estás seguro de que desear cerrar sesión?")) {
            window.location.href='../../controllers/usuario.controller.php?operacion=destroy';
          }
        }
      
        if (cerrarSesionLink) {
          cerrarSesionLink.addEventListener("click", function(event){
            event.preventDefault();
            cerrarSesion();
          });
        }
      });
    </script>