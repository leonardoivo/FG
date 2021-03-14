<?php
namespace FG\DAL{
use FG\DAL\Crud;
use FG\DTO\ImagensDTO;
use FG\LO\ImagensLO;
use \PDO;
class CrudImagem{
    private $conexao;
    private $efetivar;


 public function __construct()
 {
    $this->conexao = new Crud();
 }

 public function listarImagens(){
    $resultado= $this->conexao->query("select * from");
    $LsImagens = new ImagensLO();
    while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
        $imagemDT = new ImagensDTO();
        $imagemDT->id_imagem=$linha['id_imagem'];
        $imagemDT->nome_imagem=$linha['nome_imagem'];
        $imagemDT->tipo_imagem=$linha['tipo_imagem'];
        $imagemDT->descricao=$linha['descricao'];
        $imagemDT->autor=$linha['autor'];
        $imagemDT->formato=$linha['formato'];
        $imagemDT->id_acervo=$linha['id_acervo'];
        $imagemDT->data_de_inclusao=$linha['data_de_inclusao'];

       $LsImagens->add($imagemDT);

   return $LsImagens;


 }
  public function listarImagemPorId($id_imagem)
 {
    $resultado= $this->conexao->query("select * from where id_imagem");
    $LsImagens = new ImagensLO();
    while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
        $imagemDT = new ImagensDTO();
        $imagemDT->id_imagem=$linha['id_imagem'];
        $imagemDT->nome_imagem=$linha['nome_imagem'];
        $imagemDT->tipo_imagem=$linha['tipo_imagem'];
        $imagemDT->descricao=$linha['descricao'];
        $imagemDT->autor=$linha['autor'];
        $imagemDT->formato=$linha['formato'];
        $imagemDT->id_acervo=$linha['id_acervo'];
        $imagemDT->data_de_inclusao=$linha['data_de_inclusao'];

       $LsImagens->add($imagemDT);
    }


   return $LsImagens; 
}
 public function Gravar(ImagensDTO $imagemDT){
   $this->efetivar=$this->conexao->prepare("");
   $this->efetivar->bindParam("nome_imagem",$imagemDT->nome_imagem);
   $this->efetivar->bindParam("tipo_imagem",$imagemDT->tipo_imagem);
   $this->efetivar->bindParam("descricao",$imagemDT->descricao);
   $this->efetivar->bindParam("autor",$imagemDT->autor);
   $this->efetivar->bindParam("formato",$imagemDT->formato);
   $this->efetivar->bindParam("id_acervo",$imagemDT->id_acervo);
   $this->efetivar->bindParam("data_de_inclusao",$imagemDT->data_de_inclusao);
   $this->efetivar->execute();
   //echo "\nPDOStatement::errorInfo():\n";
 $arr = $this->efetivar->errorInfo();
 //print_r($arr);
 }
 public function Alterar($id_imagem,ImagensDTO $imagemDT){
   $this->efetivar=$this->conexao->prepare("");
   $this->efetivar->bindParam("id_imagem",$imagemDT->$id_imagem);
   $this->efetivar->bindParam("nome_imagem",$imagemDT->nome_imagem);
   $this->efetivar->bindParam("tipo_imagem",$imagemDT->tipo_imagem);
   $this->efetivar->bindParam("descricao",$imagemDT->descricao);
   $this->efetivar->bindParam("autor",$imagemDT->autor);
   $this->efetivar->bindParam("formato",$imagemDT->formato);
   $this->efetivar->bindParam("id_acervo",$imagemDT->id_acervo);
   $this->efetivar->bindParam("data_de_inclusao",$imagemDT->data_de_inclusao);
   $this->efetivar->execute();
//echo "\nPDOStatement::errorInfo():\n";
$arr = $this->efetivar->errorInfo();
//print_r($arr);
 }
 public function Excluir($id_imagem){
   $this->tabela= "delete from audios where id_imagem= ? ";  
   $this->efetivar=$this->conexao->prepare($this->tabela);
   $this->efetivar->bindParam("id_imagem",$id_imagem);
   $this->efetivar->execute();

 }

}
}
?>