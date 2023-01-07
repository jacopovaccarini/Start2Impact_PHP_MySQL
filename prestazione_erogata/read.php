<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// includiamo database.php e libro.php per poterli usare
include_once '../config/database.php';
include_once '../models/prestazione_erogata.php';
// creiamo un nuovo oggetto Database e ci colleghiamo al nostro database
$database = new Database();
$db = $database->getConnection();
// Creiamo un nuovo oggetto PrestazioneOfferta
$prestErogata = new PrestazioneErogata($db);
// query products
$stmt = $prestErogata->read();
$num = $stmt->rowCount();
// se vengono trovati libri nel database
if($num>0){
    // array di libri
    $prestErogata_arr = array();
    $prestErogata_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $prestErogata_item = array(
            "Data" => $Data,
            "Tipologia" => $Tipologia,
            "Quantita" => $Quantita
        );
        array_push($prestErogata_arr["records"], $prestErogata_item);
    }
    echo json_encode($prestErogata_arr);
}else{
    echo json_encode(
        array("message" => "Nessuna Prestazione Erogata Trovata in Bonny.")
    );
}
?>
