<?php

use FG\BL\{TextoJornalistico, ManterSecao, ControleAcesso};
use FG\LO\{TextoJornalisticoLO, SecoesLO};
use FG\LO\{TextoJornalisticoDTO, SecaoDTO};


require 'StartLoader/autoloader.php';
$textoGeraisLO = new TextoJornalisticoLO();
$Lsecao = new SecoesLO();
$texto = new TextoJornalistico();
$textoGeral = new TextoJornalistico();
$secao = new ManterSecao();
$Controle = new ControleAcesso();




//Paginação:
$totalLinhas = 0;
$linhasPorPagina = 10;
$paginaCorrente = 0;
$totalPagina = 0;
$incremento = 0;
$decremento = 0;
$avanco = 0;
$retorno = 0;
$paginaAtual = 0;
$numero_pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$TotalLinhas = $textoGeral->ListarTotais();
$totalPaginas = $Controle->ObterTotalDePaginas($TotalLinhas, $linhasPorPagina);
$paginaCorrente = $Controle->ObterPaginaCorrente($linhasPorPagina, $numero_pagina);
$Lsecao = $secao->ListarSecao();
$textoGeraisLO = $textoGeral->ListarTextoComPaginacao($paginaCorrente, $linhasPorPagina);
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
  <ul>
    <?
    foreach ($Lsecao->getSecoes() as $SecaoDT) {
      echo "<li>" . $SecaoDT->nomeSecao . "</li>";
    }
    ?>
  </ul>
  <?
  foreach ($textoGeraisLO->getTextoJornalistico() as $BlogTexto) {
    echo $BlogTexto->titulo . "<br/>";
    echo $BlogTexto->subtitulo . "<br/>";
    echo $BlogTexto->autor . "<br/>";
    echo $BlogTexto->datapublicacao . "<br/>";
  }
  $incremento = $numero_pagina + 1;
  $decremento = $numero_pagina - 1;
  $avanco = ($incremento > $totalPaginas) ? 1 : $incremento;
  $retorno = (1 > $decremento) ? 1 : $decremento;

  echo "<nav aria-label=\"Navegação de página exemplo\">
<ul class=\"pagination\">
  <li class=\"page-item\">
    <a class=\"page-link\" href='index.php?pagina=" . $retorno . "' aria-label=\"Anterior\">
      <span aria-hidden=\"true\">&laquo;</span>
      <span class=\"sr-only\">Anterior</span>
    </a>
  </li>";
  for ($i = 1; 1 + $totalPaginas > $i; $i++) {
    // $paginaAtual=$i;
    $ativo = ($i == $numero_pagina) ? 'numativo' : '';
    // echo "<a href='index.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
    if ($ativo == 'numativo') {
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
  echo "<a class=\"page-link\" href='index.php?pagina=" . $avanco . "' aria-label=\"Próximo\">
      <span aria-hidden=\"true\">&raquo;</span>
      <span class=\"sr-only\">Próximo</span>
    </a>
  </li>
</ul>
</nav>";

  ?>
</body>

</html>