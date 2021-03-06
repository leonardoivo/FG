<?php
namespace FG\BL{
use FG\BL\TextoJornalistico;
use FG\DAL\CrudTextoJornalistico;
  //require_once("TextoJornalistico.class.php");

class Entrevista extends TextoJornalistico{
private $entrevistado;
private $perguntaEntrevista;
private $bioEntrevistado;
private $assunto;


public function SetEntrevistado($entrevistado){

    $this->entrevistado=$entrevistado;
}

public function SetperguntaEntrevista($perguntaEntrevista){

    $this->perguntaEntrevista=$perguntaEntrevista;
}

public function SetbioEntrevistado($bioEntrevistado){

    $this->bioEntrevistado=$bioEntrevistado;
}

public function GetEntrevistado(){




  return $this->entrevistado;


}
public function GetPerguntaEntrevista(){


    return $this->perguntaEntrevista;
  
  
  }
  public function GetBioEntrevistado(){


    return $this->bioEntrevistado;
  
  
  }



public function ___construct(){}

public function CriarEntrevista($assunto,$entrevistado,$bioEntrevistado){
$insercao = array();
$insercao['inserir']="insert into";
$insercao['tabela']="entrevista";

  $inclusao = new CrudTextoJornalistico();

$inclusao->Criar($insercao);


    



}

public function ListarEntrevistas(){
 $consulta= new CrudTextoJornalistico();
 
  $query=array();
  $query["operacao"]="select";
  $query["campos-retorno"]="*";
  $query["em"]="from";
  $query["tabela"]="entrevista";

$resultado  = $consulta->listar($query);


}

}
}
?>
