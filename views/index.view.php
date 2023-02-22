<?php require('partials/head.php'); ?>

<div class="main">

  <div class="principale">

    <!-- Tempo risparmiato totale -->
    <div class="tempo_risparmiato">
      <h1>Tempo risparmiato</h1>
      <p><?= $total_timeSaved; ?> minuti</p>
    </div>

    <!-- Form Ricerca per data -->
    <div class="form_data">
      <h1>Ricerca per data</h1>
      <form method="post" action="">
        <div class="input_data_iniziale">
          <p>Data iniziale</p>
          <input type="date" name="initial_date" size="20" required>
        </div>
        <div class="input_data_finale">
          <p>Data finale</p>
          <input type="date" name="final_date" size="20" required>
        </div>
        <button type="submit" name="submit" value="filter_date">Cerca</button>
      </form>
    </div>

    <!-- Form Ricerca per tipologia -->
    <div class="form_tipologia">
      <h1>Ricerca per tipologia</h1>
      <form method="post" action="">
        <div class="input_tipologia">
          <p>Tipologia</p>
          <select type="text" name="type" required>
          <?php foreach ($offered as $offered_item) : ?>
            <option>
              <?= $offered_item->Nome; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="filter_type">Cerca</button>
      </form>
    </div>
  </div>

  <!-- controlla se ci sono prestazioni erogate in quelle date o di quella tipologia -->
  <?php if ($timeSaved != 0) : ?>
    <div class="secondario">

      <!-- Tabella output ricerca -->
      <div class="table_ricerca">
        <?php if ($initial_date != '') : ?>
          <h1>Prestazioni erogate dal <?= $initial_date ?> al <?= $final_date ?></h1>
        <?php else : ?>
          <h1>Prestazioni erogate della tipologia <?= $type ?></h1>
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
            <?php foreach ($search as $search_item) : ?>
              <tr>
                <td class="prima_colonna"><?= $search_item->Data; ?></td>
                <td class="seconda_colonna"><?= $search_item->Tipologia; ?></td>
                <td class="terza_colonna"><?= $search_item->Quantita; ?></td>
                <td class="quarta_colonna"><?= $search_item->Tempo; ?></td>
                <td class="quinta_colonna"><?= $search_item->Prodotto; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <p>Tempo risparmiato: <?= $timeSaved; ?> minuti</p>
      </div>

    </div>

  <!-- Script messaggi popup -->
  <?php else : ?>
    <?php if ($_POST['submit'] == "filter_date" || $_POST['submit'] == "filter_type") : ?>
      <?php if ($error == 1) : ?>
        <script type="text/JavaScript">error_date();</script>
      <?php else : ?>
        <script type="text/JavaScript">nessuna_prestazione();</script>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>

</div>

<?php require('partials/footer.php'); ?>
