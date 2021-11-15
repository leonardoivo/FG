<?php

use FG\BL\{TextoJornalistico, ManterTipoTexto,ManterTipoMidia, ManterColuna, ManterSecao};
use FG\LO\{TextoJornalisticoLO, SecoesLO, PerfilLO, ColunasLO, TipoTextoLO,TipoMidiaLO};
use FG\DTO\{TextoJornalisticoDTO, SecoesDTO, UsuariosDTO, TipotextoDTO, TipoMidiaDTO,ColunasDTO, PerfilDTO};

require '../StartLoader/autoloader.php';
//Instâncias
$textoGeral = new TextoJornalistico();
$TipoTexto = new ManterTipoTexto();
$TipoMidia = new ManterTipoMidia();
$Secao = new ManterSecao();
$coluna = new ManterColuna();
//DTOs
$textoGeralDT = new TextoJornalisticoDTO();
$SecaoDT = new SecoesDTO();
$ColunaDT = new ColunasDTO();
$tipoTextoDT = new TipoTextoDTO();
$tipoMidiaDT = new TipoMidiaDTO();

//LO
$secaoLO = new SecoesLO();
$colunaLO = new ColunasLO();
$tipoTextoLO = new TipoTextoLO();
$tipoMidiaLO = new TipoMidiaLO();

//Combos
$secaoLO = $Secao->ListarSecao();
$tipoTextoLO =  $TipoTexto->ListarTipos();
$tipoMidiaLO =  $TipoMidia->ListarTipos();

$colunaLO = $coluna->ListarColuna();

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
	<script src="js/ckeditor/ckeditor.js"></script>

</head>

<body>
	<form action="ManterTextos.php" method="post">
		Título:<input type="text" name="titulo" cols="70"> <br />
		Subtítulo:<input type="text" name="subtitulo" cols="70"> <br />

		Data de publicação:<input type="date" name="data_publicacao"> <br />

		<br />
		Tipo de Texto: <select name="tipoTexto">
			<?
			foreach ($tipoTextoLO->getTipoTexto() as $tipotxt) {

				echo "<option value=\"{$tipotxt->idtipotexto}\">{$tipotxt->tiptextonome}</option>";
			}
			?>
		</select>
		<br />
		Tipo de Texto: <select name="tipoMidia">
			<?
			foreach ($tipoMidiaLO->getTipoMidia() as $tipomidia) {

				echo "<option value=\"{$tipomidia->id_tipomidia}\">{$tipomidia->nome_midia}</option>";
			}
			?>
		</select>
		<br />
		Seção do Texto: <select name="secao">
			<?
			foreach ($secaoLO->getSecoes() as $secaotxt) {

				echo "<option value=\"{$secaotxt->id_secao}\">{$secaotxt->nomeSecao}</option>";
			}
			?>

		</select>
		<br />

		Nome Coluna:
		<select name="coluna">
			<?
			foreach ($colunaLO->getColuna() as $colunatxt) {

				echo "<option value=\"{$colunatxt->idcoluna}\">{$colunatxt->nome}</option>";
			}
			?>
		</select>
		<br />

		Texto: <textarea name="texto" rows="100" cols="80"></textarea>

		<input type="submit" text="enviar">
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'texto' );
            </script>
	</form>
</body>

</html>
