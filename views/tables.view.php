<?php require('partials/head.php'); ?>
<div class="main">
  <div class="principale">
    <div class="table_prestazioni_offerte">
      <h1>Prestazioni Offerte</h1>
      <table class="no_border">
        <tr>
          <th class="prima_colonna">Nome</th>
          <th class="seconda_colonna">Tempo risparmiato (min)</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($offerte as $offerta) : ?>
            <tr>
              <td class="prima_colonna"><?= $offerta->Nome; ?></td>
              <td class="seconda_colonna"><?= $offerta->Tempo; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <div class="table_prestazioni_erogate">
      <h1>Prestazioni Erogate</h1>
      <table class="no_border">
        <tr>
          <th class="prima_colonna">Data</th>
          <th class="seconda_colonna">Tipologia</th>
          <th class="terza_colonna">Quantità</th>
        </tr>
      </table>
      <div class="table">
        <table>
          <?php foreach ($erogate as $erogata) : ?>
            <tr>
              <td class="prima_colonna"><?= $erogata->Data; ?></td>
              <td class="seconda_colonna"><?= $erogata->Tipologia; ?></td>
              <td class="terza_colonna"><?= $erogata->Quantita; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

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
          <?php foreach ($unite as $unita) : ?>
            <tr>
              <td class="prima_colonna"><?= $unita->Data; ?></td>
              <td class="seconda_colonna"><?= $unita->Tipologia; ?></td>
              <td class="terza_colonna"><?= $unita->Quantita; ?></td>
              <td class="quarta_colonna"><?= $unita->Tempo; ?></td>
              <td class="quinta_colonna"><?= $unita->Prodotto; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require('partials/footer.php'); ?>
