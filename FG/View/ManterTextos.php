<?php

use FG\BL\{TextoJornalistico, CrudSecao, CrudUsuario,};
use FG\LO\{TextoJornalisticoLO, SecoesLO, UsuariosLO};
use FG\DTO\{TextoJornalisticoDTO, SecoesDTO, UsuariosDTO};

require '../StartLoader/autoloader.php';
$textoGeralDT = new TextoJornalisticoDTO();
$textoGeral = new TextoJornalistico();
$editar = false;
$id_texto = '';

$textoGeralDT->texto =  isset($_POST['texto']) ? $_POST['texto'] : "";
$textoGeralDT->datapublicacao = date("Y-m-d");
$textoGeralDT->idusuario;
$textoGeralDT->autor = isset($_POST['data_publicacao']) ? $_POST['data_publicacao'] : "";
$textoGeralDT->id_secao =  isset($_POST['secao']) ? $_POST['secao'] : "";
$textoGeralDT->idcoluna =  isset($_POST['coluna']) ? $_POST['coluna'] : "";
$textoGeralDT->idtipotexto =  isset($_POST['tipoTexto']) ? $_POST['tipoTexto'] : "";
$textoGeralDT->titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
$textoGeralDT->subtitulo= isset($_POST['subtitulo']) ? $_POST['subtitulo'] : "";


if ($editar == false && $id_texto > 0) {
	$textoGeral->CriarTexto($textoGeralDT);
} else {
}
