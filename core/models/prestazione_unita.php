<?php
class PrestazioneUnita {
	private $conn;
	private $table_name = "prestazioni_offerte";
	private $join_name = "prestazioni_erogate";
	// proprietà di una prestazione unita
	public $Tipologia;
	public $Data_Iniziale;
	public $Data_Finale;
	// costruttore
	public function __construct($db) {
		$this->conn = $db;
	}

	// FILTRARE DATA Prestazione Unione
	function filter_date() {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM " . $this->table_name . " INNER JOIN " . $this->join_name . " ON " . $this->table_name . ".Nome = " . $this->join_name . ".Tipologia WHERE Data BETWEEN :data_iniziale AND :data_finale ORDER BY Data ASC";
	  $stmt = $this->conn->prepare($query);
	  $this->Data_Iniziale = htmlspecialchars(strip_tags($this->Data_Iniziale));
	  $this->Data_Finale = htmlspecialchars(strip_tags($this->Data_Finale));

	  // binding
	  $stmt->bindParam(":data_iniziale", $this->Data_Iniziale);
	  $stmt->bindParam(":data_finale", $this->Data_Finale);

	  // execute the query
	  $stmt->execute();
	  return $stmt;
	}

	// FILTRARE TIPOLOGIA Prestazione Unione
	function filter_type() {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM " . $this->table_name . " INNER JOIN " . $this->join_name . " ON " . $this->table_name . ".Nome = " . $this->join_name . ".Tipologia WHERE Tipologia = :tipologia ORDER BY Data ASC";
	  $stmt = $this->conn->prepare($query);
	  $this->Tipologia = htmlspecialchars(strip_tags($this->Tipologia));

	  // binding
	  $stmt->bindParam(":tipologia", $this->Tipologia);

	  // execute the query
	  $stmt->execute();
	  return $stmt;
	}

	// FILTRARE DATA e TIPOLOGIA Prestazione Unione
	function filter_date_type() {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM " . $this->table_name . " INNER JOIN " . $this->join_name . " ON " . $this->table_name . ".Nome = " . $this->join_name . ".Tipologia WHERE Data BETWEEN :data_iniziale AND :data_finale AND Tipologia = :tipologia ORDER BY Data ASC";
	  $stmt = $this->conn->prepare($query);
	  $this->Data_Iniziale = htmlspecialchars(strip_tags($this->Data_Iniziale));
	  $this->Data_Finale = htmlspecialchars(strip_tags($this->Data_Finale));
		$this->Tipologia = htmlspecialchars(strip_tags($this->Tipologia));

	  // binding
	  $stmt->bindParam(":data_iniziale", $this->Data_Iniziale);
	  $stmt->bindParam(":data_finale", $this->Data_Finale);
		$stmt->bindParam(":tipologia", $this->Tipologia);

	  // execute the query
	  $stmt->execute();
	  return $stmt;
	}

	// TEMPO RISPARMIATO Prestazione Unione
	function time_saved() {
	  $query = "SELECT Tempo * Quantita AS Prodotto FROM " . $this->table_name . " INNER JOIN " . $this->join_name . " ON " . $this->table_name . ".Nome = " . $this->join_name . ".Tipologia";
	  $stmt = $this->conn->prepare($query);

		// execute the query
	  $stmt->execute();
	  return $stmt;
	}

	// UNISCI TABELLE Prestazione Unione
	function join_table() {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM " . $this->table_name . " INNER JOIN " . $this->join_name . " ON " . $this->table_name . ".Nome = " . $this->join_name . ".Tipologia ORDER BY Data ASC";
	  $stmt = $this->conn->prepare($query);

		// execute query
		$stmt->execute();
		return $stmt;
	}

}

?>
