<?php
namespace FG\DAL{
use FG\DAL\Crud;
use FG\DTO\ColunasDTO;
use FG\LO\ColunasLO;
use \ArrayObject;
use \PDO;

class CrudColuna extends Crud{

    private $conexao;
    private $efetivar;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function Listarcoluna(){
    
        $resultado=$this->conexao->query("select * from colunas");
         $colunas = new ColunasLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
        $coluna = new ColunasDTO();
        $coluna->idcoluna=$linha['id_coluna'];
        $coluna->nomeColuna=$linha['nomeColuna'];
        $coluna->id_secao=$linha['id_secao'];
        $coluna->id_usuario=$linha['id_usuario'];
        $colunas->add($coluna);
        }
        return $colunas;
        }
    
        public function ListarcolunaPorID($id_coluna){
    
            $resultado=$this->conexao->query("select * from colunas where id_coluna={$id_coluna}");
             $colunas = new ColunasLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
            $coluna = new ColunasDTO();
            $coluna->idcoluna=$linha['id_coluna'];
            $coluna->nomeColuna=$linha['nomeColuna'];
            $coluna->id_secao=$linha['id_secao'];
            $coluna->id_usuario=$linha['id_usuario'];
            $colunas->add($coluna);
            }
            return $colunas;
            }
        
    
    public function Gravarcoluna($nomecoluna){
    $this->nome_coluna=$nomecoluna;
    $this->efetivar=$this->conexao->prepare("insert into colunas (nomecoluna) values (:nomecoluna)");
    $this->efetivar->bindParam("nomeColuna",$this->nomeColuna);
    $this->efetivar->bindParam("id_secao",$this->id_secao);
    $this->efetivar->bindParam("id_usuario",$this->id_usuario);

    $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    
    }
    
    public function Alterarcoluna($nomecoluna,$id_coluna){
        $this->nome_coluna=$nomecoluna;
        $this->id_coluna=$id_coluna;
        $this->efetivar=$this->conexao->prepare("update colunas set nomecoluna=? where id_coluna=?");
        $this->efetivar->bindParam("id_coluna",$this->id_coluna);
        $this->efetivar->bindParam("nomeColuna",$this->nomeColuna);
        $this->efetivar->bindParam("id_secao",$this->id_secao);
        $this->efetivar->bindParam("id_usuario",$this->id_usuario);
        $this->efetivar->execute();
      //echo "\nPDOStatement::errorInfo():\n";
      $arr = $this->efetivar->errorInfo();
      //print_r($arr);
    }
    
    public function Excluircoluna($id_coluna){
    
        $this->id_coluna=$id_coluna;
        $this->efetivar=$this->conexao->prepare("delete from  colunas where id_coluna=?");
        $this->efetivar->bindValue(1,$this->id_coluna);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>