<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$prestErogata = new PrestazioneErogata($db);
$data = json_decode(file_get_contents("php://input"));

// se inviato via json o via form
if ($data != "") {
  if (!empty($data->Data) && !empty($data->Tipologia)) {
    $prestErogata->Data = $data->Data;
    $prestErogata->Tipologia = $data->Tipologia;

    if ($prestErogata->delete()) {
      http_response_code(200);
      echo json_encode(array("message" => "La prestazione erogata e' stata eliminata"));
    } else {
      //503 servizio non disponibile
      http_response_code(503);
      echo json_encode(array("message" => "Impossibile eliminare la prestazione erogata."));
    }
  } else {
    //400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile cancellare la prestazione erogata perchè i dati sono incompleti."));
  }
} else if ($_POST['submit'] == "Submit") {
  $data = [
    'Data' => $_POST['data'],
    'Tipologia' => $_POST['tipologia']
  ];

  if (!empty($data['Data']) && !empty($data['Tipologia'])) {
    $prestErogata->Data = $data['Data'];
    $prestErogata->Tipologia = $data['Tipologia'];

    if ($prestErogata->delete()) {
      header("location: /tables");
    } else {
      //503 servizio non disponibile
      http_response_code(503);
      echo json_encode(array("message" => "Impossibile eliminare la prestazione erogata."));
    }
  } else {
    //400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile cancellare la prestazione erogata perchè i dati sono incompleti."));
  }
} else {
  //400 bad request
  http_response_code(400);
  echo json_encode(array("message" => "Impossibile cancellare la prestazione erogata perchè i dati sono incompleti."));
}

?>
