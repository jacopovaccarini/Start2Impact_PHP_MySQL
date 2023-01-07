<?php
include_once 'config/database.php';
include_once 'models/QueryBuilder.php';

$database = new Database();
$db = $database->getConnection();
$queryBuilder = new QueryBuilder($db);

$tasks = $queryBuilder->selectAll('prestazioni_offerte');

require 'index.view.php';
