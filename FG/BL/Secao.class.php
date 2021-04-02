<?php
namespace FG\BL{
use FG\DAL\CrudSecao;
use FG\DTO\SecoesDTO;
use \ArrayObject;
use FG\LO\SecoesLO;

class Secao{
    private $id_secao=0;
    private $nome_secao="";
    private $Secao;
 
    public function __construct(){
     $Secao = new CrudSecao();

    }
 
public function CriarSecao($nomesecao){
    $this->nome_secao=$nomesecao;
    $this->Secao->GravarSecao($this->nome_secao);
 
}
public function ListarSecao(){
    
    $lSecoesLO = new SecoesLO();
    $lSecoesLO = $this->Secao->ListarSecao();
      return $lSecoesLO ;
    }

public function alterarSecao($id_secao,$nomesecao){
   $this->Secao->AlterarSecao($nomesecao,$id_secao);
    
}

public function ExcluirSecao($id_secao){
$this->Secao->ExcluirSecao($id_secao);
}

}

}
?>