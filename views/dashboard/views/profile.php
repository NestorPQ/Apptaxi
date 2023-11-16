<style>
  /* Your CSS styles here */

  /* Basic structure for two cards */
  .card-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 40px;
    padding: 5px;

    /* To add some space from sides */
  }

  .card {
    flex-basis: calc(50% - 20px);
    /* Adjust the width of cards as per your design */
    /* height: 500px; */
    width: 100%;
    height: 500px;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .chart-container {
    width: 100%;
    /* Adjust the width as needed */
    height: 200%;
    /* Adjust the width as needed */
  }


  .card-content h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .card-content span {
    font-size: 16px;
    color: #888;
  }

  /* Colors for the cards */
  .card1 {
    background-color: #fff;
    color: black;
  }

  .card2 {
    background-color: #fff;
    color: black;
  }

  @media only screen and (max-width: 1200px) {
    .card {
      /* flex-basis: 80%; */
      height: auto;
      min-height: 300px;
    }

    .chart-container {
      width: auto;
      height: auto;
      /* Adjust the height of the chart container for medium screens */
    }
  }


  /* Media query for responsiveness */
  @media only screen and (max-width: 768px) {
    .card-container {
      justify-content: center;
    }

    .card {
      flex-basis: 80%;
      /* Adjust the width of cards for smaller screens */
      margin-bottom: 20px;
      height: auto;
      /* Set height to auto for responsiveness */
      /* min-height: 300px; */
      /* Set a minimum height for smaller screens */
    }

    .chart-container {
      width: 350px;
      height: auto;
      /* Adjust the height of the chart container */
    }
  }
</style>

<main>

  <div class="page-header">
    <h1>Perfil</h1>
    <small>Home / Perfil</small>
  </div>
  <div class="page-content">

    <div class="card-container">

      <!-- First card -->
      <div class="card card1">
        <div class="card-content">
          <div class="chart-title">Chart 1</div>
          <canvas class="chart-container" id="chart1"></canvas>
        </div>
      </div>

      <!-- Second card -->
      <div class="card card2">
        <div class="card-content">
          <div class="chart-title">Chart 2</div>
          <canvas class="chart-container" id="chart2"></canvas>
        </div>
      </div>

      <div class="records table-responsive">
        <div class="record-header">

        </div>
      </div>

    </div>
  </div>
</main>

<!-- JavaScript to create Chart.js charts -->
<script>
  // First Chart
  var ctx1 = document.getElementById('chart1').getContext('2d');

  const colores  = [
    {color: "Red", dato: 12},
    {color: "Blue", dato: 19},
    {color: "Yellow", dato: 3},
    {color: "Green", dato: 5},
    {color: "Purple", dato: 2},
    {color: "Orange", dato: 3}
  ];

  const coloresFondo = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
  ];

  const conloresBorde = [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
  ];

  const chart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: colores.map(row => row.color),
      datasets: [{
        label: '# of Votes',
        data: colores.map(row => row.dato),
        backgroundColor: coloresFondo,
        borderColor: conloresBorde,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      // maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          max: 30
        }
      }
    }
  });
  chart1.update();

  // Second Chart
  var ctx2 = document.getElementById('chart2').getContext('2d');
  const chart2 = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'My Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    },
    options: {
      responsive: true,
      // maintainAspectRatio: false,
    }
  });
  chart2.update();
</script>