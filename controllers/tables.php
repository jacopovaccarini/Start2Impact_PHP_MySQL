<?php

$prestOfferta = new PrestazioneOfferta($db);
$offerte = $prestOfferta->read()->fetchAll(PDO::FETCH_CLASS);

$prestErogata = new PrestazioneErogata($db);
$erogate = $prestErogata->read()->fetchAll(PDO::FETCH_CLASS);

$prestUnita = new PrestazioneUnita($db);
$unite = $prestUnita->join_table()->fetchAll(PDO::FETCH_CLASS);

require 'views/tables.view.php';
