<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Creiamo un nuovo oggetto PrestazioneUnione
$prestUnione = new PrestazioneUnita($db);
// query products
$stmt = $prestUnione->time_saved();
$num = $stmt->rowCount();
// se vengono trovate prestazioni nel database
if ($num>0) {
  $values = $stmt->fetchAll(PDO::FETCH_CLASS);
  $sommaUnione = 0;
  foreach ($values as $value) {
    $sommaUnione += $value->Prodotto;
  }
  http_response_code(200);
  echo json_encode(array("Tempo_risparmiato" => $sommaUnione));
} else {
  http_response_code(204);
  echo json_encode(array("message" => "Nessuna Prestazione Unita Trovata in Bonny."));
}

?>
