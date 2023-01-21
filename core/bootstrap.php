<?php

require 'core/Router.php';
require 'core/Request.php';
require 'core/database/database.php';
require 'core/models/prestazione_offerta.php';
require 'core/models/prestazione_erogata.php';
require 'core/models/prestazione_unita.php';

$database = new Database();
$db = $database->getConnection();
