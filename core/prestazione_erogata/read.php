<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Creiamo un nuovo oggetto PrestazioneErogata
$prestErogata = new PrestazioneErogata($db);
// query products
$stmt = $prestErogata->read();
$num = $stmt->rowCount();
// se vengono trovate prestazioni nel database
if ($num>0) {
  // array di prestazioni erogate
  $prestErogata_arr = array();
  $prestErogata_arr["records"] = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $prestErogata_item = array(
      "Data" => $Data,
      "Tipologia" => $Tipologia,
      "Quantita" => $Quantita
    );
    array_push($prestErogata_arr["records"], $prestErogata_item);
  }
  http_response_code(200);
  echo json_encode($prestErogata_arr);
} else {
  http_response_code(204);
  echo json_encode(array("message" => "Nessuna Prestazione Erogata Trovata in Bonny."));
}

?>
