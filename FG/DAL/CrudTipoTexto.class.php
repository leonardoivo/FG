<?php
namespace FG\DAL{
use FG\DAL\Crud;
use FG\DTO\TipotextoDTO;
use FG\LO\TipoTextoLO;
use \ArrayObject;
use \PDO;

class CrudTipoTexto extends Crud{
    public $idtipotexto=0;
    public $nome_TipoTexto="";
    private $conexao;
    private $efetivar;
    public $secoes;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarTipoTexto(){
    
        $resultado=$this->conexao->query("select * from tipotexto");
         $secoes = new TipoTextoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
        $TipoTexto = new TipotextoDTO();
        $TipoTexto->idtipotexto=$linha['idtipotexto'];
        $TipoTexto->tiptextonome=$linha['tiptextonome'];
        $secoes->add($TipoTexto);
        }
        return $secoes;
        
        }
    
    
    
    public function GravarTipoTexto($tiptextonome){
    $this->nome_TipoTexto=$tiptextonome;
    $this->efetivar=$this->conexao->prepare("insert into secoes (tiptextonome) values (:tiptextonome)");
    $this->efetivar->bindParam("tiptextonome",$this->tiptextonome);
    $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    
    }
    
    public function AlterarTipoTexto($tiptextonome,$idtipotexto){
        $this->nome_TipoTexto=$tiptextonome;
        $this->idtipotexto=$idtipotexto;
        $this->efetivar=$this->conexao->prepare("update secoes set tiptextonome=? where idtipotexto=?");
        $this->efetivar->bindValue(1,$this->nome_TipoTexto);
        $this->efetivar->bindValue(2,$this->idtipotexto);
        $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    }
    
    public function ExcluirTipoTexto($idtipotexto){
    
        $this->idtipotexto=$idtipotexto;
        $this->efetivar=$this->conexao->prepare("delete from  secoes where idtipotexto=?");
        $this->efetivar->bindValue(1,$this->idtipotexto);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>