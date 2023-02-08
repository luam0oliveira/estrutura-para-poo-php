<?php
require_once "Palestra.php";
require_once "Evento.php";
require_once "Ministrante.php";

$evento = new Evento("Party of legends", "Frei vital, 242", "2023-10-10", "13:00", "22:00");
$palestra = new Palestra("Como jogar bem um league", "2023-10-10", "vespertino", "180", "Desenvolvimento", "F1");
$ministrante = new Ministrante("Mateus daz Nevez", "123123123", "Frei Vital 242", "channelcontatos@gmail.com");
$participante = new Participante("Verm", "321321321", "pavuna, SP", "vrm@gmail.com");
$palestra2 = new Palestra("Como jogar bem um league", "2023-10-10", "vespertino", "180", "Desenvolvimento", "F1");



$palestra->setMinistrante($ministrante);
// $palestra2->setMinistrante($ministrante);




$evento->addPalestra($palestra);
$evento->addPalestra($palestra2);
print '<pre>';
// print_r($palestra);
// print_r($ministrante->listPalestraOrador());
print $evento->getInformacoesEvento();
print '</pre>';