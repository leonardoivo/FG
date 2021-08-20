<?php

use FG\DTO\TipotextoDTO;
use FG\LO\TipoTextoLO;
use FG\BL\ManterTipoTexto;

require 'StartLoader/autoloader.php';
//DTOs
$tipoTextoDT = new TipoTextoDTO();
//LO
$lTipotexto = new TipoTextoLO();
//BL
$tipoTexto = new ManterTipoTexto();
//execução
$lTipotexto = $tipoTexto->ListarTipos();

foreach ($lTipotexto->getTipoTexto() as $tipoTxtDT) {
   
    echo "<tr><td>" . $tipoTxtDT->idtipotexto. "</td><td>.$tipoTxtDT->tiptextonome.</td></tr>";

}

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
<form action="ManterTipoTextos.php" method="post">
		Tipo de texto: <input type="text" name="tiptextonome">
		<input type="submit" value="enviar">
    </form>
</body>

</html>