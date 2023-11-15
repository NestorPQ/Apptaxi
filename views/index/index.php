<!DOCTYPE html>
<html lang="es">
  <head>
    <title>INDEX</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../../styles/style-index.css">
  </head>

  <body>
    <?php require_once '../header/header.php'; ?>

    <!-- <div class="container mt-3 text-center">
    <h1>Este es el index</h1>
  </div> -->

    <div id="carouselE1" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselE1"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="slide 1"
        ></button>

        <button
          type="button"
          data-bs-target="#carouselE1"
          data-bs-slide-to="1"
          class="active"
          aria-current="true"
          aria-label="slide 2"
        ></button>

        <button
          type="button"
          data-bs-target="#carouselE1"
          data-bs-slide-to="2"
          class="active"
          aria-current="true"
          aria-label="slide 3"
        ></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="../../images/img/car1.jpg" class="d-blok w-100" alt="" />
          <div class="carousel-caption">
            <h5>Los mejores autos</h5>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita
              fuga debitis, a nemo itaque sed, ut adipisci animi distinctio
              eaque earum vitae nobis voluptate vel velit obcaecati. Neque,
              labore quaerat!
            </p>
            <p><a href="#" class="btn btn-primary mt-3">Leer Mass</a></p>
          </div>
        </div>

        <div class="carousel-item active">
          <img src="../../images/img/car2.png" class="d-blok w-100" alt="" />
          <div class="carousel-caption">
            <h5>Los mejores autos</h5>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita
              fuga debitis, a nemo itaque sed, ut adipisci animi distinctio
              eaque earum vitae nobis voluptate vel velit obcaecati. Neque,
              labore quaerat!
            </p>
            <p><a href="#" class="btn btn-primary mt-3">Leer Mass</a></p>
          </div>
        </div>

        <div class="carousel-item active">
          <img src="../../images/img/car3.jpg" class="d-blok w-100" alt="" />
          <div class="carousel-caption">
            <h5>Los mejores autos</h5>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita
              fuga debitis, a nemo itaque sed, ut adipisci animi distinctio
              eaque earum vitae nobis voluptate vel velit obcaecati. Neque,
              labore quaerat!
            </p>
            <p><a href="#" class="btn btn-primary mt-3">Leer Mass</a></p>
          </div>
        </div>

        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselE1"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselE1"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <section class="services mt-3">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="card text-center text-white bg-car1 pb-2">
              <div class="card-body">
                <h3 class="card-title">Faros antipolvo</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Inventore vitae iure modi accusamus maiores exercitationem vel
                  deserunt eos quis aspernatur? Illo cupiditate veritatis
                  voluptas ipsa architecto repudiandae aut eos eius!
                </p>
                <button class="btn bg-primary text-white">Leer más</button>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="card text-center text-white bg-car2 pb-2">
              <div class="card-body">
                <h3 class="card-title">Pintado Mosderno</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Inventore vitae iure modi accusamus maiores exercitationem vel
                  deserunt eos quis aspernatur? Illo cupiditate veritatis
                  voluptas ipsa architecto repudiandae aut eos eius!
                </p>
                <button class="btn bg-primary text-white">Leer más</button>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="card text-center text-white bg-car3 pb-2">
              <div class="card-body">
                <h3 class="card-title">Tapisado personalizado</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Inventore vitae iure modi accusamus maiores exercitationem vel
                  deserunt eos quis aspernatur? Illo cupiditate veritatis
                  voluptas ipsa architecto repudiandae aut eos eius!
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
                <h3>Envio gratis</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-4 box-icons">
            <div class="d-flex align-items-center">
              <i class="bi bi-cash-coin"></i>
              <div class="ms-4">
                <h3>Reenbolso</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-4 box-icons">
            <div class="d-flex align-items-center">
              <i class="bi bi-gift-fill"></i>
              <div class="ms-4">
                <h3>Regalo</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secction-header text-center pb-5">
              <h2>Productos mas vendidos</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                fugiat deserunt facilis debitis dolores ratione delectus nobis,
                eius optio possimus doloremque voluptatibus, maiores saepe
                soluta dignissimos fuga obcaecati, harum enim.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr1.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr2.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr3.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr4.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr5.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr6.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr7.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-3">
            <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
              <div class="text-center">
                <img src="../../images/img/pr8.png" alt="" />
              </div>

              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus sit inventore explicabo ad. Distinctio ducimus
                  delectus odit quas debitis dolore corrupti fugit! Illum earum
                  provident beatae a! Consequuntur, velit illum?
                </p>
                <a href="#" class="btn btn-primary">Saber más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>¿Quieres ser parte del equipo de la empresa?</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur <br />
              adipisicing elit.
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
              <h2>Contacto</h2>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Perferendis maxime magni, in doloribus mollitia libero dolorum
                earum harum quia modi sit non ratione? Error architecto quasi
                <br />
                minus, beatae iste provident.
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
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nombre"
                      required
                    />
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Email"
                      required
                    />
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <textarea
                      rows="3"
                      class="form-control"
                      placeholder="Mensaje"
                      required
                    ></textarea>
                  </div>
                </div>
                <button
                  class="btn btn-primary btn-lg btn-block mt-3"
                  type="button"
                >
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
  </body>
</html>
