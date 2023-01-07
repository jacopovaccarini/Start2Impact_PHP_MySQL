<?php
class PrestazioneErogata
	{
	private $conn;
	private $table_name = "prestazioni_erogate";
	// proprietà di una prestazione erogata
	public $Data;
	public $Tipologia;
	public $Quantita;
	// costruttore
	public function __construct($db)
		{
		$this->conn = $db;
		}

	// READ Prestazione Erogata
	function read()
		{
		// select all
    $query = "SELECT a.Data, a.Tipologia, a.Quantita FROM " . $this->table_name . " a ";
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
		}

	// CREARE Prestazione Erogata
  function create(){
    $query = "INSERT INTO " . $this->table_name . " SET Data=:data, Tipologia=:tipologia, Quantita=:quantita";
    $stmt = $this->conn->prepare($query);
    $this->Data = htmlspecialchars(strip_tags($this->Data));
    $this->Tipologia = htmlspecialchars(strip_tags($this->Tipologia));
		$this->Quantita = htmlspecialchars(strip_tags($this->Quantita));

    // binding
    $stmt->bindParam(":data", $this->Data);
    $stmt->bindParam(":tipologia", $this->Tipologia);
		$stmt->bindParam(":quantita", $this->Quantita);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

  }

	// AGGIORNARE Prestazione Erogata
  function update(){
    $query = "UPDATE " . $this->table_name . " SET Tipologia = :tipologia, Quantita = :quantita  WHERE Data = :data";
    $stmt = $this->conn->prepare($query);
		$this->Data = htmlspecialchars(strip_tags($this->Data));
    $this->Tipologia = htmlspecialchars(strip_tags($this->Tipologia));
		$this->Quantita = htmlspecialchars(strip_tags($this->Quantita));

    // binding
		$stmt->bindParam(":data", $this->Data);
    $stmt->bindParam(":tipologia", $this->Tipologia);
		$stmt->bindParam(":quantita", $this->Quantita);

    // execute the query
    if($stmt->execute()){
        return true;
    }

    return false;
  }

	// CANCELLARE Prestazione Offerta
  function delete(){
    $query = "DELETE FROM " . $this->table_name . " WHERE Data = ?";
    $stmt = $this->conn->prepare($query);
    $this->Data = htmlspecialchars(strip_tags($this->Data));
    $stmt->bindParam(1, $this->Data);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

  }

	}
?>
