<!DOCTYPE html>
<html lang="es">
  <head>

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />

    <style>
      body {
        margin-top: 20px;
      }

      .footer .footer-socila-icon a {
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f84e77;
        color: #ffffff;
        border-radius: 50%;
        margin-right: 8px;
        font-size: 15px;
      }

      .footer .footer-socila-icon a:hover {
        background: #1baaa0;
      }

      .footer .footer-links {
        margin: 0;
      }

      .footer .footer-links li + li {
        padding-top: 10px;
      }

      .footer .footer-links li a {
        position: relative;
      }

      .footer .footer-links li a:after {
        content: "";
        position: absolute;
        width: 0px;
        left: auto;
        right: 0;
        bottom: 0;
        height: 1px;
        transition: ease all 0.35s;
        background: #f84e77;
      }

      .footer .footer-links li a:hover:after {
        width: 100%;
        left: 0;
        right: auto;
      }

      .footer .footer-top {
        padding-top: 1rem;
        padding-bottom: 1rem;
      }

      .footer .footer-top h5,
      .footer .footer-top .h5 {
        position: relative;
        font-size: 1.2rem;
        text-transform: uppercase;
      }

      @media (min-width: 768px) {
        .footer .footer-top {
          padding-top: 2rem;
          padding-bottom: 1rem;
        }
      }

      @media (min-width: 992px) {
        .footer .footer-top {
          padding-top: 3rem;
          padding-bottom: 2rem;
        }
      }

      .footer .footer-border-top {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
      }

      .footer .footer-border-top.dark {
        border-top: 1px solid rgba(16, 16, 16, 0.1);
      }

      .footer .footer-border-bottom {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }

      .footer .footer-border-bottom.dark {
        border-bottom: 1px solid rgba(16, 16, 16, 0.1);
      }

      .bg-dark-gradient {
        background: linear-gradient(180deg, #101010 50%, black 100%) repeat-x !important;
      }

      .white-link a {
        color: rgba(255, 255, 255, 0.65);
      }

      a {
        text-decoration: none;
      }

      .avatar-lg img {
        width: 90px;
        height: 90px;
      }
    </style>
  </head>

  <body>
    <footer class="bg-dark-gradient footer">
      <div class="footer-top">
        <div class="container">
          <div class="footer-border-bottom pb-6 mb-5">
            <div class="row">
              <div class="col-lg-4 col-xl-3">
                <h4 class="text-white">Recibe las ultimas novedades</h4>
              </div>
              <div class="col-lg-4 col-xl-6">
                <form class="d-flex flex-row mb-2 p-1 bg-white input-group">
                  <input
                    type="email"
                    class="form-control rounded-0 border-0"
                    placeholder="tu@correo.com"
                  />
                  <button
                    class="btn btn-secondary rounded-0 flex-shrink-0"
                    type="submit"
                  >
                    Suscribe
                  </button>
                </form>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="text-lg-end text-white">
                  <span class="h6">Comunicate a este numero</span><br />
                  <span class="h3">+51 987 654 321</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-3 my-4">
              <div class="mb-4">
                <img src="static/img/logo-light.svg" title="" alt="" />
              </div>
              <div class="text-white-65 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod.
              </div>
              <div class="nav footer-socila-icon">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-lg-2 my-4">
              <h5 class="text-white h6 mb-4">CLIENTE</h5>
              <ul class="list-unstyled white-link footer-links">
                <li>
                  <a href="#">Get Corpo</a>
                </li>
                <li>
                  <a href="#">Documentation</a>
                </li>
                <li>
                  <a href="#">Help center</a>
                </li>
                <li>
                  <a href="#">Pricing</a>
                </li>
                <li>
                  <a href="#">Contact us</a>
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-lg-2 my-4">
              <h5 class="text-white h6 mb-4">PRODUCTO</h5>
              <ul class="list-unstyled white-link footer-links">
                <li>
                  <a href="#">Portfolio</a>
                </li>
                <li>
                  <a href="#">Blog</a>
                </li>
                <li>
                  <a href="#">Join our team</a>
                </li>
                <li>
                  <a href="#">Elements</a>
                </li>
                <li>
                  <a href="#">Products</a>
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-lg-2 my-4">
              <h5 class="text-white h6 mb-4">COMPAÑÍA</h5>
              <ul class="list-unstyled white-link footer-links">
                <li>
                  <a href="#">About</a>
                </li>
                <li>
                  <a href="#">Careers</a>
                </li>
                <li>
                  <a href="#">Legal &amp; Security</a>
                </li>
                <li>
                  <a href="#">Terms of use</a>
                </li>
                <li>
                  <a href="#">We're hiring!</a>
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-lg-3 my-4">
              <h5 class="text-white h6 mb-4">COMPAÑÍA</h5>
              <div class="white-link">
                <div class="d-flex pb-3">
                  <div class="avatar avatar-lg rounded">
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar1.png"
                      title=""
                      alt=""
                    />
                  </div>
                  <div class="col ps-3">
                    <small class="text-white-65">29 March 2021</small>
                    <h6 class="font-w-500 h6 m-0">
                      <a class="text-white" href="#"
                        >Markdown Language Sample Blog Post Styling</a
                      >
                    </h6>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="avatar avatar-lg rounded">
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar2.png"
                      title=""
                      alt=""
                    />
                  </div>
                  <div class="col ps-3">
                    <small class="text-white-65">29 March 2021</small>
                    <h6 class="font-w-500 h6 m-0">
                      <a class="text-white" href="#"
                        >Markdown Language Sample Blog Post Styling</a
                      >
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom footer-border-top light py-3">
        <div class="container text-center">
          <p class="m-0">
            © 2023 Arturox <a href="#" class="text-reset"> :)</a>
          </p>
        </div>
      </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
