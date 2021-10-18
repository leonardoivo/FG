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
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.ico" />

<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   <script src="js/validacoes.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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