<?php
use FG\BL\{ManterUsuario};
require '../StartLoader/autoloader.php';
$AssociadosLt = new ManterUsuario();
$Meiospag=$AssociadosLt->ObterTotaisTipoMeioPagJson();

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($Meiospag);
exit(0);

?>