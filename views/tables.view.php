<?php require('partials/head.php'); ?>

<div class="main">

  <div class="principale">

    <!-- Tabella Prestazioni Offerte -->
    <div class="table_prestazioni_offerte">
      <h1>Services Offered</h1>
      <table class="no_border">
        <tr>
          <th class="zero_colonna">ID</th>
          <th class="prima_colonna">Name</th>
          <th class="seconda_colonna">Time saved (min)</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($offered as $offered_item) : ?>
            <tr>
              <td class="zero_colonna"><?= $offered_item->id; ?></td>
              <td class="prima_colonna"><?= $offered_item->Name; ?></td>
              <td class="seconda_colonna"><?= $offered_item->Time; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- Tabella Prestazioni Erogate -->
    <div class="table_prestazioni_erogate">
      <h1>Services Provided</h1>
      <table class="no_border">
        <tr>
          <th class="zero_colonna">ID</th>
          <th class="prima_colonna">Date</th>
          <th class="seconda_colonna">Typology</th>
          <th class="terza_colonna">Quantity</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($provided as $provided_item) : ?>
            <tr>
              <td class="zero_colonna"><?= $provided_item->id; ?></td>
              <td class="prima_colonna"><?= $provided_item->Date; ?></td>
              <td class="seconda_colonna"><?= $provided_item->Typology; ?></td>
              <td class="terza_colonna"><?= $provided_item->Quantity; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- Tabella Prestazioni Unite -->
    <div class="table_prestazioni_unite">
      <h1>Services United</h1>
      <table class="no_border">
        <tr>
          <th class="prima_colonna">Date</th>
          <th class="seconda_colonna">Typology</th>
          <th class="terza_colonna">Quantity</th>
          <th class="quarta_colonna">Unit time saved (min)</th>
          <th class="quinta_colonna">Total time saved (min)</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($joint as $joint_item) : ?>
            <tr>
              <td class="prima_colonna"><?= $joint_item->Date; ?></td>
              <td class="seconda_colonna"><?= $joint_item->Typology; ?></td>
              <td class="terza_colonna"><?= $joint_item->Quantity; ?></td>
              <td class="quarta_colonna"><?= $joint_item->Time; ?></td>
              <td class="quinta_colonna"><?= $joint_item->Product; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

  </div>

</div>

<?php require('partials/footer.php'); ?>
