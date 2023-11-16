<link rel="stylesheet" href="../../styles/style-dasboard.css">

<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="bg-dark col-auto col-md-3 col-lg-4 min-vh-100 d-flex flex-column justify-content-between">
      <div class="bg-dark p-2">
        <a class="d-flex text-decoration-none align-items-center text-white mt-1">
          <span class="fs-4 d-none d-sm-inline">Menú</span>
        </a>
        <ul class="nav nav-pills flex-column mt-4">
          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="../index/index.php">
              <i class="fs-5 fa fa-language"></i><span class="fs-4 ms-3 d-none d-sm-inline">Paginá</span>
            </a>
          </li>
          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="../dashboard/index.php">
              <i class="fs-5 fa fa-house"></i><span class="fs-4 ms-3 d-none d-sm-inline">Inicio</span>
            </a>
          </li>
          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="#">
              <i class="fs-5 fa fa-table-list"></i><span class="fs-4 ms-3 d-none d-sm-inline">Informe</span>
            </a>
          </li>

          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="#">
              <i class="fs-5 fa fa-solid fa-cart-shopping"></i><span class="fs-4 ms-3 d-none d-sm-inline">Registros</span>
            </a>
          </li>

          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="#">
              <i class="fs-5 fa fa-clipboard"></i><span class="fs-4 ms-3 d-none d-sm-inline">Vehiculos</span>
            </a>
          </li>
          <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white text-nowrap" href="#">
              <i class="fs-5 fa fa-users"></i><span class="fs-4 d-none ms-3 d-sm-inline">Clientes</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="dropdown open p-3">
        <button class="btn border-none text-white dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i><span class="ms-2">Arturo</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
          <button class="dropdown-item" href="#">Configuración</button>
          <button class="dropdown-item" href="#">Perfil</button>
        </div>
      </div>
    </div>