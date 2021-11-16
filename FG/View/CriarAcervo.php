<?php

use FG\DTO\{AcervoDTO, TextoJornalisticoDTO,TipMidiaDTO};
use FG\LO\{AcervoLO, TextoJornalisticoLO,TipoMidiaLO};
use FG\BL\{ManterAcervo, TextoJornalistico,ManterTipoMidia};

require '../StartLoader/autoloader.php';
//Instâncias
$Acervo = new ManterAcervo();
$TipoMidia = new ManterTipoMidia();
//DTOs
$AcervoDT = new AcervoDTO();
$TextoJornalisticoDT = new TextoJornalisticoDTO();

//LO
$AcervoLO = new AcervoLO();
$TextoJornalisticoL = new TextoJornalisticoLO();
$LTipoMidia = new TipoMidiaLO();
//uso
//LO
$AcervoLO = $Acervo->ListarAcervo();
$TextoAcervo = new TextoJornalistico();
$TextoJornalisticoL = $TextoAcervo->ListarGeral();
$LTipoMidia= $TipoMidia->ListarTipos();
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<table>
		<?
		foreach ($AcervoLO->getAcervo() as $Acervotxt) {
			echo "<tr><td>" . $Acervotxt->idAcervo . "</td><td>.$Acervotxt->nome_acervo.</td></tr>";
		}
		?>
	</table>
	<form action="CriarAcervo.php" method="post">
		Nome do Acervo: <input type="text" name="Acervo">		<br/>

		Descrição: <input type="text" name="Descricao">		<br/>

		Data de Criação: <input type="date" name="DataDeCriacao">
		<br/>

		Pertencente á: <select name="idtextojor">
			<?
                   
			foreach ($TextoJornalisticoL->getTextoJornalistico() as $acervotexto) {
				echo "<option value=\"{$acervotexto->idtextojor}\">{$acervotexto->titulo}</option>";

             $LtipoMidiaJ = new $tipoMidiaLO();
			 $tipoMidiaJ = new ManterTipoMidia();
			 $LtipoMidiaJ = $tipoMidiaJ->ListarTiposPorID($acervotexto->id_tipomedia);
			 foreach($LtipoMidiaJ->getTipoMidia() as $tipomidiaDT){
				echo "<option value=\"{$acervotexto->idtextojor}\">{$acervotexto->titulo}</option>";


			 }
			}
			?>
		</select>
		<br/>
		Pertencente á: <select name="id_tipomidia">
			<?
                   
			foreach ($LTipoMidia->getTipoMidia() as $TipoMidiaDT) {
				echo "<option value=\"{$TipoMidiaDT->id_tipomidia}\">{$TipoMidiaDT->nome_midia}</option>";

			}
			?>
		</select>
		<br/>

		<input type="submit" value="enviar">
	</form>

</body>

</html>
<?
$AcervoDT->nome_acervo = isset($_POST['Acervo']) ? $_POST['Acervo'] : "";
$AcervoDT->idtextojor = isset($_POST['idtextojor']) ? $_POST['idtextojor'] : "";
$AcervoDT->Descricao = isset($_POST['Descricao']) ? $_POST['Descricao'] : "";
$AcervoDT->DataDeCriacao = isset($_POST['DataDeCriacao']) ? $_POST['DataDeCriacao'] : "";
$AcervoDT->id_tipomidia = isset($_POST['id_tipomidia']) ? $_POST['id_tipomidia'] : "";

if ($AcervoDT->nome_acervo == "" ||$AcervoDT->nome_acervo == null) {
	$Acervo->CriarAcervo($AcervoDT);
}
?>