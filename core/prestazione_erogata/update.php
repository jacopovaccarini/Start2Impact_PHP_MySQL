<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$prestErogata = new PrestazioneErogata($db);
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->Data) && !empty($data->Tipologia) && !empty($data->Quantita)) {
  $prestErogata->Data = $data->Data;
  $prestErogata->Tipologia = $data->Tipologia;
  $prestErogata->Quantita = $data->Quantita;

  if ($prestErogata->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Prestazione erogata aggiornata."));
  } else {
    //503 servizio non disponibile
    http_response_code(503);
    echo json_encode(array("message" => "Impossibile aggiornare la prestazione erogata."));
  }
} else {
  //400 bad request
  http_response_code(400);
  echo json_encode(array("message" => "Impossibile aggiornare la prestazione erogata perchè i dati sono incompleti."));
}

?>
