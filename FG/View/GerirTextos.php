<?php

use FG\DTO\{TipotextoDTO, TextoJornalisticoDTO};
use FG\LO\{TipoTextoLO, TextoJornalisticoLO};
use FG\BL\{TextoJornalistico,ControleAcesso,Paginaçao};

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

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.ico" />

<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   <script src="js/validacoes.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
 
  <?
  $texto = new TextoJornalistico();
  foreach ($TextoJornalisticoL->getTextoJornalistico() as $textoJor) {
      echo $textoJor->titulo . "<br/>";
      echo $textoJor->subtitulo . "<br/>";
      echo $$textoJor->autor . "<br/>";
      echo $textoJor->datapublicacao . "<br/>";
  }
  $pg->incremento();
  $pg->decremento();
  $pg->Avancar();
  $pg->Retornar();

  echo "<nav aria-label=\"Navegação de página exemplo\">
<ul class=\"pagination\">
  <li class=\"page-item\">
    <a class=\"page-link\" href='index.php?pagina=" . $pg->retorno . "' aria-label=\"Anterior\">
      <span aria-hidden=\"true\">&laquo;</span>
      <span class=\"sr-only\">Anterior</span>
    </a>
  </li>";
  for ($i = 1; 1 + $pg->totalPaginas > $i; $i++) {
    // $paginaAtual=$i;
    $pg->ativo = ($i == $pg->numero_pagina) ? 'numativo' : '';
    // echo "<a href='index.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
    if ($pg->ativo == 'numativo') {
      echo  " <li class=\"page-item active\">
       <a class=\"page-link\" href='index.php?pagina=" . $i . "' >" . $i . "<span class=\"sr-only\"></span></a>
       
       </li>";
    } else {
      echo  " <li class=\"page-item\">
       <a class=\"page-link\" href='index.php?pagina=" . $i . "' >" . $i . "<span class=\"sr-only\"></span></a>
       
       </li>";
    }
    echo "<li class=\"page-item\">";
  }
  echo "<a class=\"page-link\" href='index.php?pagina=" . $pg->avanco . "' aria-label=\"Próximo\">
      <span aria-hidden=\"true\">&raquo;</span>
      <span class=\"sr-only\">Próximo</span>
    </a>
  </li>
</ul>
</nav>";

  ?>
</body>

</html>