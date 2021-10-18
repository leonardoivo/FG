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
<form action="ManterTipoTextos.php" method="post">
		Tipo de texto: <input type="text" name="tiptextonome">
		<input type="submit" value="enviar">
    </form>
</body>

</html>