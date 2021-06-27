<?php
use FG\DTO\TipotextoDTO;
use FG\LO\TipoTextoLO;
use FG\BL\ManterTipoTexto;
require 'StartLoader/autoloader.php';
//DTOs
$tipoTextoDT= new TipoTextoDTO();
//LO
$lTipotexto = new TipoTextoLO();
//BL
$tipoTexto = new ManterTipoTexto();
//execução
$lTipotexto = $tipoTexto->ListarTipos();

foreach ($lTipotexto->getTipoTexto() as $tipoTxtDT){
}

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
</form>
</body>
</html>