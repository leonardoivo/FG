<?php
namespace FG\DTO {
    class AcervoDTO {
        public $idAcervo;
        public $nome_acervo;
        public $idtextojor;
        public $Descricao;
        public $DataCriacao;
    
        public function setIdAcervo($idAcervo){
            $this->idAcervo=$idAcervo;
        }
        public function getIdAcervo(){
    
            return $this->idAcervo;
        }
        public function setNome_acervo($nome_acervo){
            $this->nome_acervo=$nome_acervo;
        }
        public function getNome_acervo(){
    
            return $this->nome_acervo;
        }
        public function setIdtextojor($idtextojor){
            $this->idtextojor=$idtextojor;
        }
        public function getIdtextojor(){
    
            return $this->idtextojor;
        }
        public function setDescricao($Descricao){
            $this->Descricao=$Descricao;
        }
        public function getDescricao(){
    
            return $this->Descricao;
        }
        public function setDataCriacao($DataCriacao){
            $this->DataCriacao=$DataCriacao;
        }
        public function getDataCriacao(){
    
            return $this->DataCriacao;
        }
    }
}


?>