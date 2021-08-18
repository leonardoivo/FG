<?php

use FG\BL\{ManterAudios};
use FG\LO\{AudiosLO};
use FG\DTO\{AudiosDTO};

require '../StartLoader/autoloader.php';

//Instâncias
$Acervo = new ManterAudios();
//LO
$AcervoLO = new AudiosLO();
//DTOs
$AcervoDT = new AudiosDTO();

$AcervoLO = $Acervo->ListarAudio();
foreach ($AcervoLO->getAudio() as $Acervotxt) {
    echo "<tr><td>" . $Acervotxt->idAcervo . "</td><td>.$Acervotxt->nome_acervo.</td></tr>";
}
