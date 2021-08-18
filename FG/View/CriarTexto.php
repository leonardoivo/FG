<?php

use FG\BL\{TextoJornalistico, ManterTipoTexto, ManterColuna, ManterSecao};
use FG\LO\{TextoJornalisticoLO, SecoesLO, PerfilLO, ColunasLO, TipoTextoLO};
use FG\DTO\{TextoJornalisticoDTO, SecoesDTO, UsuariosDTO, TipotextoDTO, ColunasDTO, PerfilDTO};

require '../StartLoader/autoloader.php';
//Instâncias
$textoGeral = new TextoJornalistico();
$TipoTexto = new ManterTipoTexto();
$Secao = new ManterSecao();
$coluna = new ManterColuna();
//DTOs
$textoGeralDT = new TextoJornalisticoDTO();
$SecaoDT = new SecoesDTO();
$ColunaDT = new ColunasDTO();
$tipoTextoDT = new TipoTextoDTO();
//LO
$secaoLO = new SecoesLO();
$colunaLO = new ColunasLO();
$tipoTextoLO = new TipoTextoLO();
//Combos
$secaoLO = $Secao->ListarSecao();
$tipoTextoLO =  $TipoTexto->ListarTipos();
$colunaLO = $coluna->ListarColuna();

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<form action="CriarTexto.php" method="post">
		Título:<input type="text" name="titulo" cols="70"> <br />

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

				echo "<option value=\"{$colunatxt->idcoluna}\">{$colunatxt->nomeColuna}</option>";
			}
			?>
		</select>
		<br />

		Texto: <textarea name="texto" rows="100" cols="80"></textarea>

		<input type="submit" text="enviar">
	</form>
</body>

</html>
<?
$textoGeralDT->texto =  isset($_POST['texto']) ? $_POST['texto'] : "";
$textoGeralDT->datapublicacao = date("Y-m-d");
$textoGeralDT->idusuario;
$textoGeralDT->autor = isset($_POST['data_publicacao']) ? $_POST['data_publicacao'] : "";
$textoGeralDT->id_secao = 3;
$textoGeralDT->idcoluna = 1;
$textoGeralDT->idtipotexto = 2;
$textoGeralDT->titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";;
$textoGeralDT->subtitulo;
$textoGeral->CriarTexto($textoGeralDT);


?>