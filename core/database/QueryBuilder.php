<?php

class QueryBuilder {
  protected $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  // SELEZIONA tutte le righe della tabella
  public function selectAll($table) {
    $query = "SELECT * FROM {$table}";
    $stmt = $this->pdo->prepare($query);

    // Esecuzione query
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

  // SELEZIONA tutte le righe delle tabelle unite
  public function selectJoin($table, $join) {
    $query = "SELECT *, Tempo * Quantita AS Prodotto FROM {$table} INNER JOIN {$join} ON {$table}.Nome = {$join}.Tipologia ORDER BY Data ASC";
    $stmt = $this->pdo->prepare($query);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

  // INSERIMENTO nuova Prestazione
  public function insert($table, $parameters) {
    $query = sprintf(
      'insert into %s (%s) values (%s)',
      $table,
      implode(', ', array_keys($parameters)),
      ':' . implode(', :', array_keys($parameters))
    );

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($parameters);
    } catch (Exception $e) {
      die('Whoops, something went wrong');
      return false;
    }

    return true;
  }

  // MODIFICA Prestazione Offerta
  public function update_so($table, $parameters) {
    $query = sprintf(
      'update %s set %s = %s, %s = %s where %s = %s',
      $table,
      array_keys($parameters)[1],
      ':' . array_keys($parameters)[1],
      array_keys($parameters)[2],
      ':' . array_keys($parameters)[2],
      array_keys($parameters)[0],
      ':' . array_keys($parameters)[0]
    );

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($parameters);
    } catch(Exception $e) {
      die($e.'Whoops, something went wrong');
      return false;
    }

    return true;
  }

  // MODIFICA Prestazione Erogata
  public function update_sp($table, $parameters) {
    $query = sprintf(
      'update %s set %s = %s, %s = %s, %s = %s where %s = %s',
      $table,
      array_keys($parameters)[1],
      ':' . array_keys($parameters)[1],
      array_keys($parameters)[2],
      ':' . array_keys($parameters)[2],
      array_keys($parameters)[3],
      ':' . array_keys($parameters)[3],
      array_keys($parameters)[0],
      ':' . array_keys($parameters)[0]
    );

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($parameters);
    } catch(Exception $e) {
      die($e.'Whoops, something went wrong');
      return false;
    }

    return true;
  }

  // CANCELLAZIONE Prestazione
  public function delete($table, $parameters) {
    $query = sprintf(
      'delete from %s where %s = %s',
      $table,
      implode (', ', array_keys($parameters)),
      ':' . implode (', :', array_keys($parameters)),
    );

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute($parameters);
    } catch(Exception $e) {
      die($e.'Whoops, something went wrong');
      return false;
    }

    // Reset degli ID
    $query = "SET @num := 0;
      UPDATE {$table} SET id = @num := (@num+1);
      ALTER TABLE {$table} AUTO_INCREMENT =1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
    } catch(Exception $e) {
      die($e.'Whoops, something went wrong');
      return false;
    }

    return true;
  }

  // FILTRARE DATA Prestazione Unione
	public function filter_date($table, $join, $initial_date, $final_date) {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM {$table} INNER JOIN {$join} ON {$table}.Nome = {$join}.Tipologia WHERE Data BETWEEN :initial_date AND :final_date ORDER BY Data ASC";
	  $stmt = $this->pdo->prepare($query);
    $initial_date = htmlspecialchars(strip_tags($initial_date));
    $final_date = htmlspecialchars(strip_tags($final_date));

    // Binding
    $stmt->bindParam(":initial_date", $initial_date);
    $stmt->bindParam(":final_date", $final_date);

    // Esecuzione query
	  $stmt->execute();
	  return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	// FILTRARE TIPOLOGIA Prestazione Unione
	public function filter_type($table, $join, $type) {
    $query = "SELECT *, Tempo * Quantita AS Prodotto FROM {$table} INNER JOIN {$join} ON {$table}.Nome = {$join}.Tipologia WHERE Tipologia = :type ORDER BY Data ASC";
	  $stmt = $this->pdo->prepare($query);
    $type = htmlspecialchars(strip_tags($type));

    $stmt->bindParam(":type", $type);

	  $stmt->execute();
	  return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

  // FILTRARE DATA e TIPOLOGIA Prestazione Unione
	function filter_date_type($table, $join, $initial_date, $final_date, $type) {
	  $query = "SELECT *, Tempo * Quantita AS Prodotto FROM {$table} INNER JOIN {$join} ON {$table}.Nome = {$join}.Tipologia WHERE Data BETWEEN :initial_date AND :final_date AND Tipologia = :type ORDER BY Data ASC";
	  $stmt = $this->pdo->prepare($query);
    $initial_date = htmlspecialchars(strip_tags($initial_date));
    $final_date = htmlspecialchars(strip_tags($final_date));
		$type = htmlspecialchars(strip_tags($type));

    $stmt->bindParam(":initial_date", $initial_date);
    $stmt->bindParam(":final_date", $final_date);
    $stmt->bindParam(":type", $type);

	  $stmt->execute();
	  return $stmt->fetchAll(PDO::FETCH_CLASS);
	}
}
