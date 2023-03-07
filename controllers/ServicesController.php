<?php

class ServicesController {

  // Prestazioni Offerte
  public function create_so() {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->Name) && !empty($data->Time)) {
      if (App::get('database')->insert('services_offered', [
        'Name' => $data->Name,
        'Time' => $data->Time
      ])) {
        // 201 creazione riuscita
        http_response_code(201);
        echo json_encode(["message" => "The service offered has been created correctly."]);
      } else {
        // 503 servizio non disponibile
        http_response_code(503);
        echo json_encode(["message" => "Impossible to create the service offered."]);
      }
    } else {
      // 400 richiesta non valida
      http_response_code(400);
      echo json_encode(["message" => "Impossible to create the service offered because the data are incomplete."]);
    }
  }

  public function delete_so($id) {
    if (!empty($id)) {
      if (is_numeric($id)) {
        if (App::get('database')->delete('services_offered', [
          'id' => $id
        ])) {
          // 200 stato OK
          http_response_code(200);
          echo json_encode(["message" => "The service offered has been eliminated."]);
        } else {
          http_response_code(503);
          echo json_encode(["message" => "Impossible to eliminate the service offered."]);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "Impossible to delete the service offered because the id is not a number."]);
      }
    } else {
      http_response_code(400);
      echo json_encode(["message" => "Impossible to delete the service offered because the data are incomplete."]);
    }
  }

  public function update_so($id) {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($id) && !empty($data->Name) && !empty($data->Time)) {
      if (is_numeric($id)) {
        if (App::get('database')->update_so('services_offered', [
          'id' => $id,
          'Name' => $data->Name,
          'Time' => $data->Time
        ])) {
          http_response_code(200);
          echo json_encode(["message" => "The service offered has been updated."]);
        } else {
          http_response_code(503);
          echo json_encode(["message" => "Impossible to update the service offered."]);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "Impossible to update the service offered because the id is not a number."]);
      }
    } else {
      http_response_code(400);
      echo json_encode(["message" => "Impossible to update the service offered because the data are incomplete."]);
    }
  }

  public function read_so() {
    $offered = App::get('database')->selectAll('services_offered');
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
    if (!empty($data->Date) && !empty($data->Typology) && !empty($data->Quantity)) {
      if (App::get('database')->insert('services_provided', [
        'Date' => $data->Date,
        'Typology' => $data->Typology,
        'Quantity' => $data->Quantity
      ])) {
        http_response_code(201);
        echo json_encode(["message" => "The service provided has been created correctly."]);
      } else {
        http_response_code(503);
        echo json_encode(["message" => "Impossible to create the service provided."]);
      }
    } else {
      http_response_code(400);
      echo json_encode(["message" => "Impossible to create the service provided because the data are incomplete."]);
    }
  }

  public function delete_sp($id) {
    if (!empty($id)) {
      if (is_numeric($id)) {
        if (App::get('database')->delete('services_provided', [
          'id' => $id
        ])) {
          http_response_code(200);
          echo json_encode(["message" => "The service provided has been eliminated."]);
        } else {
          http_response_code(503);
          echo json_encode(["message" => "Impossible to eliminate the service provided."]);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "Impossible to delete the service provided because the id is not a number."]);
      }
    } else {
      http_response_code(400);
      echo json_encode(["message" => "Impossible to delete the service provided because the data are incomplete."]);
    }
  }

  public function update_sp($id) {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($id) && !empty($data->Date) && !empty($data->Typology) && !empty($data->Quantity)) {
      if (is_numeric($id)) {
        if (App::get('database')->update_sp('services_provided', [
          'id' => $id,
          'Date' => $data->Date,
          'Typology' => $data->Typology,
          'Quantity' => $data->Quantity
        ])) {
          http_response_code(200);
          echo json_encode(["message" => "The service provided has been updated."]);
        } else {
          http_response_code(503);
          echo json_encode(["message" => "Impossible to update the service provided."]);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "Impossible to update the service provided because the id is not a number."]);
      }
    } else {
      http_response_code(400);
      echo json_encode(["message" => "Impossible to update the service provided because the data are incomplete."]);
    }
  }

  public function read_sp() {
    if (isset($_GET["filters"]["initial_date"]) && isset($_GET["filters"]["final_date"]) && isset($_GET["filters"]["type"])) {
      // Prestazioni Erogate filtrate per data e tipologia
      if ($_GET["filters"]["final_date"] > $_GET["filters"]["initial_date"]) {
        $search = App::get('database')->filter_date_type('services_offered', 'services_provided', $_GET["filters"]["initial_date"], $_GET["filters"]["final_date"], $_GET["filters"]["type"]);
        if (!empty($search)) {
          // Tempo risparmiato parziale (in base alla ricerca)
          $total_timeSaved = 0;
          foreach ($search as $search_item) {
            $total_timeSaved += $search_item->Product;
          }
          array_push($search, ["Time_saved" => $total_timeSaved]);
          http_response_code(200);
          echo json_encode($search);
        } else {
          http_response_code(204);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "It is impossible to filter the service provided because the final date is before the initial date."]);
      }
    } else if (isset($_GET["filters"]["initial_date"]) && isset($_GET["filters"]["final_date"])) {
      // Prestazioni Erogate filtrate per data
      if ($_GET["filters"]["final_date"] > $_GET["filters"]["initial_date"]) {
        $search = App::get('database')->filter_date('services_offered', 'services_provided', $_GET["filters"]["initial_date"], $_GET["filters"]["final_date"]);
        if (!empty($search)) {
          // Tempo risparmiato parziale (in base alla ricerca)
          $total_timeSaved = 0;
          foreach ($search as $search_item) {
            $total_timeSaved += $search_item->Product;
          }
          array_push($search, ["Time_saved" => $total_timeSaved]);
          http_response_code(200);
          echo json_encode($search);
        } else {
          http_response_code(204);
        }
      } else {
        http_response_code(400);
        echo json_encode(["message" => "It is impossible to filter the service provided because the final date is before the initial date."]);
      }
    } else if (isset($_GET["filters"]["type"])) {
      // Prestazioni Erogate filtrate per tipologia
      $search = App::get('database')->filter_type('services_offered', 'services_provided', $_GET["filters"]["type"]);
      if (!empty($search)) {
        // Tempo risparmiato parziale (in base alla ricerca)
        $total_timeSaved = 0;
        foreach ($search as $search_item) {
          $total_timeSaved += $search_item->Product;
        }
        array_push($search, ["Time_saved" => $total_timeSaved]);
        http_response_code(200);
        echo json_encode($search);
      } else {
        http_response_code(204);
      }
    } else {
      // Tutte le Prestazioni Erogate
      $provided = App::get('database')->selectAll('services_provided');
      if (!empty($provided)) {
        http_response_code(200);
        echo json_encode($provided);
      } else {
        http_response_code(204);
      }
    }
  }


  // Prestazioni unite
  public function time_saved() {
    $values = App::get('database')->selectJoin('services_offered', 'services_provided');
    if (!empty($values)) {
      // Tempo risparmiato totale
      $total_timeSaved = 0;
      foreach ($values as $value) {
        $total_timeSaved += $value->Product;
      }
      http_response_code(200);
      echo json_encode(["Total_time_saved" => $total_timeSaved]);
    } else {
      http_response_code(204);
    }
  }

}
