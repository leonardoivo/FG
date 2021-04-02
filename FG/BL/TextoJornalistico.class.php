<?php
namespace FG\BL{
   use FG\DAL\CrudTextoJornalistico;
   use FG\DTO\TextoJornalisticoDTO;
   use FG\LO\TextoJornalisticoLO;
class TextoJornalistico{
      
protected $titulo;
protected $subtitulo;
protected $texto;
protected $dataTexto;
protected $autor;
protected $tipotexto;
private $textoJor;    
public function setTitulo($t){

   $this->titulo=$t;

 }

public function GetTitulo(){
 return $this->titulo;
}

public function setTexto($text){

 $this->texto=$text;
   
 }
   
 public function  GetTexto(){
   return $this->titulo;
              
   
  }

 public function __construct()
{
   $textoJor = new CrudTextoJornalistico();
   $arguments = func_get_args();
   $numberOfArguments = func_num_args();
           
    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
          call_user_func_array(array($this, $function), $arguments);
      }
 }
 
  public function CriarTexto(TextoJornalisticoDTO $texto){
 
  $this->textoJor->GravarTexto($texto);

   }
public function Criar()
{
 
  $this->textoJor->GravarTexto($this->texto);
}

public function ListarGeral(){
  
   $listTexto = new TextoJornalisticoLO();
   $listTexto= $this->textoJor->listar();
   return  $listTexto;
}
public function ListarTextos($tipotexto){
   
    $listTexto = new TextoJornalisticoLO();
    $listTexto= $this->textoJor->listarTipoTexto($tipotexto);
    return  $listTexto;
 }

 public function AlterarTextoJor(TextoJornalisticoDTO $texto,$idtextojor){
   
    $this->textoJor->AlterarTexto($texto,$idtextojor);

}

 public function ExcluirTexto($idtextojor,$tipotexto){
     
      $this->textoJor->excluir($tipotexto,$idtextojor);
   }

    }
}
?>