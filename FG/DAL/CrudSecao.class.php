<?php
namespace FG\DAL{
use FG\DAL\Crud;
use FG\DTO\SecoesDTO;
use FG\LO\SecoesLO;
use \ArrayObject;
use \PDO;

class CrudSecao extends Crud{
    public $id_secao=0;
    public $nome_secao="";
    private $conexao;
    private $efetivar;
    public $secoes;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarSecao(){
    
        $resultado=$this->conexao->query("select * from secoes");
         $secoes = new SecoesLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
        $secao = new SecoesDTO();
        $secao->id_secao=$linha['id_secao'];
        $secao->nomeSecao=$linha['nomeSecao'];
        $secoes->add($secao);
        }
        return $secoes;
        }
    
    
    
    public function GravarSecao($nomeSecao){
    $this->nome_secao=$nomeSecao;
    $this->efetivar=$this->conexao->prepare("insert into secoes(nomeSecao) values(:nomeSecao)");
    $this->efetivar->bindParam("nomeSecao",$this->nome_secao);
    $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    
    }
    
    public function AlterarSecao($nomeSecao,$id_secao){
        $this->nome_secao=$nomeSecao;
        $this->id_secao=$id_secao;
        $this->efetivar=$this->conexao->prepare("update secoes set nomeSecao=? where id_secao=?");
        $this->efetivar->bindValue(1,$this->nome_secao);
        $this->efetivar->bindValue(2,$this->id_secao);
        $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    }
    
    public function ExcluirSecao($id_secao){
    
        $this->id_secao=$id_secao;
        $this->efetivar=$this->conexao->prepare("delete from  secoes where id_secao=?");
        $this->efetivar->bindValue(1,$this->id_secao);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>