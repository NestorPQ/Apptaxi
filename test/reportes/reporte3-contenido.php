<page>

  <h1 class="fs-5 text-center text-bold">Bienvenidos a SENATI</h1>
  <h3 class="mt-3 mb-3 text-center text-italic">Desarrollado por <?= $desarrollador ?></h3>

  <p class="mb-3 text-">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis facilis doloremque molestiae aperiam quis, iusto molestias cumque soluta, sint sequi alias iure natus totam voluptate dolorum. Error sunt iure quod.
  </p>

  <table class="table mt-5">
    <colgroup>
      <col style="width: 50%">
      <col style="width: 50%">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <td>Sedes</td>
        <td>carreras</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataTables as $data) : ?>
        <tr>
          <td><?= $data["sede"] ?></td>
          <td><?= $data["carrera"] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <page_footer>
    <!-- <h3>page [[page_cu]]/[[page_nb]]</h3> -->
    <h3 style="text-align: right;">pagina [[page_cu]]</h3>
  </page_footer>
  <bookmark title="Summary" level="0"></bookmark>
</page>
<page pageset="old">
  <ul>
    <?php foreach ($carreras as $carrera) : ?>
      <li><?= $carrera ?></li>
    <?php endforeach; ?>
  </ul>
</page>