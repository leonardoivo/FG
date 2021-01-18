<?php
 class Crud extends PDO{

  public      $TipoDatabase='mysql';
  private     $EnderecoDB='localhost';
  private     $banco='FatosGerais';
  private     $usuariodb='root';
  private     $senhadb='784512';
  protected   $tabela="";
  //protected   $conexao;

 public function __construct()
 {
        try
        {
          parent::__construct($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);

        }
        catch(PDOException $e)
        {
        echo $e->getMessage();

        }
 }
//  public function conectar(){

// $this->conexao= new PDO($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);

//  }

}
?>