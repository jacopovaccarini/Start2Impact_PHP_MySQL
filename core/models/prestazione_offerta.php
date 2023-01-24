<?php
class PrestazioneOfferta {
	private $conn;
	private $table_name = "prestazioni_offerte";
	// proprietà di una prestazione offerta
	public $Nome;
	public $Tempo;
	// costruttore
	public function __construct($db) {
		$this->conn = $db;
	}

	// LEGGERE Prestazione Offerta
	function read() {
		// select all
    $query = "SELECT a.Nome, a.Tempo FROM " . $this->table_name . " a ORDER BY Nome ASC";
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
	}

	// CREARE Prestazione Offerta
  function create() {
    $query = "INSERT INTO " . $this->table_name . " SET Nome=:nome, Tempo=:tempo";
    $stmt = $this->conn->prepare($query);
    $this->Nome = htmlspecialchars(strip_tags($this->Nome));
    $this->Tempo = htmlspecialchars(strip_tags($this->Tempo));

    // binding
    $stmt->bindParam(":nome", $this->Nome);
    $stmt->bindParam(":tempo", $this->Tempo);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
  }

	// AGGIORNARE Prestazione Offerta
  function update() {
    $query = "UPDATE " . $this->table_name . " SET Tempo = :tempo WHERE Nome = :nome";
    $stmt = $this->conn->prepare($query);
    $this->Nome = htmlspecialchars(strip_tags($this->Nome));
    $this->Tempo = htmlspecialchars(strip_tags($this->Tempo));

    // binding
		$stmt->bindParam(":nome", $this->Nome);
    $stmt->bindParam(":tempo", $this->Tempo);

    // execute the query
    if($stmt->execute()){
        return true;
    }

    return false;
  }

	// CANCELLARE Prestazione Offerta
  function delete() {
    $query = "DELETE FROM " . $this->table_name . " WHERE Nome = ?";
    $stmt = $this->conn->prepare($query);
    $this->Nome = htmlspecialchars(strip_tags($this->Nome));

		// binding
		$stmt->bindParam(1, $this->Nome);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
  }

}

?>
