<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
  'database' => [
    'name' => $_ENV['DATABASE'],
    'username' => $_ENV['USERNAME'],
    'password' => $_ENV['PASSWORD'],
    'connection' => $_ENV['CONNECTION'],
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
