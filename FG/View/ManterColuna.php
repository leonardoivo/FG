<?php

use FG\DTO\{ColunasDTO,SecoesDTO};
use FG\LO\{ColunasLO,SecoesLO};
use FG\BL\{ManterColuna,ManterSecao};

require '../StartLoader/autoloader.php';


//DTO
$ColunaDT = new ColunasDTO();
$secaoDT = new SecoesDTO();
//LO
$ColunaLO = new ColunasLO();
$secaoLO = new SecoesLO();
//Objetos:
$secao = new ManterSecao();
$Coluna = new ManterColuna();
//uso
$secaoLO = $secao->ListarSecao();
$ColunaLO = $Coluna->ListarColuna();


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



    <table>
        <?
        foreach ($ColunaLO->getColuna() as $Colunatxt) {
            echo "<tr><td>" . $Colunatxt->id_Coluna . "</td><td>.$Colunatxt->nomeColuna.</td></tr>";
        }
        ?>
    </table>
    <form action="ManterColuna.php" method="post">
        Nome da seção: <input type="text" name="Coluna">
        <br />
		Seção do Texto: <select name="secao">
			<?
			foreach ($secaoLO->getSecoes() as $secaotxt) {

				echo "<option value=\"{$secaotxt->id_secao}\">{$secaotxt->nomeSecao}</option>";
			}
			?>

		</select>
		<br />
        <input type="submit" value="enviar">
    </form>

</body>

</html>
<?
$ColunaDT->nomeColuna = isset($_POST['Coluna']) ? $_POST['Coluna'] : "";
$ColunaDT->id_secao = isset($_POST['secao']) ? $_POST['secao'] : "";

if ($ColunaDT->nomeColuna != "") {
    $Coluna->CriarColuna($ColunaDT->nomeColuna);
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