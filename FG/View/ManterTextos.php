<?php

use FG\BL\{TextoJornalistico, CrudSecao, CrudUsuario,};
use FG\LO\{TextoJornalisticoLO, SecoesLO, UsuariosLO};
use FG\DTO\{TextoJornalisticoDTO, SecoesDTO, UsuariosDTO};

require '../StartLoader/autoloader.php';
$texto = new TextoJornalisticoDTO();
$textoGeral = new TextoJornalistico();
$editar = false;
$id_texto = '';

$texto->texto =  isset($_POST['texto']) ? $_POST['texto'] : "";
$texto->datapublicacao = date("Y-m-d");
$texto->idusuario;
$texto->autor = isset($_POST['data_publicacao']) ? $_POST['data_publicacao'] : "";
$texto->id_secao = 3;
$texto->idcoluna = 1;
$texto->idtipotexto = 2;
$texto->titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";;
$texto->subtitulo;

if ($editar == false && $id_texto > 0) {
	$textoGeral->CriarTexto($texto);
} else {
}
