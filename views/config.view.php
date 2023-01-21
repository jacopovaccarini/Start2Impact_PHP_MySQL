<?php require('partials/head.php'); ?>

<div class="main">
  <div class="principale">
    <div class="form_prestazione_offerta">
      <h1>Prestazione Offerta</h1>
      <form method="post" action="/create_po">
        <div class="input_nome">
          <p>Nome</p>
          <input type="text" name="nome" size="20" required>
        </div>
        <div class="input_tempo">
          <p>Tempo</p>
          <input type="number" name="tempo" size="40" required>
        </div>
        <button type="submit" name="submit" value="Submit">Crea</button>
      </form>
    </div>

    <div class="form_prestazione_erogata">
      <h1>Prestazione Erogata</h1>
      <form method="post" action="/create_pe">
        <div class="input_data">
          <p>Data</p>
          <input type="date" name="data" size="20" required>
        </div>
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
        <div class="input_quantita">
          <p>Quantità</p>
          <input type="number" name="quantita" size="40" required>
        </div>
        <button type="submit" name="submit" value="Submit">Crea</button>
      </form>
    </div>
  </div>
</div>

<?php require('partials/footer.php'); ?>
