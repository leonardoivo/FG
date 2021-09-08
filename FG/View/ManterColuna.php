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