<?php

class ServicesController {

  // Prestazioni Offerte
  public function create_so() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->Nome) && !empty($data->Tempo)) {
      if(App::get('database')->insert('prestazioni_offerte', [
        'Nome' => $data->Nome,
        'Tempo' => $data->Tempo
      ])){
        // 201 creazione riuscita
        http_response_code(201);
        echo json_encode(array("message" => "Prestazione offerta creata correttamente."));
      }else{
        // 503 servizio non disponibile
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile creare la prestazione offerta."));
      }
    }else{
      // 400 richiesta non valida
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile creare la prestazione offerta perchè i dati sono incompleti."));
    }
  }

  public function delete_so() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->id)) {
      if(App::get('database')->delete('prestazioni_offerte', [
        'id' => $data->id
      ])){
        // 200 stato OK
        http_response_code(200);
        echo json_encode(array("message" => "La prestazione offerta e' stata eliminata"));
      }else{
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile eliminare la prestazione offerta."));
      }
    }else{
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile cancellare la prestazione offerta perchè i dati sono incompleti."));
    }
  }

  public function update_so() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->id) && !empty($data->Nome) && !empty($data->Tempo)) {
      if(App::get('database')->update_so('prestazioni_offerte', [
        'id' => $data->id,
        'Nome' => $data->Nome,
        'Tempo' => $data->Tempo
      ])){
        http_response_code(200);
        echo json_encode(array("message" => "Prestazione offerta aggiornata."));
      }else{
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile aggiornare la prestazione offerta."));
      }
    }else{
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile aggiornare la prestazione offerta perchè i dati sono incompleti."));
    }
  }

  public function read_so() {
    $offered = App::get('database')->selectAll('prestazioni_offerte');
    if (!empty($offered)) {
      http_response_code(200);
      echo json_encode($offered);
    } else {
      // 204 nessun contenuto
      http_response_code(204);
    }
  }


  // Prestazioni Erogate
  public function create_sp() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->Data) && !empty($data->Tipologia) && !empty($data->Quantita)) {
      if(App::get('database')->insert('prestazioni_erogate', [
        'Data' => $data->Data,
        'Tipologia' => $data->Tipologia,
        'Quantita' => $data->Quantita
      ])){
        http_response_code(201);
        echo json_encode(array("message" => "Prestazione erogata creata correttamente."));
      }else{
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile creare la prestazione erogata."));
      }
    }else{
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile creare la prestazione erogata perchè i dati sono incompleti."));
    }
  }

  public function delete_sp() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->id)) {
      if(App::get('database')->delete('prestazioni_erogate', [
        'id' => $data->id
      ])){
        http_response_code(200);
        echo json_encode(array("message" => "La prestazione erogata e' stata eliminata"));
      }else{
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile eliminare la prestazione erogata."));
      }
    }else{
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile cancellare la prestazione erogata perchè i dati sono incompleti."));
    }
  }

  public function update_sp() {
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->id) && !empty($data->Data) && !empty($data->Tipologia) && !empty($data->Quantita)) {
      if(App::get('database')->update_sp('prestazioni_erogate', [
        'id' => $data->id,
        'Data' => $data->Data,
        'Tipologia' => $data->Tipologia,
        'Quantita' => $data->Quantita
      ])){
        http_response_code(200);
        echo json_encode(array("message" => "Prestazione erogata aggiornata."));
      }else{
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile aggiornare la prestazione erogata."));
      }
    }else{
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile aggiornare la prestazione erogata perchè i dati sono incompleti."));
    }
  }

  public function read_sp() {
    $provided = App::get('database')->selectAll('prestazioni_erogate');
    if (!empty($provided)) {
      http_response_code(200);
      echo json_encode($provided);
    } else {
      http_response_code(204);
    }
  }


  // Prestazioni unite
  public function filter_date() {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->Data_Iniziale) && !empty($data->Data_Finale)) {
      if ($data->Data_Finale > $data->Data_Iniziale) {
        $search = App::get('database')->filter_date('prestazioni_offerte', 'prestazioni_erogate', $data->Data_Iniziale, $data->Data_Finale);
        if (!empty($search)) {
          // Tempo risparmiato parziale (in base alla ricerca)
          $total_timeSaved = 0;
          foreach ($search as $search_item) {
            $total_timeSaved += $search_item->Prodotto;
          }
          array_push($search, array("Tempo_risparmiato" => $total_timeSaved));
          http_response_code(200);
          echo json_encode($search);
        } else {
          http_response_code(204);
        }
      } else {
        http_response_code(400);
        echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè la data finale è prima della data iniziale."));
      }
    } else {
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè i dati sono incompleti."));
    }
  }

  public function filter_type() {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->Tipologia)) {
      $search = App::get('database')->filter_type('prestazioni_offerte', 'prestazioni_erogate', $data->Tipologia);
      if (!empty($search)) {
        // Tempo risparmiato parziale (in base alla ricerca)
        $total_timeSaved = 0;
        foreach ($search as $search_item) {
          $total_timeSaved += $search_item->Prodotto;
        }
        array_push($search, array("Tempo_risparmiato" => $total_timeSaved));
        http_response_code(200);
        echo json_encode($search);
      } else {
        http_response_code(204);
      }
    } else {
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè i dati sono incompleti."));
    }
  }

  public function filter_date_type() {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->Data_Iniziale) && !empty($data->Data_Finale) && !empty($data->Tipologia)) {
      if ($data->Data_Finale > $data->Data_Iniziale) {
        $search = App::get('database')->filter_date_type('prestazioni_offerte', 'prestazioni_erogate', $data->Data_Iniziale, $data->Data_Finale, $data->Tipologia);
        if (!empty($search)) {
          // Tempo risparmiato parziale (in base alla ricerca)
          $total_timeSaved = 0;
          foreach ($search as $search_item) {
            $total_timeSaved += $search_item->Prodotto;
          }
          array_push($search, array("Tempo_risparmiato" => $total_timeSaved));
          http_response_code(200);
          echo json_encode($search);
        } else {
          http_response_code(204);
        }
      } else {
        http_response_code(400);
        echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè la data finale è prima della data iniziale."));
      }
    } else {
      http_response_code(400);
      echo json_encode(array("message" => "Impossibile filtrare la Prestazione Erogata perchè i dati sono incompleti."));
    }
  }

  public function time_saved() {
    $values = App::get('database')->selectJoin('prestazioni_offerte', 'prestazioni_erogate');
    if (!empty($values)) {
      // Tempo risparmiato totale
      $total_timeSaved = 0;
      foreach ($values as $value) {
        $total_timeSaved += $value->Prodotto;
      }
      http_response_code(200);
      echo json_encode(array("Tempo_risparmiato_totale" => $total_timeSaved));
    } else {
      http_response_code(204);
    }
  }

}
