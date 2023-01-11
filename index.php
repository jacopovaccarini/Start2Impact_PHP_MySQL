<?php
include_once 'config/database.php';
include_once 'models/QueryBuilder.php';

$database = new Database();
$db = $database->getConnection();
$queryBuilder = new QueryBuilder($db);

$offerte = $queryBuilder->selectAll('prestazioni_offerte');
$erogate = $queryBuilder->selectAll('prestazioni_erogate');
$sommaOfferte = $queryBuilder->sumAll('prestazioni_offerte','Tempo');
$sommaErogate = $queryBuilder->sumAll('prestazioni_erogate','Quantita');
$unioni = $queryBuilder->joinAll('prestazioni_offerte','prestazioni_erogate');

require 'index.view.php';
