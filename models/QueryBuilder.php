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
    $stmt = $this->pdo->prepare("select * from {$table}");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

  public function sumAll($table, $column)
  {
    $stmt = $this->pdo->prepare("select sum({$column}) from {$table}");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function joinAll($table, $join)
  {
    $stmt = $this->pdo->prepare("select * from {$table} inner join {$join} on {$table}.Nome = {$join}.Tipologia");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }
}
