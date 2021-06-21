<?php
use FG\BL\{ManterAudios};
use FG\LO\{AudiosLO};
use FG\DTO\{AudiosDTO};
require '../StartLoader/autoloader.php';

//Instâncias
$Audio = new ManterAudios();
//LO
$AudioLO = new AudiosLO();
//DTOs
$AudioDT = new AudiosDTO();

$AudioLO = $Audio->ListarAudio();
foreach ($AudioLO->getAudio() as $Audiotxt){
    echo "<tr><td>".$Audiotxt->idAudio."</td><td>.$Audiotxt->nome_Audio.</td></tr>";

}
?>