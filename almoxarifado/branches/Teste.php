<?php
// require_once("TextoJornalistico.php");
// require_once("Entrevista.php");
// namespace FatosGerais;
// class Teste {

// $texto = new TextoJornalistico();

// $texto->setTitulo("Eu sou burro");
// echo $texto->GetTitulo();

require_once("autoload.php");



//}
$texto = new TextoJornalistico();

$texto->setTitulo("Eu sou burro<br/>");
echo $texto->GetTitulo();
$NovaEntrevista = new Entrevista();
$NovaEntrevista->setTitulo("Eu nao sou burro<br/>");
echo $NovaEntrevista->GetTitulo();
// $conectar = new crud();
// $conectar->imprimir();


$cabecalhoinsert="insert into TextoJornalistico (";
$valores= "values (";
$campos = array("idtextojor"=>"1", "texto"=>"2", "datapublicacao"=>"3", "idusuario"=>"4", "autor"=>"5", "id_secao"=>"6", "idcoluna"=>"7", "idtipotexto"=>"8", "titulo"=>"9", "subtitulo"=>"10");
//$numcampos= count($campos);

foreach($campos as $key=>$value)
{
  $cabecalhoinsert.= $key.",";
}

$totalcb=strlen($cabecalhoinsert);
$cabecalho=substr($cabecalhoinsert,0,$totalcb-1);
$cabecalho.=")";

foreach($campos as $key=>$value)
{
    $valores .= $campos[$key].',';
}
echo "<br/>";
$totalIn=strlen($valores);
$entradas=substr($valores,0,$totalIn-1);
$entradas.=")";

$resutante = $cabecalho.$entradas;
echo $resutante;








//echo $inserir;




?>