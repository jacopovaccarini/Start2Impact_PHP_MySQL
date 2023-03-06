<?php require('partials/head.php'); ?>

<div class="main">
  <div class="principale">

    <!-- Form per inserimento e cancellazione Prestazione Offerta -->
    <div class="form_prestazione_offerta">
      <h1>Services Offered</h1>
      <form method="post" action="/config">
        <div class="input_nome">
          <p>Name</p>
          <input type="text" name="name" size="20" required>
        </div>
        <div class="input_tempo">
          <p>Time</p>
          <input type="number" name="time" size="40" required>
        </div>
        <button type="submit" name="submit" value="create_so">Create</button>
      </form>
      <hr>
      <h1>Cancellation</h1>
      <form method="post" action="/config">
        <div class="input_id">
          <select type="text" name="offered" required>
          <?php foreach ($offered as $offered_item) : ?>
            <option>
              <?= $offered_item->id; ?> - <?= $offered_item->Name; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_so">Delete</button>
      </form>
    </div>

    <!-- Form per inserimento e cancellazione Prestazione Erogata -->
    <div class="form_prestazione_erogata">
      <h1>Services Provided</h1>
      <form method="post" action="/config">
        <div class="input_data">
          <p>Date</p>
          <input type="date" name="date" size="20" required>
        </div>
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
        <div class="input_quantita">
          <p>Quantity</p>
          <input type="number" name="quantity" size="40" required>
        </div>
        <button type="submit" name="submit" value="create_sp">Create</button>
      </form>
      <hr>
      <h1>Cancellation</h1>
      <form method="post" action="/config">
        <div class="input_id">
          <select type="text" name="provided" required>
          <?php foreach ($provided as $provided_item) : ?>
            <option>
              <?= $provided_item->id; ?> - <?= $provided_item->Date; ?> - <?= $provided_item->Typology; ?>
            </option>
          <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" value="delete_sp">Delete</button>
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
