<?php

$router->define([
  '' => 'controllers/index.php',
  'tables' => 'controllers/tables.php',
  'config' => 'controllers/config.php',
  'create_po' => 'core/prestazione_offerta/create.php',
  'delete_po' => 'core/prestazione_offerta/delete.php',
  'update_po' => 'core/prestazione_offerta/update.php',
  'read_po' => 'core/prestazione_offerta/read.php',
  'create_pe' => 'core/prestazione_erogata/create.php',
  'delete_pe' => 'core/prestazione_erogata/delete.php',
  'update_pe' => 'core/prestazione_erogata/update.php',
  'read_pe' => 'core/prestazione_erogata/read.php',
  'filter_date' => 'core/prestazione_unita/filter_date.php',
  'filter_type' => 'core/prestazione_unita/filter_type.php',
  'time_saved' => 'core/prestazione_unita/time_saved.php',
  'filter_date_type' => 'core/prestazione_unita/filter_date_type.php'
]);
