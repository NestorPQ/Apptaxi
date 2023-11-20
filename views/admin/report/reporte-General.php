<page>

  <h1 class="fs-5 text-center text-bold mt-5">Conteo total</h1>

  <p class="mb-3 fs-3 mt-4 text-center">
    Conteo total conteo total de los registros en el sistema
  </p>

  <table class="table mt-5">
    <colgroup>
      <col style="width: 25%">
      <col style="width: 25%">
      <col style="width: 25%">
      <col style="width: 25%">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <td>total_usuarios</td>
        <td>total_vehiculos</td>
        <td>total_alquileres</td>
        <td>total_marcas</td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><?php echo $objeto_recibido[0]['total_usuarios']  ?></td>
        <td><?php echo $objeto_recibido[0]['total_vehiculos']  ?></td>
        <td><?php echo $objeto_recibido[0]['total_alquileres']  ?></td>
        <td><?php echo $objeto_recibido[0]['total_marcas']  ?></td>
      </tr>

    </tbody>
  </table>

  <page_footer>
    <h3 style="text-align: right;">pagina [[page_cu]]</h3>
  </page_footer>
</page>
<!-- 
<page pageset="old">

</page> -->