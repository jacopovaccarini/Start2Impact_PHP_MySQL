<?php require('partials/head.php'); ?>

<div class="main">
  <div class="principale">

    <!-- Form per inserimento e cancellazione Prestazione Offerta -->
    <div class="form_prestazione_offerta">
      <h1>Prestazione Offerta</h1>
      <form method="post" action="/config">
        <div class="input_nome">
          <p>Nome</p>
          <input type="text" name="name" size="20" required>
        </div>
        <div class="input_tempo">
          <p>Tempo</p>
          <input type="number" name="time" size="40" required>
        </div>
        <button type="submit" name="submit" value="create_so">Crea</button>
      </form>
      <hr>
      <h1>Cancellazione</h1>
      <form method="post" action="/config">
        <div class="input_id">
          <select type="text" name="offered" required>
          <?php foreach ($offered as $offered_item) : ?>
            <option>
              <?= $offered_item->id; ?> - <?= $offered_item->Nome; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_so">Cancella</button>
      </form>
    </div>

    <!-- Form per inserimento e cancellazione Prestazione Erogata -->
    <div class="form_prestazione_erogata">
      <h1>Prestazione Erogata</h1>
      <form method="post" action="/config">
        <div class="input_data">
          <p>Data</p>
          <input type="date" name="date" size="20" required>
        </div>
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
        <div class="input_quantita">
          <p>Quantità</p>
          <input type="number" name="quantity" size="40" required>
        </div>
        <button type="submit" name="submit" value="create_sp">Crea</button>
      </form>
      <hr>
      <h1>Cancellazione</h1>
      <form method="post" action="/config">
        <div class="input_id">
          <select type="text" name="provided" required>
          <?php foreach ($provided as $provided_item) : ?>
            <option>
              <?= $provided_item->id; ?> - <?= $provided_item->Data; ?> - <?= $provided_item->Tipologia; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_sp">Cancella</button>
      </form>
    </div>

  </div>

  <!-- Script messaggi popup -->
  <?php if ($error == 0) : ?>
    <script type="text/JavaScript">success_create();</script>
  <?php elseif ($error == 1) : ?>
    <script type="text/JavaScript">error_create();</script>
  <?php elseif ($error == 2) : ?>
    <script type="text/JavaScript">success_delete();</script>
  <?php elseif ($error == 1) : ?>
    <script type="text/JavaScript">error_delete();</script>
  <?php endif; ?>

</div>

<?php require('partials/footer.php'); ?>
