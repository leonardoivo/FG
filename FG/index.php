<?php
use FG\BL\{TextoJornalistico ,ManterSecao};
use FG\LO\{TextoJornalisticoLO,SecoesLO};
use FG\LO\{TextoJornalisticoDTO,SecaoDTO};


require 'StartLoader/autoloader.php';
$textoGeraisLO = new TextoJornalisticoLO();
$Lsecao = new SecoesLO();
$texto = new TextoJornalistico();
$textoGeral = new TextoJornalistico();
$secao = new ManterSecao();
$Lsecao = $secao->ListarSecao();
$textoGeraisLO=$textoGeral->ListarGeral();




?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <ul>
<?
foreach($Lsecao->getSecoes() as $SecaoDT){
  echo "<li>".$SecaoDT->nomeSecao."</li>";
}
?>
  </ul>
  <?
foreach($textoGeraisLO-> getTextoJornalistico() as $BlogTexto){
  echo $BlogTexto->titulo."<br/>";
  echo $BlogTexto->subtitulo."<br/>";
  echo $BlogTexto->autor."<br/>";
  echo $BlogTexto->datapublicacao."<br/>";


}?>
</body>
</html>