<?php
namespace FG\LO
{
use \ArrayObject;
use FG\DTO\ColunasDTO;
class ColunasLO{
private $Coluna;

function  __construct()
{
    $this->Coluna= new ArrayObject();
}
public function add(ColunasDTO $Coluna)
    {
        //$this->Coluna->offsetSet($Coluna->getTitulo(),$Coluna); //Função porfora77
        $this->Coluna->append($Coluna); //adiciona um indice automatico
    }
    public function getColuna(){

        return $this->Coluna;
    }
    public function del(ColunasDTO $Coluna)
    {
        $this->Coluna->offsetUnset($Coluna);
    }

    public function find(ColunasDTO $Coluna)
    {
        return $this->Coluna->offsetExists($Coluna);
    }

}

}
?>