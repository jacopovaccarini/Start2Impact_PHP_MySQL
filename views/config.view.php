<?php require('partials/head.php'); ?>

<div class="main">
  <div class="principale">
    <div class="form_prestazione_offerta">
      <h1>Prestazione Offerta</h1>
      <form method="post" action="/config">
        <div class="input_nome">
          <p>Nome</p>
          <input type="text" name="nome" size="20" required>
        </div>
        <div class="input_tempo">
          <p>Tempo</p>
          <input type="number" name="tempo" size="40" required>
        </div>
        <button type="submit" name="submit" value="create_po">Crea</button>
      </form>
      <hr>
      <h1>Cancellazione</h1>
      <form method="post" action="/config">
        <div class="input_nome">
          <p>Nome</p>
          <select type="text" name="nome" required>
          <?php foreach ($offerte as $offerta) : ?>
            <option>
              <?= $offerta->Nome; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_po">Cancella</button>
      </form>
    </div>

    <div class="form_prestazione_erogata">
      <h1>Prestazione Erogata</h1>
      <form method="post" action="/config">
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
        <button type="submit" name="submit" value="create_pe">Crea</button>
      </form>
      <hr>
      <h1>Cancellazione</h1>
      <form method="post" action="/config">
        <div class="input_data">
          <p>Data</p>
          <select type="text" name="data" required>
          <?php foreach ($erogate as $erogata) : ?>
            <option>
              <?= $erogata->Data; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="input_tipologia">
          <p>Tipologia</p>
          <select type="text" name="tipologia" required>
          <?php foreach ($erogate as $erogata) : ?>
            <option>
              <?= $erogata->Tipologia; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_pe">Cancella</button>
      </form>
    </div>
  </div>

  <?php if ($errore == 0) : ?>
    <script type="text/JavaScript">success_create();</script>
  <?php elseif ($errore == 1) : ?>
    <script type="text/JavaScript">error_create();</script>
  <?php elseif ($errore == 2) : ?>
    <script type="text/JavaScript">success_delete();</script>
  <?php elseif ($errore == 1) : ?>
    <script type="text/JavaScript">error_delete();</script>
  <?php endif; ?>

</div>

<?php require('partials/footer.php'); ?>
