<?php
namespace FG\BL{
use FG\DAL\CrudSecao;
use FG\DTO\SecoesDTO;
use \ArrayObject;
use FG\LO\SecoesLO;

class Secao{
    private $id_secao=0;
    private $nome_secao="";
 
 
public function CriarSecao($nomesecao){
    $gravarSecao= new CrudSecao();
    $this->nome_secao=$nomesecao;
    $gravarSecao->GravarSecao($this->nome_secao);
 
}
public function ListarSecao(){
    
    $secoes = new CrudSecao();
    $lSecoesLO = new SecoesLO();
    $lSecoesLO = $secoes->ListarSecao();
    foreach ($lSecoesLO->getSecoes() as $k => $secao) {
    
        echo $secao->id_secao;
        echo $secao->nome_secao."<br/>";
      
      }

    }

}

}
?>