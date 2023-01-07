<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bonny</title>
</head>
<body>
  <ul>
    <?php foreach ($tasks as $task) : ?>
      <li>
        <?= $task->Nome; ?> <?= $task->Tempo; ?>
      </li>
    <?php endforeach; ?>
  </ul>
  <form method="post" action="prestazione_offerta/input.php">
    <p>Nome</p>
    <input type="text" name="nome" size="20">
    <p>Tempo</p>
    <input type="number" name="tempo" size="40">
    <button type="submit" name="submit" value="Sent">Submit</button>
  </form>
</body>
</html>
