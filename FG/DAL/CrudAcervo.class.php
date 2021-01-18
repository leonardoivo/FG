<?php
namespace FG\DAL{
    use FG\DAL\Crud;
    class CrudAcervo extends Crud{
        protected $id_acervo;
        private   $nome_acervo;
        public    $id_textojor;
        private   $Descricao;
        private   $DataDeCriacao;
        protected $conexao;
        protected $efetivar;
        
        public function __construct()
        {
            $this->conexao = new Crud();
        
        }
        
        public function ListarAcervo(){
        
            $resultado=$this->conexao->query("select * from acervo");
            
            while($linha=$resultado->fetch(\PDO::FETCH_ASSOC)){
            
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
                $this->efetivar=$this->conexao->prepare("insert into acervo (nome_acervo,id_textojor,Descricao,DataDeCriacao) values (?,?,?,?)");
                $this->efetivar->bindValue(1,$this->nome_acervo);  
                $this->efetivar->bindValue(2,$this->id_textojor);   
                $this->efetivar->bindValue(3,$this->Descricao);  
                $this->efetivar->bindValue(4,$this->DataDeCriacao);  
                $this->efetivar->execute();
           
            }
            
            public function AlterarAcervo($nomeAcervo,$Descricao,$id_acervo){
                $this->nome_acervo=$nomeAcervo;
                $this->id_acervo=$id_acervo;
                $this->Descricao=$Descricao;
                $this->efetivar=$this->conexao->prepare("update acervo set nome_acervo=:nome_acervo,Descricao:Descricao where id_acervo=?");
                $this->efetivar->bindValue("nome_acervo",$this->nome_acervo);
                $this->efetivar->bindValue("Descricao",$this->Descricao);
                $this->efetivar->bindValue("id_acervo",$this->id_acervo);
                $this->efetivar->bindValue(2,$this->id_secao);
                $this->efetivar->execute();
            
            }
            
            public function ExcluirAcervo($id_acervo){
            
                $this->id_acervo=$id_acervo;
                $this->efetivar=$this->conexao->prepare("delete from  acervo where id_acervo=?");
                $this->efetivar->bindValue(1,$this->id_acervo);
                $this->efetivar->execute();
            
            
            }
        
        
        
        
        }
}


?>