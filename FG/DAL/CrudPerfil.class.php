<?php
namespace FG\DAL{
use FG\DTO\PerfilDTO;
use FG\DAL\Crud;
use FG\LO\PerfilLO;
use \PDO;
class CrudPerfil extends Crud{

    public $id_perfil=0;
    public $nome_perfil="";
    private $conexao;
    private $efetivar;
    public $perfil;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function Listarperfil(){
    
        $resultado=$this->conexao->query("select * from perfil");
         $Lperfil = new PerfilLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
        $perfilDT = new PerfilDTO();
        $perfilDT->id_perfil=$linha['id_perfil'];
        $perfilDT->nome_perfil=$linha['nome_perfil'];
        $Lperfil->addPerfil($perfilDT);
        }
        return $Lperfil;
        }
    
    
    
    public function Gravarperfil($nome_perfil){
    $this->nome_perfil=$nome_perfil;
    $this->efetivar=$this->conexao->prepare("insert into perfil (nome_perfil) values (:nome_perfil)");
    $this->efetivar->bindParam("nome_perfil",$this->nome_perfil);
    $this->efetivar->execute();
    
    
    }
    
    public function Alterarperfil($nome_perfil,$id_perfil){
        $this->nome_perfil=$nome_perfil;
        $this->id_perfil=$id_perfil;
        $this->efetivar=$this->conexao->prepare("update perfil set nome_perfil=? where id_perfil=?");
        $this->efetivar->bindValue(1,$this->nome_perfil);
        $this->efetivar->bindValue(2,$this->id_perfil);
        $this->efetivar->execute();
    
    }
    
    public function Excluirperfil($id_perfil){
    
        $this->id_perfil=$id_perfil;
        $this->efetivar=$this->conexao->prepare("delete from  perfil where id_perfil=?");
        $this->efetivar->bindValue(1,$this->id_perfil);
        $this->efetivar->execute();
    
    
    }








}
}


?>