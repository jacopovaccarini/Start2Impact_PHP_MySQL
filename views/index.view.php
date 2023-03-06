<?php require('partials/head.php'); ?>

<div class="main">

  <div class="principale">

    <!-- Tempo risparmiato totale -->
    <div class="tempo_risparmiato">
      <h1>Time saved</h1>
      <p><?= $total_timeSaved; ?> minutes</p>
    </div>

    <!-- Form Ricerca per data -->
    <div class="form_data">
      <h1>Search by date</h1>
      <form method="post" action="">
        <div class="input_data_iniziale">
          <p>Initial date</p>
          <input type="date" name="initial_date" size="20" required>
        </div>
        <div class="input_data_finale">
          <p>Final date</p>
          <input type="date" name="final_date" size="20" required>
        </div>
        <button type="submit" name="submit" value="filter_date">Search</button>
      </form>
    </div>

    <!-- Form Ricerca per tipologia -->
    <div class="form_tipologia">
      <h1>Search by typology</h1>
      <form method="post" action="">
        <div class="input_tipologia">
          <p>Typology</p>
          <select type="text" name="type" required>
          <?php foreach ($offered as $offered_item) : ?>
            <option>
              <?= $offered_item->Name; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="filter_type">Search</button>
      </form>
    </div>
  </div>

  <!-- controlla se ci sono prestazioni erogate in quelle date o di quella tipologia -->
  <?php if ($timeSaved != 0) : ?>
    <div class="secondario">

      <!-- Tabella output ricerca -->
      <div class="table_ricerca">
        <?php if ($initial_date != '') : ?>
          <h1>Services provided from <?= $initial_date ?> to <?= $final_date ?></h1>
        <?php else : ?>
          <h1>Services provided of the <?= $type ?> type</h1>
        <?php endif; ?>
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
            <?php foreach ($search as $search_item) : ?>
              <tr>
                <td class="prima_colonna"><?= $search_item->Date; ?></td>
                <td class="seconda_colonna"><?= $search_item->Typology; ?></td>
                <td class="terza_colonna"><?= $search_item->Quantity; ?></td>
                <td class="quarta_colonna"><?= $search_item->Time; ?></td>
                <td class="quinta_colonna"><?= $search_item->Product; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <p>Time saved: <?= $timeSaved; ?> minutes</p>
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
