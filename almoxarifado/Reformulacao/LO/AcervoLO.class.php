<?php
namespace FG\LO
{
use \ArrayObject;
use FG\DTO\AcervoDTO;
class AcervoLO{
private $Acervo;

function  __construct()
{
    $this->Acervo= new ArrayObject();
}
public function add(AcervoDTO $acervo)
    {
        //$this->Acervo->offsetSet($acervo->getTitulo(),$acervo); //Função porfora77
        $this->Acervo->append($acervo); //adiciona um indice automatico
    }
    public function getAcervo(){

        return $this->Acervo;
    }
    public function del(AcervoDTO $acervo)
    {
        $this->Acervo->offsetUnset($acervo);
    }

    public function find(AcervoDTO $acervo)
    {
        return $this->Acervo->offsetExists($acervo);
    }

}

}
?>