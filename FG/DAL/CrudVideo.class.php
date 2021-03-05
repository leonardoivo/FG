<?php
use FG\DAL\Crud;
use \PDO;
namespace FG\DAL{
class CrudVideo{
    private $conexao;
    private $efetivar;


 public function __construct()
 {
    $this->conexao = new Crud();
 }
 public function listarVideos(){}
 public function listarVideoPorId()
 {
     # code...
 }
 public function Gravar(){}
 public function Alterar(){}
 public function Excluir(){}


}
}
?>