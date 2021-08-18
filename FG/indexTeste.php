<?php
// define('WWW_ROOT',dirname(__FILE__));
// define('DS',DIRECTORY_SEPARATOR);
// require_once(WWW_ROOT.DS.'autoloader.php');
use FG\BL\{TextoJornalistico, TextoBlog, Entrevista as Conversa, Secao};
use FG\LO\TextoJornalisticoLO;

require 'StartLoader/autoloader.php';


//use \ArrayObject;

//use FG\DAL\CrudSecao;
$textoBlogLO = new TextoJornalisticoLO();


$texto = new TextoJornalistico();
$textoBlog = new TextoBlog();
$textoBlog->texto = "um texto de teste 3";
$textoBlog->autorblog = "eu mesmo";
$textoBlog->tipotexto = 2;
$textoBlog->tituloblog = "texto de teste 3";
$textoBlog->dtpublicacao = date("Y-m-d");

$textoBlog->CriarTextoBlog();

$textoBlogLO = $textoBlog->listarBlogs();
foreach ($textoBlogLO->getTextoJornalistico() as $BlogTexto) {
  echo $BlogTexto->titulo . "<br/>";
  echo $BlogTexto->subtitulo . "<br/>";
  echo $BlogTexto->autor . "<br/>";
  echo $BlogTexto->datapublicacao . "<br/>";
}



$texto->setTitulo("Eu sou burro<br/>");
echo $texto->GetTitulo();
$NovaEntrevista = new Conversa();
$NovaEntrevista->setTitulo("Eu nao sou burro<br/>");
echo $NovaEntrevista->GetTitulo();
//$conectar = new Crud();
//$conectar->imprimir();

echo ("--------teste de gravação<br/>");


$dado = new Secao();
$dado->CriarSecao("Seção de teste de gravação22");
$dado->ListarSecao();




echo ("--------fim teste de gravação <br/>");

//$dado = new CrudSecao();
//$dado->GravarSecao("test2");
//$dado->ListarSecao();



$cabecalhoinsert = "insert into TextoJornalistico (";
$valores = "values (";
$campos = array("idtextojor" => "1", "texto" => "2", "datapublicacao" => "3", "idusuario" => "4", "autor" => "5", "id_secao" => "6", "idcoluna" => "7", "idtipotexto" => "8", "titulo" => "9", "subtitulo" => "10");
//$numcampos= count($campos);

foreach ($campos as $key => $value) {
  $cabecalhoinsert .= $key . ",";
}

$totalcb = strlen($cabecalhoinsert);
$cabecalho = substr($cabecalhoinsert, 0, $totalcb - 1);
$cabecalho .= ")";

foreach ($campos as $key => $value) {
  $valores .= $campos[$key] . ',';
}
echo "<br/>";
$totalIn = strlen($valores);
$entradas = substr($valores, 0, $totalIn - 1);
$entradas .= ")";

$resutante = $cabecalho . $entradas;
echo $resutante;








//echo $inserir;
