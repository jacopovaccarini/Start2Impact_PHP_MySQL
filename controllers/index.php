<?php

ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0); // disabilita la visualizzazione degli errori a schermo.
ini_set('log_errors', 1); // abilita il log degli errori.

$prestOfferta = new PrestazioneOfferta($db);
$offerte = $prestOfferta->read()->fetchAll(PDO::FETCH_CLASS);

// tempo risparmiato
$prestUnita = new PrestazioneUnita($db);
$unite = $prestUnita->time_saved();
$num = $unite->rowCount();
$sommaUnione = 0;
// se vengono trovate prestazioni nel database
if ($num>0) {
  $values = $unite->fetchAll(PDO::FETCH_CLASS);
  foreach ($values as $value) {
    $sommaUnione += $value->Prodotto;
  }
}

$data_iniziale = '';
$data_finale = '';
$tipologia = '';
$somma = 0;
$errore = 0;

if ($_POST['submit'] == "date") {
  $data_iniziale = $_POST['data_iniziale'];
  $data_finale = $_POST['data_finale'];
  if ($data_finale < $data_iniziale) {
    $errore = 1;
  } else {
    $prestSearch = new PrestazioneUnita($db);
    $prestSearch->Data_Iniziale = $data_iniziale;
    $prestSearch->Data_Finale = $data_finale;
    $search = $prestSearch->filter_date()->fetchAll(PDO::FETCH_CLASS);
  }
} else if ($_POST['submit'] == "type") {
  $tipologia = $_POST['tipologia'];
  $prestSearch = new PrestazioneUnita($db);
  $prestSearch->Tipologia = $tipologia;
  $search = $prestSearch->filter_type()->fetchAll(PDO::FETCH_CLASS);
}

foreach ($search as $value) {
  $somma += $value->Prodotto;
}

require 'views/index.view.php';
