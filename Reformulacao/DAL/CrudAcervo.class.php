<?php


class CrudAcervo extends Crud{
protected $id_acervo;
private   $nome_acervo;
public    $id_textojor;
private   $Descricao;
private   $DataDeCriacao;

public function __construct()
{
       $this->conectar();

}

public function ListarAcervo(){

    $resultado=$this->conexao->query("select * from acervo");
    
    while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
    
    $this->id_acervo=$linha['id_acervo'];
    $this->nome_acervo=$linha['nome_acervo'];
    $this->id_textojor=$linha['id_textojor'];
    $this->Descricao=$linha['Descricao'];
    $this->iDataDeCriacao=$linha['DataDeCriacao'];
    }
    
    }
    
    public function CriarAcervo($nomeAcervo,$descricao,$DataCriacao,$id_textojor){
       
        $this->nome_acervo=$nomeAcervo;
        $this->id_textojor=$id_textojor;
        $this->DataDeCriacao=$DataCriacao;
        $this->Descricao=$descricao;
        $this->conexao->prepare("insert into acervo (nome_acervo,id_textojor,Descricao,DataDeCriacao) values (?,?,?,?)");
        $this->conexao->bindValue(1,$this->nome_acervo);  
        $this->conexao->bindValue(2,$this->id_textojor);   
        $this->conexao->bindValue(3,$this->Descricao);  
        $this->conexao->bindValue(4,$this->DataDeCriacao);  
        $this->conexao->execute();
   
    }
    
    public function AlterarAcervo($nomeAcervo,$Descricao,$id_acervo){
        $this->nome_acervo=$nomeAcervo;
        $this->id_acervo=$id_acervo;
        $this->Descricao=$Descricao;
        $this->conexao->prepare("update acervo set nome_acervo=:nome_acervo,Descricao:Descricao where id_acervo=?");
        $this->conexao->bindValue("nome_acervo",$this->nome_acervo);
        $this->conexao->bindValue("Descricao",$this->Descricao);
        $this->conexao->bindValue("id_acervo",$this->id_acervo);
        $this->conexao->bindValue(2,$this->id_secao);
        $this->conexao->execute();
    
    }
    
    public function ExcluirAcervo($id_acervo){
    
        $this->id_acervo=$id_acervo;
        $this->conexao->prepare("delete from  acervo where id_acervo=?");
        $this->conexao->bindValue(1,$this->id_acervo);
        $this->conexao->execute();
    
    
    }




}
?>