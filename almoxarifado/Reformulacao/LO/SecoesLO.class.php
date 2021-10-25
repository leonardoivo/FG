<?php
namespace FG\LO
{
use \ArrayObject;
use FG\DTO\SecoesDTO;
class SecoesLO{
private $secoes;

function  __construct()
{
    $this->secoes= new ArrayObject();
}
public function add(SecoesDTO $secao)
    {
        //$this->secoes->offsetSet($secao->getTitulo(),$secao); //Função porfora77
        $this->secoes->append($secao); //adiciona um indice automatico
    }
    public function getSecoes(){

        return $this->secoes;
    }
    public function del(SecoesDTO $secao)
    {
        $this->secoes->offsetUnset($secao);
    }

    public function find(SecoesDTO $secao)
    {
        return $this->secoes->offsetExists($secao);
    }

}

}
?>