<?php

use FG\BL\{ManterImagens, ManterAcervo};
use FG\LO\{ImagensLO, AcervoLO};
use FG\DTO\{ImagensDTO, AcervoDTO};
require 'StartLoader/autoloader.php';
//DTO
$imagemDT = new ImagensDTO();
//LO
$lImagem = new ImagensLO();
$lAcervo = new AcervoLO();
//Instancia
$imagem = new ManterImagens();
$acervo = new ManterAcervo()

$lImagem = $imagem->ListarImagem();
$lAcervo = $acervo->ListarAcervo();


?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form action="ManterImagens.php" method="post">
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