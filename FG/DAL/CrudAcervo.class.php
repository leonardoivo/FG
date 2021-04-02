<?php
namespace FG\DAL{
    use FG\DAL\Crud;
    use FG\DTO\AcervoDTO;

class CrudAcervo extends Crud{
        
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
            public function ListarAcervoPorID($id_acervo){
        
                $resultado=$this->conexao->query("select * from acervo where id_acervo={$id_acervo}");
                
                while($linha=$resultado->fetch(\PDO::FETCH_ASSOC)){
                
                $this->id_acervo=$linha['id_acervo'];
                $this->nome_acervo=$linha['nome_acervo'];
                $this->id_textojor=$linha['id_textojor'];
                $this->Descricao=$linha['Descricao'];
                $this->iDataDeCriacao=$linha['DataDeCriacao'];
                }
                
                }
            public function CriarAcervo(AcervoDTO $acervoDT){
               
                
                $this->efetivar=$this->conexao->prepare("insert into acervo (nome_acervo,id_textojor,Descricao,DataDeCriacao) values (?,?,?,?)");
                $this->efetivar->bindParam("nome_acervo",$acervoDT->nome_acervo);  
                $this->efetivar->bindParam("id_textojor",$acervoDT->id_textojor);   
                $this->efetivar->bindParam("Descricao",$acervoDT->Descricao);  
                $this->efetivar->bindParam("DataDeCriacao",$acervoDT->DataDeCriacao);  
                $this->efetivar->execute();
           
            }
            
            public function AlterarAcervo(AcervoDTO $acervoDT,$id_acervo){
              
                $this->efetivar=$this->conexao->prepare("update acervo set nome_acervo=:nome_acervo,Descricao:Descricao where id_acervo=?");
                $this->efetivar->bindParam("nome_acervo",$acervoDT->nome_acervo);
                $this->efetivar->bindParam("Descricao",$acervoDT->Descricao);
                $this->efetivar->bindParam("id_acervo",$acervoDT->id_acervo);
                $this->efetivar->bindParam(2,$acervoDT->id_secao);
                $this->efetivar->execute();
            
            }
            
            public function ExcluirAcervo($id_acervo){
            
                
                $this->efetivar=$this->conexao->prepare("delete from  acervo where id_acervo=?");
                $this->efetivar->bindParam("id_acervo",$id_acervo);
                $this->efetivar->execute();
            
            
            }
        
        
        
        
        }
}


?>