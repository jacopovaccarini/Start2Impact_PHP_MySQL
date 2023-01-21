<?php require('partials/head.php'); ?>
<div class="main">

  <div class="principale">
    <div class="tempo_risparmiato">
      <h1>Tempo risparmiato</h1>
      <p><?= $sommaUnione; ?> minuti</p>
    </div>

    <div class="form_data">
      <h1>Ricerca per data</h1>
      <form method="post" action="">
        <div class="input_data_iniziale">
          <p>Data iniziale</p>
          <input type="date" name="data_iniziale" size="20" required>
        </div>
        <div class="input_data_finale">
          <p>Data finale</p>
          <input type="date" name="data_finale" size="20" required>
        </div>
        <button type="submit" name="submit" value="date">Cerca</button>
      </form>
    </div>

    <div class="form_tipologia">
      <h1>Ricerca per tipologia</h1>
      <form method="post" action="">
        <div class="input_tipologia">
          <p>Tipologia</p>
          <select type="text" name="tipologia" required>
          <?php foreach ($offerte as $offerta) : ?>
            <option>
              <?= $offerta->Nome; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="type">Cerca</button>
      </form>
    </div>
  </div>

  <?php if ($somma != 0) : ?>
    <div class="secondario">
      <div class="table_ricerca">
        <?php if ($data_iniziale != '') : ?>
          <h1>Prestazioni erogate dal <?= $data_iniziale ?> al <?= $data_finale ?></h1>
        <?php else : ?>
          <h1>Prestazioni erogate della tipologia <?= $tipologia ?></h1>
        <?php endif; ?>
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
            <?php foreach ($search as $search_items) : ?>
              <tr>
                <td class="prima_colonna"><?= $search_items->Data; ?></td>
                <td class="seconda_colonna"><?= $search_items->Tipologia; ?></td>
                <td class="terza_colonna"><?= $search_items->Quantita; ?></td>
                <td class="quarta_colonna"><?= $search_items->Tempo; ?></td>
                <td class="quinta_colonna"><?= $search_items->Prodotto; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <p>Tempo risparmiato: <?= $somma; ?> minuti</p>
      </div>
    </div>
  <?php endif; ?>

</div>
<?php require('partials/footer.php'); ?>
