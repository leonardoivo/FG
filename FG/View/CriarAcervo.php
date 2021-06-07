<?php
use FG\DTO\AcervoDTO;
use FG\LO\AcervoLO;
use FG\BL\ManterAcervo;
require '../StartLoader/autoloader.php';
//Instâncias
$Acervo = new ManterAcervo();

//DTOs
$AcervoDT = new AcervoDTO();
//LO
$lAcervoLO = new AcervoLO();
//uso

$lAcervoLO = $Acervo->ListarAcervo();


?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
<?
	foreach ($lAcervoLO->getAcervo() as $Acervotxt){
		echo "<tr><td>".$Acervotxt->idAcervo."</td><td>.$Acervotxt->nome_acervo.</td></tr>";

}
?>
</table>
<form action="ManterAcervo.php" method="post">
Nome da seção: <input type="text" name="Acervo">
<input type="submit"  value="enviar">
</form>

</body>
</html>
<?
$AcervoDT->nomeAcervo=isset($_POST['Acervo'])?$_POST['Acervo']:"";
$Acervo->CriarAcervo($AcervoDT->nomeAcervo);
?>






?>