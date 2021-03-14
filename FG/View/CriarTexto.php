<?php
use FG\BL\{TextoJornalistico ,Secao};
use FG\LO\TextoJornalisticoLO;
require 'StartLoader/autoloader.php';


$texto = new TextoJornalistico();
$textoGeral = new TextoJornalistico();
$textoGeral->texto="um texto de teste 3";
$textoGeral->autorblog="eu mesmo";
$textoGeral->tipotexto=2;
$textoGeral->tituloblog="texto de teste 3";
$textoGeral->dtpublicacao=date("Y-m-d");

$textoGeral->CriarTexto();


?>