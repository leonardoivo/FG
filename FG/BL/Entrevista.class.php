<?php
namespace FG\BL{
use FG\BL\TextoJornalistico;
use FG\DAL\CrudTextoJornalistico;
    use FG\DTO\TextoJornalisticoDTO;

//require_once("TextoJornalistico.class.php");

class Entrevista extends TextoJornalistico{
private $entrevistado;
private $perguntaEntrevista;
private $bioEntrevistado;
private $entrevistador;
private $tema;
private $respostaEntrevistado;
private $DescricaoEntrevista;
private $dataentrevista;

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

public function CriarEntrevista($tema,$entrevistado,$bioEntrevistado){
 
  $entrevistaDT = new TextoJornalisticoDTO();
  $entrevistaDT->titulo=$this->tema;
  $entrevistaDT->autor=$this->entrevistador;
  $entrevistaDT->datapublicacao=$this->dataentrevista;
  $entrevistaDT->texto=$this->DescricaoEntrevista.$this->entrevistado.$this->bioEntrevistado.$this->respostaEntrevistado;
  $this->CriarTexto($entrevistaDT);


}

public function ListarEntrevistas(){
  $this->tipotexto=3;
  $this->ListarTextos($this->tipotexto);

}

}
}
?>
