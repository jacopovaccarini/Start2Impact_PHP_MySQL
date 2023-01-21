<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Creiamo un nuovo oggetto PrestazioneOfferta
$prestOfferta = new PrestazioneOfferta($db);
// query products
$stmt = $prestOfferta->read();
$num = $stmt->rowCount();
// se vengono trovate prestazioni nel database
if ($num>0) {
  // array di prestazioni
  $prestOfferta_arr = array();
  $prestOfferta_arr["records"] = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $prestOfferta_item = array(
      "Nome" => $Nome,
      "Tempo" => $Tempo
    );
    array_push($prestOfferta_arr["records"], $prestOfferta_item);
  }
  http_response_code(200);
  echo json_encode($prestOfferta_arr);
} else {
  http_response_code(204);
  echo json_encode(array("message" => "Nessuna Prestazione Offerta Trovata in Bonny."));
}

?>
