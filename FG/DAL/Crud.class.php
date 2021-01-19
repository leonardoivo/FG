<?php
namespace FG\DAL;
use \PDO;

 class Crud extends PDO{

  public      $TipoDatabase='mysql';
  protected   $EnderecoDB='localhost';
  protected     $banco='FatosGerais';
  protected    $usuariodb='root';
  protected   $senhadb='784512';
  protected   $tabela="";
  //protected   $conexao;

  public function __construct()
  {
         try
         {
          parent::__construct($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);
 
         }
         catch(\PDOException $e)
         {
         echo $e->getMessage();
 
         }
  }
//  public function conectar(){

// $this->conexao= new PDO($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);

//  }

}
?>