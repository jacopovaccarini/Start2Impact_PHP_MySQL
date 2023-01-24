<?php

$prestOfferta = new PrestazioneOfferta($db);
$offerte = $prestOfferta->read()->fetchAll(PDO::FETCH_CLASS);

$prestErogata = new PrestazioneErogata($db);
$erogate = $prestErogata->read()->fetchAll(PDO::FETCH_CLASS);

require 'views/config.view.php';
