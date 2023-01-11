<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/prestazione_erogata.php';

$database = new Database();
$db = $database->getConnection();
$prestErogata = new PrestazioneErogata($db);
$data = [
  'Data' => $_POST['data'],
  'Tipologia' => $_POST['tipologia'],
  'Quantita' => $_POST['quantita']
];

if(
    !empty($data['Data']) &&
    !empty($data['Tipologia']) &&
    !empty($data['Quantita'])
){
    $prestErogata->Data = $data['Data'];
    $prestErogata->Tipologia = $data['Tipologia'];
    $prestErogata->Quantita = $data['Quantita'];

    if($prestErogata->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Prestazione offerta creata correttamente."));
    }
    else{
        //503 servizio non disponibile
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile creare la prestazione offerta."));
    }
}
else{
    //400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile creare la prestazione offerta i dati sono incompleti."));
}
?>
