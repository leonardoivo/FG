<?php

use FG\BL\{ManterAudios, ManterAcervo};
use FG\LO\{AudiosLO, AcervoLO};
use FG\DTO\{AudiosDTO, AcervoDTO};

require '../StartLoader/autoloader.php';

//Instâncias
$Audio = new ManterAudios();
$Acervo = new ManterAcervo();
//LO
$AudioLO = new AudiosLO();
$lAcervo = new AcervoLO();
//DTOs
$AudioDT = new AudiosDTO();
$AcervoDT = new AcervoDTO();

$AudioLO = $Audio->ListarAudio();
foreach ($AudioLO->getAudio() as $Audiotxt) {
	echo "<tr><td>" . $Audiotxt->idAudio . "</td><td>.$Audiotxt->nome_Audio.</td></tr>";
}
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<form action="ManterAudio.php" method="post">
		Nome Audio: <input type="text" name="audio">
		Pertencente á: <select name="acervo">
			<?

			foreach ($lAcervo->getAcervo() as $acervotexto) {

				echo "<option value=\"{$acervotexto->idacervo}\">{$acervotexto->nome_acervo}</option>";
			}
			?>
		</select>
		<input type="submit" value="enviar">
	</form>

</body>

</html>