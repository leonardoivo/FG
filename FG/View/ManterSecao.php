<?php
use FG\DTO\SecoesDTO;
use FG\LO\SecoesLO;
use FG\BL\ManterSecao;
require '../StartLoader/autoloader.php';

//Objetos:
$secao = new ManterSecao();
//DTO
$secaoDT = new SecoesDTO();
//LO
$secaoLO = new SecoesLO();
//uso
$secaoLO = $secao->ListarSecao(); 

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
<?
	foreach ($secaoLO->getSecoes() as $secaotxt){
		echo "<tr><td>".$secaotxt->id_secao."</td><td>.$secaotxt->nomeSecao.</td></tr>";

}
?>
</table>
<form action="ManterSecao.php" method="post">
Nome da seção: <input type="text" name="secao">
<input type="submit"  value="enviar">
</form>

</body>
</html>
<?
$secaoDT->nomeSecao=isset($_POST['secao'])?$_POST['secao']:"";
$secao->CriarSecao($secaoDT->nomeSecao);
?>