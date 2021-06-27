<?php
use FG\BL\{TextoJornalistico ,Secao};
use FG\LO\{TextoJornalisticoLO,SecaoLO};
use FG\LO\{TextoJornalisticoDTO,SecaoDTO};


require 'StartLoader/autoloader.php';
$textoGeraisLO = new TextoJornalisticoLO();

$texto = new TextoJornalistico();
$textoGeral = new TextoJornalistico();


$textoGeraisLO=$textoGeral->ListarGeral();
foreach($textoGeraisLO-> getTextoJornalistico() as $BlogTexto){
  echo $BlogTexto->titulo."<br/>";
  echo $BlogTexto->subtitulo."<br/>";
  echo $BlogTexto->autor."<br/>";
  echo $BlogTexto->datapublicacao."<br/>";


}

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

</body>
</html>