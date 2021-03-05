<?php
use FG\DAL\Crud;
use \PDO;
namespace FG\DAL{
class CrudImagem{
    private $conexao;
    private $efetivar;


 public function __construct()
 {
    $this->conexao = new Crud();
 }

 public function listarImagens(){}
 public function listarImagemPorId()
 {
     # code...
 }
 public function Gravar(){}
 public function Alterar(){}
 public function Excluir(){}

}
}
?>