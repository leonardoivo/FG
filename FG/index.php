<?php

use FG\BL\{TextoJornalistico, ManterSecao, ControleAcesso,Paginacao};
use FG\LO\{TextoJornalisticoLO, SecoesLO};
use FG\LO\{TextoJornalisticoDTO, SecaoDTO};


require 'StartLoader/autoloader.php';
$textoGeraisLO = new TextoJornalisticoLO();
$Lsecao = new SecoesLO();
$texto = new TextoJornalistico();
$textoGeral = new TextoJornalistico();
$secao = new ManterSecao();
$Controle = new ControleAcesso();
$pg = new Paginacao();

//Paginação:

$pg->linhasPorPagina=10;
$pg->incremento=0;
$pg->decremento = 0;
$pg->avanco=0;
$pg->retorno=0;
$pg->paginaAtual=0;
$pg->numero_pagina =(isset($_GET['pagina']))? $_GET['pagina'] : 1; 

$pg->totalLinhas = $textoGeral->ListarTotais();
$pg->totalPaginas=$pg->ObterTotalDePaginas($pg->totalLinhas,$pg->linhasPorPagina);
$pg->paginaCorrente=$pg->ObterPaginaCorrente($pg->linhasPorPagina,$pg->numero_pagina);
$textoGeraisLO = $textoGeral->ListarTextoComPaginacao($pg->paginaCorrente, $pg->linhasPorPagina);
$Lsecao = $secao->ListarSecao();
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