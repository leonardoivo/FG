<?php
namespace FG\LO
{
use \ArrayObject;
use FG\DTO\TipousuarioDTO;
class TipousuarioLO{
private $Tipousuario;

function  __construct()
{
    $this->Tipousuario= new ArrayObject();
}
public function add(TipousuarioDTO $Tipousuario)
    {
        //$this->Tipousuario->offsetSet($Tipousuario->getTitulo(),$Tipousuario); //Função porfora77
        $this->Tipousuario->append($Tipousuario); //adiciona um indice automatico
    }
    public function getTipousuario(){

        return $this->Tipousuario;
    }
    public function del(TipousuarioDTO $Tipousuario)
    {
        $this->Tipousuario->offsetUnset($Tipousuario);
    }

    public function find(TipousuarioDTO $Tipousuario)
    {
        return $this->Tipousuario->offsetExists($Tipousuario);
    }

}

}
?>