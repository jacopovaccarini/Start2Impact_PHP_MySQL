<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// includiamo database.php e libro.php per poterli usare
include_once '../config/database.php';
include_once '../models/prestazione_offerta.php';
// creiamo un nuovo oggetto Database e ci colleghiamo al nostro database
$database = new Database();
$db = $database->getConnection();
// Creiamo un nuovo oggetto PrestazioneOfferta
$prestOfferta = new PrestazioneOfferta($db);
// query products
$stmt = $prestOfferta->read();
$num = $stmt->rowCount();
// se vengono trovati libri nel database
if($num>0){
    // array di libri
    $prestOfferta_arr = array();
    $prestOfferta_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $prestOfferta_item = array(
            "Nome" => $Nome,
            "Tempo" => $Tempo
        );
        array_push($prestOfferta_arr["records"], $prestOfferta_item);
    }
    echo json_encode($prestOfferta_arr);
}else{
    echo json_encode(
        array("message" => "Nessuna Prestazione Offerta Trovata in Bonny.")
    );
}
?>
