<?php
use FG\DTO\{TipotextoDTO,TextoJornalisticoDTO};
use FG\LO\{TipoTextoLO,TextoJornalisticoLO};
use FG\BL\TextoJornalistico;
require 'StartLoader/autoloader.php';
//DTOS
$TipoTextoDT = new TipotextoDTO();
$TextoJornalisticoDT = new TextoJornalisticoDTO();
//LO
$TipoTextoL = new TipoTextoLO();
$TextoJornalisticoL = new TextoJornalisticoLO();

//Funções principais
$texto = new TextoJornalistico();

?>