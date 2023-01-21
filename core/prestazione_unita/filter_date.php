<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$prestUnione = new PrestazioneUnita($db);
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->Data_Iniziale) && !empty($data->Data_Finale)) {
  $prestUnione->Data_Iniziale = $data->Data_Iniziale;
  $prestUnione->Data_Finale = $data->Data_Finale;

  // query products
  $stmt = $prestUnione->filter_date();
  $num = $stmt->rowCount();
  // se vengono trovate prestazioni nel database
  if ($num>0) {
    // array di prestazioni
    $prestUnione_arr = array();
    $prestUnione_arr["records"] = array();
    $sommaUnione = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $prestUnione_item = array(
        "Data" => $Data,
        "Tipologia" => $Tipologia,
        "Quantita" => $Quantita,
        "Tempo" => $Tempo
      );
      array_push($prestUnione_arr["records"], $prestUnione_item);
      $sommaUnione += $Prodotto;
    }
    array_push($prestUnione_arr["records"], array("Tempo_risparmiato" => $sommaUnione));
    http_response_code(200);
    echo json_encode($prestUnione_arr);
  } else {
    http_response_code(204);
    echo json_encode(array("message" => "Nessuna Prestazione Erogata trovata in Bonny nell'intervallo di date scelto."));
  }
} else {
  //400 bad request
  http_response_code(400);
  echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè i dati sono incompleti."));
}

?>
