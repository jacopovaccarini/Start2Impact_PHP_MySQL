<?php

ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0); // disabilita la visualizzazione degli errori a schermo.
ini_set('log_errors', 1); // abilita il log degli errori.

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
  if (!empty($data->Data) && !empty($data->Tipologia) && !empty($data->Quantita)) {
    $prestErogata->Data = $data->Data;
    $prestErogata->Tipologia = $data->Tipologia;
    $prestErogata->Quantita = $data->Quantita;

    if ($prestErogata->create()) {
      http_response_code(201);
      echo json_encode(array("message" => "Prestazione erogata creata correttamente."));
    } else {
      //503 servizio non disponibile
      http_response_code(503);
      echo json_encode(array("message" => "Impossibile creare la prestazione erogata."));
    }
  } else {
    //400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile creare la prestazione erogata perchè i dati sono incompleti."));
  }
} else if ($_POST['submit'] == "Submit") {
  $data = [
    'Data' => $_POST['data'],
    'Tipologia' => $_POST['tipologia'],
    'Quantita' => $_POST['quantita']
  ];

  if (!empty($data['Data']) && !empty($data['Tipologia']) && !empty($data['Quantita'])) {
    $prestErogata->Data = $data['Data'];
    $prestErogata->Tipologia = $data['Tipologia'];
    $prestErogata->Quantita = $data['Quantita'];

    if ($prestErogata->create()) {
      header("location: /tables");
    } else {
      //503 servizio non disponibile
      http_response_code(503);
      echo json_encode(array("message" => "Impossibile creare la prestazione erogata."));
    }
  } else {
    //400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile creare la prestazione erogata perchè i dati sono incompleti."));
  }
} else {
  //400 bad request
  http_response_code(400);
  echo json_encode(array("message" => "Impossibile creare la prestazione erogata perchè i dati sono incompleti."));
}

?>
