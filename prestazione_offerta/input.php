<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/prestazione_offerta.php';

$database = new Database();
$db = $database->getConnection();
$prestOfferta = new PrestazioneOfferta($db);
$data = [
  'Nome' => $_POST['nome'],
  'Tempo' => $_POST['tempo']
];

if(
    !empty($data['Nome']) &&
    !empty($data['Tempo'])
){
    $prestOfferta->Nome = $data['Nome'];
    $prestOfferta->Tempo = $data['Tempo'];

    if($prestOfferta->create()){
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