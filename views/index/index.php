<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="icon" href="../../images/ico/favicon.png" type="image/x-icon" />
  <link rel="shortcut icon" href="../../images/ico/favicon.png" type="image/x-icon" />

  <title>DriveAway</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../../styles/style-index.css" />
</head>

<body>
  <?php require_once '../header/header.php'; ?>

  <!-- <div class="container mt-3 text-center">
    <h1>Este es el index</h1>
  </div> -->

  <div id="carouselE1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="slide 1"></button>

      <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="1" class="active" aria-current="true" aria-label="slide 2"></button>

      <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="2" class="active" aria-current="true" aria-label="slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="../../images/img/car1.jpg" class="d-blok w-100" alt="" />
        <div class="carousel-caption">
          <h5>Alquila, conduce, disfruta</h5>
          <p>
            Encontrar el vehículo perfecto para cada aventura nunca ha sido tan fácil. Desde compactos ágiles hasta vehículos familiares espaciosos, nuestra selección te brinda la llave para desbloquear experiencias únicas, ofreciéndote libertad y comodidad en cada kilómetro recorrido.
          </p>
          <p><a href="#" class="btn btn-primary mt-3">Leer Mass</a></p>
        </div>
      </div>

      <div class="carousel-item active">
        <img src="../../images/img/car2.png" class="d-blok w-100" alt="" />
        <div class="carousel-caption">
          <h5>Tu próximo destino a solo un alquiler de distancia.</h5>
          <p>
            Bienvenido a nuestro mundo de alquiler de vehículos, donde la
            calidad se une a la comodidad. Nuestro compromiso es brindarte la
            mejor experiencia en cada viaje, ofreciéndote opciones
            personalizadas y un servicio excepcional para que tu camino sea
            tan emocionante como tu destino.
          </p>
          <p><a href="#" class="btn btn-primary mt-3">Leer Más</a></p>
        </div>
      </div>

      <div class="carousel-item active">
        <img src="../../images/img/car3.jpg" class="d-blok w-100" alt="" />
        <div class="carousel-caption">
          <h5>Explora, vive, disfruta</h5>
          <p>
            Descubre la libertad de explorar nuevos horizontes y destinos inexplorados a tu propio ritmo con nuestra amplia gama de vehículos disponibles para alquiler, facilitando cada paso de tu viaje inolvidable.
          </p>
          <p><a href="#" class="btn btn-primary mt-3">Leer Mass</a></p>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselE1" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselE1" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <section class="services mt-3">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-6 mb-3">
          <div class="card text-center text-white bg-car1 pb-2">
            <div class="card-body">
              <h3 class="card-title">Conduce hacia tus sueños.</h3>
              <p>
                Bienvenido a nuestro mundo de alquiler de vehículos, donde la
                calidad se une a la comodidad. Nuestro compromiso es brindarte
                la mejor experiencia en cada viaje, ofreciéndote opciones
                personalizadas y un servicio excepcional para que tu camino
                sea tan emocionante como tu destino.
              </p>
              <button class="btn bg-primary text-white">Leer más</button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <section class="section-icons">
    <div class="container">
      <div class="row">

        <div class="col-12 col-md-12 col-lg-4 box-icons">
          <div class="d-flex align-items-center">
            <i class="bi bi-airplane"></i>
            <div class="ms-4">
              <h3>Todo el País</h3>
              <p>Tu viaje comienza aquí.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-12 col-lg-4 box-icons">
          <div class="d-flex align-items-center">
            <i class="bi bi-cash-coin"></i>
            <div class="ms-4">
              <h3>Precios Competitivos</h3>
              <p>Vive la experiencia del alquiler.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-12 col-lg-4 box-icons">
          <div class="d-flex align-items-center">
            <i class="bi bi-gift-fill"></i>
            <div class="ms-4">
              <h3>Promociones</h3>
              <p>Empieza tu aventura sobre ruedas.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="product">
    <div class="container">
      <div class="col-md-12">
        <div class="secction-header text-center pb-5">
          <h2><strong>Vehiculos Disponibles</strong></h2>
          <p>
            Conducir hacia tu destino soñado se vuelve una realidad fácil y
            emocionante con nuestra amplia selección de vehículos listos para
            llevarte a donde quieras. Haz que cada viaje cuente y cada momento
            sea una historia para recordar con nuestro servicio de alquiler
            confiable y conveniente.
          </p>
        </div>
      </div>
      <div class="row" id="formContainer">
        <!-- Cards will be dynamically added here -->
      </div>
    </div>
  </section>

  <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>DriveAway</h2>
          <p>
            En cada curva del camino, estamos aquí para asegurarnos de que tu
            viaje sea impecable. Nuestra flota diversa, combinada con un
            servicio excepcional, está diseñada para satisfacer tus
            necesidades de movilidad y transformar cada alquiler en una
            experiencia inolvidable. <br />
          </p>
          <div>
            <img src="../../images/img/mo1.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact">
    <div class="container mb-3 mb-lg-5">
      <div class="row">
        <div class="col-md-12">
          <div class="secction-header text-center-pb-2 pb-lg-5">
            <h2>Cotizacion</h2>
            <p>
              Descubre la libertad de explorar nuevos horizontes y destinos
              inexplorados a tu propio ritmo con nuestra amplia gama de
              vehículos disponibles para alquiler, facilitando cada paso de tu
              viaje inolvidable.
              <br />
            </p>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <div class="col-12 col-md-12 col-lg-6 pt-4 pb-4">
          <form action="#" class="bg-light p-t m-auto shadow-sm">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nombre" required />
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" required />
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <textarea rows="3" class="form-control" placeholder="Mensaje" required></textarea>
                </div>
              </div>
              <button class="btn btn-primary btn-lg btn-block mt-3" type="button">
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">Todos los derechos reservados</p>
    </div>
  </footer>

  <!-- Bootstrap JavaScript Libraries
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> -->

  <script src="../../js/funcion.js"></script>
  <script>
    function mostrarLista() {
      const parametros = new FormData();
      parametros.append("operacion", "listarCatalogoVehiculos");

      fetch(`../../controllers/vehiculo.controller.php`, {
          method: "POST",
          body: parametros,
        })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          // console.log(datos);
          const formContainer = document.getElementById("formContainer");
          let formHTML = "";
          datos.forEach((element) => {
            formHTML += `
  
                  
              <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card bg-light shadow-sm border-0 px-2 py-3">
                  <div class="text-center">
                    <img src="../../images/img/cnf.png" alt="" />
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><strong>${element.marca}</strong></h4>
                    <h6>
                      <strong>Tipo:</strong>
                      ${element.tipo}
                    </h6>
                    <h6>
                      <strong>Color:</strong>
                      ${element.color}
                    </h6>
                    <h6>
                      <strong>Costor por día:</strong>
                      ${element.costo_alquiler}
                    </h6>
                    <h6>
                      <strong>Combustible:</strong>
                      ${element.tipocombustible}
                    </h6>
                    <buttom type="submit" class="btn btn-success"><strong>Cotizar</strong></buttom>
                  </div>
                </div>
              </div>     

  
              `;

            formContainer.innerHTML = formHTML;
            console.log(element);
            // console.log(element.tipo);
          });
        })
        .catch((e) => {
          console.error(e);
        });
    }

    mostrarLista();
  </script>
</body>

</html>