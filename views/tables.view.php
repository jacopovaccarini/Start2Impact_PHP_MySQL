<?php require('partials/head.php'); ?>

<div class="main">

  <div class="principale">

    <!-- Tabella Prestazioni Offerte -->
    <div class="table_prestazioni_offerte">
      <h1>Prestazioni Offerte</h1>
      <table class="no_border">
        <tr>
          <th class="zero_colonna">ID</th>
          <th class="prima_colonna">Nome</th>
          <th class="seconda_colonna">Tempo risparmiato (min)</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($offered as $offered_item) : ?>
            <tr>
              <td class="zero_colonna"><?= $offered_item->id; ?></td>
              <td class="prima_colonna"><?= $offered_item->Nome; ?></td>
              <td class="seconda_colonna"><?= $offered_item->Tempo; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- Tabella Prestazioni Erogate -->
    <div class="table_prestazioni_erogate">
      <h1>Prestazioni Erogate</h1>
      <table class="no_border">
        <tr>
          <th class="zero_colonna">ID</th>
          <th class="prima_colonna">Data</th>
          <th class="seconda_colonna">Tipologia</th>
          <th class="terza_colonna">Quantità</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($provided as $provided_item) : ?>
            <tr>
              <td class="zero_colonna"><?= $provided_item->id; ?></td>
              <td class="prima_colonna"><?= $provided_item->Data; ?></td>
              <td class="seconda_colonna"><?= $provided_item->Tipologia; ?></td>
              <td class="terza_colonna"><?= $provided_item->Quantita; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- Tabella Prestazioni Unite -->
    <div class="table_prestazioni_unite">
      <h1>Prestazioni Unite</h1>
      <table class="no_border">
        <tr>
          <th class="prima_colonna">Data</th>
          <th class="seconda_colonna">Tipologia</th>
          <th class="terza_colonna">Quantità</th>
          <th class="quarta_colonna">Tempo unitario risparmiato (min)</th>
          <th class="quinta_colonna">Tempo totale risparmiato (min)</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($joint as $joint_item) : ?>
            <tr>
              <td class="prima_colonna"><?= $joint_item->Data; ?></td>
              <td class="seconda_colonna"><?= $joint_item->Tipologia; ?></td>
              <td class="terza_colonna"><?= $joint_item->Quantita; ?></td>
              <td class="quarta_colonna"><?= $joint_item->Tempo; ?></td>
              <td class="quinta_colonna"><?= $joint_item->Prodotto; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

  </div>

</div>

<?php require('partials/footer.php'); ?>
