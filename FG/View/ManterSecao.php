<?php

use FG\DTO\SecoesDTO;
use FG\LO\SecoesLO;
use FG\BL\{ManterSecao,Paginacao};

require '../StartLoader/autoloader.php';

//Objetos:
$secao = new ManterSecao();
//DTO
$secaoDT = new SecoesDTO();
//LO
$secaoLO = new SecoesLO();
//uso
$secaoLO = $secao->ListarSecao();
$pg = new Paginacao();

$pg->linhasPorPagina=10;
$pg->incremento=0;
$pg->decremento = 0;
$pg->avanco=0;
$pg->retorno=0;
$pg->paginaAtual=0;
$pg->numero_pagina =(isset($_GET['pagina']))? $_GET['pagina'] : 1; 

$pg->totalLinhas = $textoGeral->ListarTotais();
$pg->totalPaginas=$pg->ObterTotalDePaginas($pg->totalLinhas,$pg->linhasPorPagina);
$pg->paginaCorrente=$pg->ObterPaginaCorrente($pg->linhasPorPagina,$pg->numero_pagina);
$textoGeraisLO = $textoGeral->ListarTextoComPaginacao($pg->paginaCorrente, $pg->linhasPorPagina);
$secaoLO = $secao->ListarSecao();
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.png" />

<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   <script src="js/validacoes.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<table>
		<?
		foreach ($secaoLO->getSecoes() as $secaotxt) {
			echo "<tr><td>" . $secaotxt->id_secao . "</td><td>.$secaotxt->nomeSecao.</td></tr>";
		}
		?>
	</table>
	<form action="ManterSecao.php" method="post">
		Nome da seção: <input type="text" name="secao">
		<input type="submit" value="enviar">
	</form>

</body>

</html>
<?
$secaoDT->nomeSecao = isset($_POST['secao']) ? $_POST['secao'] : "";
$secao->CriarSecao($secaoDT->nomeSecao);
?>
