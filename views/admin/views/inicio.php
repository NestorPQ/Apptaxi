<div class="main-content">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header">
          <div class="icon icon-warning">
            <span class="material-icons">directions_car</span>
          </div>
        </div>
        <div class="card-content" ">
        <p class="category"><strong>VEHICULOS REGISTRADOS</strong></p>
        <h3 class="card-title">
          <div id="vehiculos-registrados"></div>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-info">info</i>
          <a href="#pablo">Ver informe detallado</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header">
        <div class="icon icon-rose">
          <span class="material-icons">person_pin</span>
        </div>
      </div>
      <div class="card-content">
        <p class="category"><strong>USUARIOS REGISTRADOS</strong></p>
        <h3 class="card-title">
          <div id="usuarios-registrados"></div>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">update</i> Recién actualizado
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header">
        <div class="icon icon-success">
          <span class="material-icons">playlist_add_check</span>
        </div>
      </div>
      <div class="card-content">
        <p class="category"><strong>MARCAS REGISTRADAS</strong></p>
        <h3 class="card-title">
          <div id="marcas-registradas"></div>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">update</i> Recién actualizado
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header">
        <div class="icon icon-info">
          <span class="material-icons">poll</span>
        </div>
      </div>
      <div class="card-content">
        <p class="category"><strong>ALQUILERES ACTIVOS</strong></p>
        <h3 class="card-title">
          <div id="alquiler-registrados"></div>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">update</i> Recién actualizado
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-12">
    <div class="card" style="padding: 20px">
      <div>
        <canvas id="migrafico"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-12">
    <div class="card" style="padding: 20px">
      <div>
        <canvas id="misegundografico"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12">
    <!-- <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">Alquileres</h4>
          <p class="category">Registro historico de Alquileres</p>
        </div>
        <div class="card-content table-responsive table-bordered">
          <table class="table table-hover">
            <thead class="text-primary text-muted text-center">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Country</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>1</td>
                <td>Bob Williams</td>
                <td>$23,566</td>
                <td>USA</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> -->

    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary" id="generarPDF">
        Generar el reporte del conteo de los registros
      </button>
    </div>
  </div>

  <!-- <div class="col-lg-5 col-md-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">Activities</h4>
        </div>
        <div class="card-content">
          <div class="streamline">
            <div class="sl-item sl-primary">
              <div class="sl-content">
                <small class="text-muted">5 mins ago</small>
                <p>Williams has just joined Project X</p>
              </div>
            </div>
            <div class="sl-item sl-danger">
              <div class="sl-content">
                <small class="text-muted">25 mins ago</small>
                <p>
                  Jane has sent a request for access to the project
                  folder
                </p>
              </div>
            </div>
            <div class="sl-item sl-success">
              <div class="sl-content">
                <small class="text-muted">40 mins ago</small>
                <p>Kate added you to her team</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <small class="text-muted">45 minutes ago</small>
                <p>John has finished his task</p>
              </div>
            </div>
            <div class="sl-item sl-warning">
              <div class="sl-content">
                <small class="text-muted">55 mins ago</small>
                <p>Jim shared a folder with you</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <small class="text-muted">60 minutes ago</small>
                <p>John has finished his task</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // let datos = [];
    let datos = {};

    function $(id) {
      return document.querySelector(id);
    }

    function getElementById(id) {
      return document.getElementById(id);
    }

    async function mostrarTotalInformacion() {
      try {
        const parametros = new FormData();
        parametros.append("operacion", "listarTotalInformacion");

        const respuesta = await fetch(
          `../../controllers/alquiler.controller.php`,
          {
            method: "POST",
            body: parametros,
          }
        );

        if (!respuesta.ok) {
          throw new Error("Error");
        }

        datos = await respuesta.json();
        // console.log(datos[0].total_vehiculos);
        // console.log(datos[0]);

        const vehiculosContainer = getElementById("vehiculos-registrados");
        const usuariosContainer = getElementById("usuarios-registrados");
        const marcasContainer = getElementById("marcas-registradas");
        const alquilerContenedor = getElementById("alquiler-registrados");

        const alquilererT = datos[0].total_alquileres;
        const usuariosT = datos[0].total_usuarios;
        const marcasT = datos[0].total_marcas;
        const vehiculosT = datos[0].total_vehiculos;

        actualizarContenedor(vehiculosContainer, vehiculosT);
        actualizarContenedor(usuariosContainer, usuariosT);
        actualizarContenedor(marcasContainer, marcasT);
        actualizarContenedor(alquilerContenedor, alquilererT);
      } catch (error) {
        console.error(error);
      }
    }

    function actualizarContenedor(contenedor, valor) {
      contenedor.innerHTML = `<h3 class="card-title">${valor}</h3>`;
    }

    function generarReporte() {
      const operacion = "informegeneral";

      const objetoCodificado = encodeURIComponent(JSON.stringify(datos));

      window.location.href = `./report/reporte.php?reporte=${objetoCodificado}`;
    }

    // bar, line, doughnut, bubble, polarArea, radar, scatter

    // function generarGrafico() {
    //   const contexto = document.querySelector("#migrafico");

    //   const departamentos = [
    //     { departamento: "Ica", dato: 45 },
    //     { departamento: "Lima", dato: 65 },
    //     { departamento: "Ayacucho", dato: 30 },
    //     { departamento: "Tacna", dato: 60 },
    //   ];

    //   const coloresBorde = [
    //     "rgba(13,138,193,1)",
    //     "rgba(167,167,162,1)",
    //     "rgba(227,77,65,1)",
    //     "rgba(231,241,75,1)",
    //   ];

    //   const coloresFondo = [
    //     "rgba(13,138,193,0.3)",
    //     "rgba(167,167,162,0.3)",
    //     "rgba(227,77,65,0.3)",
    //     "rgba(231,241,75,0.3)",
    //   ];

    //   const grafico = new Chart(contexto, {
    //     type: "line",
    //     data: {
    //       labels: departamentos.map((row) => row.departamento),
    //       datasets: [
    //         {
    //           label: "Departamentos",
    //           data: departamentos.map((row) => row.dato),
    //           borderColor: coloresBorde,
    //           backgroundColor: coloresFondo,
    //           borderWidth: 2,
    //         },
    //       ],
    //     },
    //     options: {
    //       scales: {
    //         y: {
    //           beginAtZero: true,
    //           max: 100,
    //         },
    //       },
    //     },
    //   });
    // }

    async function generarGraficosChartJS() {
      try {
        const datosVehiculoMarca = await obtenerDatos(
          "listarCantidadVehiculosPorMarca"
        );

        const datosAlquilerMes = await obtenerDatos(
          "alquilerPorMes"
        );

        // console.log(datosVehiculoMarca);
        // console.log(datosAlquilerMes);

        const graficosVehiculosPorMarca = {
          contexto: document.querySelector("#migrafico"),
          tipo: "line",
          datos: transformarDatosParaGrafico(datosVehiculoMarca, 'marca', 'cantidad_vehiculos', 'Cantidad de Vehiculos por marca'),
          opciones: { beginAtZero: true, ticks: {precision: 0} },
        };

        const graficoAlquilerPorMes = {
          contexto: document.querySelector("#misegundografico"),
          tipo: "bar",
          datos: transformarDatosParaGrafico(datosAlquilerMes, 'nombre_mes', 'cantidad_alquileres', 'cantidad de Alquileres por mes'),
          opciones: { beginAtZero: true, ticks: {precision: 0 }},
        };

        // console.log(graficosVehiculosPorMarca);
        // console.log(graficoAlquilerPorMes);

        generarGrafico(graficosVehiculosPorMarca);
        generarGrafico(graficoAlquilerPorMes);
      } catch (error) {
        console.error(error);
      }
    }

    async function obtenerDatos(operacion) {
      try {
        const parametros = new FormData();
        parametros.append("operacion", operacion);

        const respuesta = await fetch(
          `../../controllers/alquiler.controller.php`,
          {
            method: "POST",
            body: parametros,
          }
        );

        if (!respuesta.ok) {
          throw new Error("Error al obtener los datos");
        }

        const datos = await respuesta.json();

        return datos;
      } catch (error) {
        console.log(error);
      }
    }

    function transformarDatosParaGrafico(datos, etiqueta, valor, titulo) {
      const etiquetas = datos.map((item) => item[etiqueta]);
      const valores = datos.map((item) => item[valor]);

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

      return {
        labels: etiquetas,
        datasets: [
          {
            label: titulo,
            data: valores,
            backgroundColor: coloresFondo,
            borderColor: coloresBorde,
            borderWidth: 1,
          },
        ],
      };
    }

    function generarGrafico({ contexto, tipo, datos, opciones }) {
      new Chart(contexto, {
        type: tipo,
        data: datos,
        options: {
          scales: {
            y: opciones
          },
        },
      });
    }



    $("#generarPDF").addEventListener("click", function (event) {
      event.preventDefault();
      generarReporte();
    });
    generarGraficosChartJS();

    // generarSegundoGrafico();
    mostrarTotalInformacion();
  });
</script>
