<?php

ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0); // disabilita la visualizzazione degli errori a schermo.
ini_set('log_errors', 1); // abilita il log degli errori.

$errore = '';

if ($_POST['submit'] == "create_po") {
  $prestOfferta = new PrestazioneOfferta($db);
  $prestOfferta->Nome = $_POST['nome'];
  $prestOfferta->Tempo = $_POST['tempo'];
  if ($prestOfferta->create()) {
    http_response_code(201);
    $errore = 0; // creato con successo
  } else {
    http_response_code(503);
    $errore = 1; // errore creazione
  }
} else if ($_POST['submit'] == "delete_po") {
  $prestOfferta = new PrestazioneOfferta($db);
  $prestOfferta->Nome = $_POST['nome'];
  if ($prestOfferta->delete()) {
    http_response_code(201);
    $errore = 2; // eliminato con successo
  } else {
    //503 servizio non disponibile
    http_response_code(503);
    $errore = 3; // errore eliminazione
  }
} else if ($_POST['submit'] == "create_pe") {
  $prestErogata = new PrestazioneErogata($db);
  $prestErogata->Data = $_POST['data'];
  $prestErogata->Tipologia = $_POST['tipologia'];
  $prestErogata->Quantita = $_POST['quantita'];
  if ($prestErogata->create()) {
    http_response_code(201);
    $errore = 0; // creato con successo
  } else {
    http_response_code(503);
    $errore = 1; // errore creazione
  }
} else if ($_POST['submit'] == "delete_pe") {
  $prestErogata = new PrestazioneErogata($db);
  $prestErogata->Data = $_POST['data'];
  $prestErogata->Tipologia = $_POST['tipologia'];
  if ($prestErogata->delete()) {
    http_response_code(201);
    $errore = 2; // eliminato con successo
  } else {
    http_response_code(503);
    $errore = 3; // errore eliminazione
  }
}

$prestOfferta = new PrestazioneOfferta($db);
$offerte = $prestOfferta->read()->fetchAll(PDO::FETCH_CLASS);

$prestErogata = new PrestazioneErogata($db);
$erogate = $prestErogata->read()->fetchAll(PDO::FETCH_CLASS);

require 'views/config.view.php';
