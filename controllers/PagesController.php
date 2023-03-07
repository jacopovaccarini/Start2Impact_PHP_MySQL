<?php

ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0); // disabilita la visualizzazione degli errori a schermo.
ini_set('log_errors', 1); // abilita il log degli errori.

class PagesController {

  // Pagina principale DASHBOARD
  public function dashboard() {

    // Tempo risparmiato totale
    $values = App::get('database')->selectJoin('services_offered', 'services_provided');
    $total_timeSaved = 0;
    foreach ($values as $value) {
      $total_timeSaved += $value->Product;
    }

    // Prestazioni offerte per ricerca tipologia
    $offered = App::get('database')->selectAll('services_offered');

    // Ricerca per data e per tipologia
    $initial_date = '';
    $final_date = '';
    $type = '';
    $timeSaved = 0;
    $error = 0;

    if ($_POST['submit'] == "filter_date") {
      $initial_date = $_POST['initial_date'];
      $final_date = $_POST['final_date'];
      if ($final_date < $initial_date) {
        $error = 1;
      } else {
        $search = App::get('database')->filter_date('services_offered', 'services_provided', $initial_date, $final_date);
      }
    } else if ($_POST['submit'] == "filter_type") {
      $type = $_POST['type'];
      $search = App::get('database')->filter_type('services_offered', 'services_provided', $type);
    }

    // Tempo risparmiato parziale (in base alla ricerca)
    foreach ($search as $search_item) {
      $timeSaved += $search_item->Product;
    }

    return view('index', compact('total_timeSaved', 'offered', 'initial_date', 'final_date', 'type', 'timeSaved', 'error', 'search'));
  }

  // Pagina secondaria TABELLE
  public function tables() {
    $offered = App::get('database')->selectAll('services_offered');
    $provided = App::get('database')->selectAll('services_provided');
    $joint = App::get('database')->selectJoin('services_offered', 'services_provided');

    return view('tables', compact('offered', 'provided', 'joint'));
  }

  // Pagina secondaria CONFIGURAZIONE
  public function config() {

    // Prestazioni offerte per cancellazione e per inserimento tipologia prest. erogate
    $offered = App::get('database')->selectAll('services_offered');

    // Prestazioni erogate per cancellazione
    $provided = App::get('database')->selectAll('services_provided');

    // Inserimento e cancellazione prestazioni
    $error = '';

    if ($_POST['submit'] == "create_so") {
      if (App::get('database')->insert('services_offered', [
        'Name' => $_POST['name'],
        'Time' => $_POST['time']
      ])) {
        // 201 creazione riuscita
        http_response_code(201);
        $error = 0; // creato con successo
      } else {
        // 503 servizio non disponibile
        http_response_code(503);
        $error = 1; // errore creazione
      }
    } else if ($_POST['submit'] == "delete_so") {
      $id = explode("-", $_POST['offered']);
      if (App::get('database')->delete('services_offered', [
        'id' => $id[0]
      ])) {
        // 200 stato OK
        http_response_code(200);
        $error = 2; // eliminato con successo
      } else {
        http_response_code(503);
        $error = 3; // errore eliminazione
      }
    } else if ($_POST['submit'] == "create_sp") {
      if (App::get('database')->insert('services_provided', [
        'Date' => $_POST['date'],
        'Typology' => $_POST['type'],
        'Quantity' => $_POST['quantity']
      ])) {
        http_response_code(201);
        $error = 0; // creato con successo
      } else {
        http_response_code(503);
        $error = 1; // errore creazione
      }
    } else if ($_POST['submit'] == "delete_sp") {
      $id = explode("-", $_POST['provided']);
      if (App::get('database')->delete('services_provided', [
        'id' => $id[0]
      ])) {
        http_response_code(200);
        $error = 2; // eliminato con successo
      } else {
        http_response_code(503);
        $error = 3; // errore eliminazione
      }
    }

    return view('config', compact('offered', 'provided', 'error'));
  }
}
