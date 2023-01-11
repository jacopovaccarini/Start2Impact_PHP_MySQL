<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bonny</title>
</head>
<body>
  <div class="prestazioneOfferta">
    <h1>Prestazione Offerta</h1>
    <form method="post" action="prestazione_offerta/input.php">
      <p>Nome</p>
      <input type="text" name="nome" size="20">
      <p>Tempo</p>
      <input type="number" name="tempo" size="40">
      <button type="submit" name="submit" value="Sent">Submit</button>
    </form>
    <h2>Prestazioni:</h2>
    <ul>
      <?php foreach ($offerte as $offerta) : ?>
        <li>
          <?= $offerta->Nome; ?> <?= $offerta->Tempo; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <h4>Somma: <?= $sommaOfferte['sum(Tempo)']; ?></h4>
  </div>
  <div class="prestazioneErogata">
    <h1>Prestazione Erogata</h1>
    <form method="post" action="prestazione_erogata/input.php">
      <p>Data</p>
      <input type="date" name="data" size="20">
      <p>Tipologia</p>
      <input type="text" name="tipologia" size="20">
      <p>Quantità</p>
      <input type="number" name="quantita" size="40">
      <button type="submit" name="submit" value="Sent">Submit</button>
    </form>
    <h2>Prestazioni:</h2>
    <ul>
      <?php foreach ($erogate as $erogata) : ?>
        <li>
          <?= $erogata->Data; ?> <?= $erogata->Tipologia; ?> <?= $erogata->Quantita; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <h4>Somma: <?= $sommaErogate['sum(Quantita)']; ?></h4>
  </div>
  <ul>
    <?php foreach ($unioni as $unione) : ?>
      <li>
        <?= $unione->Data; ?> <?= $unione->Tipologia; ?> <?= $unione->Quantita; ?> <?= $unione->Tempo; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
