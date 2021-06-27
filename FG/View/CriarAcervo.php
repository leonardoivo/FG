<?php
use FG\DTO\{AcervoDTO,TextoJornalisticoDTO};
use FG\LO\{AcervoLO,TextoJornalisticoLO};
use FG\BL\{ManterAcervo,TextoJornalistico};
require '../StartLoader/autoloader.php';
//Instâncias
$Acervo = new ManterAcervo();

//DTOs
$AcervoDT = new AcervoDTO();
$TextoJornalisticoDT = new TextoJornalisticoDTO();

//LO
$AcervoLO = new AcervoLO();
$TextoJornalisticoL = new TextoJornalisticoLO();

//uso
//LO
$AcervoLO = $Acervo->ListarAcervo();
$TextoAcervo = new TextoJornalistico();
$TextoJornalisticoL=$TextoAcervo->ListarGeral();

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
<?
	foreach ($AcervoLO->getAcervo() as $Acervotxt){
		echo "<tr><td>".$Acervotxt->idAcervo."</td><td>.$Acervotxt->nome_acervo.</td></tr>";

}
?>
</table>
<form action="ManterAcervo.php" method="post">
Nome do Acervo: <input type="text" name="Acervo">
Pertencente á:	<select  name="tipoTexto">
	<?

	foreach ($TextoJornalisticoL->getTextoJornalistico() as $acervotexto){

		echo "<option value=\"{$acervotexto->idtextojor}\">{$acervotexto->titulo}</option>";


	}
	?>
	</select>
<input type="submit"  value="enviar">
</form>

</body>
</html>
<?
$AcervoDT->nomeAcervo=isset($_POST['Acervo'])?$_POST['Acervo']:"";
$Acervo->idtextojor=isset($_POST['idtextojor'])?$_POST['idtextojor']:"";
if($AcervoDT->nomeAcervo!=""){
	$Acervo->CriarAcervo($AcervoDT->nomeAcervo);

}
?>
