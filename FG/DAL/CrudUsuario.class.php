<?php
namespace FG\DAL{
use FG\DAL\Crud;
class CrudUsuario extends Crud{

    public     $idusuario;
    protected  $nome;
    protected  $sobrenome;
    protected  $email;
    protected  $dataNascimento;
    protected  $login;
    protected  $senha;
    protected  $dataCadastramento;
    protected  $biografia;
    protected  $idtipousuario;
    protected  $conexao;
    protected  $efetivar;
    
    public function __construct()
    {
        $this->conexao = new Crud();
    
    }
    
    public function ListarUsuarios(){
    
        $resultado=$this->conexao->query("select * from usuarios");
        
        while($linha=$resultado->fetch(\PDO::FETCH_ASSOC)){
        
    
       echo $this->idusuario=$linha['idusuario'];
       echo $this->nome=$linha['nome'];
       echo $this->sobrenome=$linha['sobrenome'];
       echo $this->email=$linha['email'];
       echo $this->dataNascimento=$linha['dataNascimento'];
       echo  $this->dataCadastramento=$linha['dataCadastramento'];
       echo  $this->biografia=$linha['biografia'];
       echo  $this->idtipousuario=$linha['idtipousuario'];
        }
        
        }
        public function ListarUsuario($nome){
    
            $resultado=$this->conexao->query("select * from usuarios where nome=".$nome);
            
            while($linha=$resultado->fetch(\PDO::FETCH_ASSOC)){
            
        
           echo $this->idusuario=$linha['idusuario'];
           echo $this->nome=$linha['nome'];
           echo $this->sobrenome=$linha['sobrenome'];
           echo $this->email=$linha['email'];
           echo $this->dataNascimento=$linha['dataNascimento'];
           echo  $this->dataCadastramento=$linha['dataCadastramento'];
           echo  $this->biografia=$linha['biografia'];
           echo  $this->idtipousuario=$linha['idtipousuario'];
            }
            
            }
        
    public function VerificarLoginSenha($login,$senha){
        $this->efetivar = $this->conexao->prepare("SELECT email, senha FROM usuarios WHERE cl_email = :login AND senha = :senha");
        $this->efetivar->bindValue(":login", $login);
        $this->efetivar->bindValue(":senha", $senha);
        $this->efetivar->execute();
        return $this->efetivar->rowCount();
    
    }
    
    public function InserirUsuario($nome, $sobrenome,$email,$dataNascimento,$login,$senha,$dataCadastramento,$biografia,$idtipousuario){
    
    $this->nome=$nome;
    $this->sobrenome=$sobrenome;
    $this->email=$email;
    $this->dataNascimento=$dataNascimento;
    $this->login=$login;
    $this->senha=$senha;
    $this->dataCadastramento=$dataCadastramento;
    $this->biografia=$biografia;
    $this->idtipousuario=$idtipousuario;
    $this->efetivar=$this->conexao->prepare("INSERT INTO usuarios (idusuario, nome, sobrenome, email, dataNascimento, login, senha, dataCadastramento, biografia, idtipousuario) VALUES (:nome, :sobrenome, :email, :dataNascimento, :login, :senha, :dataCadastramento, :biografia, :idtipousuario)");
    $this->efetivar->bindValue(":nome",$this->nome);
    $this->efetivar->bindValue(":sobrenome",$this->sobrenome);
    $this->efetivar->bindValue(":email",$this->email);
    $this->efetivar->bindValue(":dataNascimento",$this->dataNascimento);
    $this->efetivar->bindValue(":login",$this->login);
    $this->efetivar->bindValue(":senha",$this->senha);
    $this->efetivar->bindValue(":dataCadastramento",$this->dataCadastramento);
    $this->efetivar->bindValue(":biografia",$this->biografia);
    $this->efetivar->bindValue(":idtipousuario",$this->idtipousuario);
    $this->efetivar->execute();
    
    }
    
    public function AlterarUsuario($idusuario,$nome, $sobrenome,$email,$dataNascimento,$login,$senha,$dataCadastramento,$biografia,$idtipousuario){
        $this->idusuario=$idusuario;
        $this->nome=$nome;
        $this->sobrenome=$sobrenome;
        $this->email=$email;
        $this->dataNascimento=$dataNascimento;
        $this->login=$login;
        $this->senha=$senha;
        $this->dataCadastramento=$dataCadastramento;
        $this->biografia=$biografia;
        $this->idtipousuario=$idtipousuario;
        $this->efetivar=$this->conexao->prepare("update usuario set nome=:nome, sobrenome=:sobrenome, email=:email, dataNascimento=:dataNascimento, login=:login, senha=:senha, dataCadastramento=:dataCadastramento, biografia=:biografia, idtipousuario=:idtipousuario where idusuario=:idusuario");
        $this->efetivar->bindValue(":idusuario",$this->idusuario);
        $this->efetivar->bindValue(":nome",$this->nome);
        $this->efetivar->bindValue(":sobrenome",$this->sobrenome);
        $this->efetivar->bindValue(":email",$this->email);
        $this->efetivar->bindValue(":dataNascimento",$this->dataNascimento);
        $this->efetivar->bindValue(":login",$this->login);
        $this->efetivar->bindValue(":senha",$this->senha);
        $this->efetivar->bindValue(":dataCadastramento",$this->dataCadastramento);
        $this->efetivar->bindValue(":biografia",$this->biografia);
        $this->efetivar->bindValue(":idtipousuario",$this->idtipousuario);
        $this->efetivar->execute();
        
    }
    
    public function ExcluirUsuario($idusuario){
    
        $this->idusuario=$idusuario;
        $this->efetivar=$this->conexao->prepare("delete from  usuarios where idusuario=?");
        $this->efetivar->bindValue(1,$this->idusuario);
        $this->efetivar->execute();
    
    }
    
    }

}


?>