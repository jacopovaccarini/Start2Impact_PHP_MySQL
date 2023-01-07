<?php

class QueryBuilder
{
  protected $pdo;

  public function __construct($db)
    {
    $this->pdo = $db;
    }

  public function selectAll($table)
  {
    $statement = $this->pdo->prepare("select * from {$table}");

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
  }
}
