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
   $arguments = func_get_args();
   $numberOfArguments = func_num_args();
           
    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
          call_user_func_array(array($this, $function), $arguments);
      }
 }
 
  public function CriarTexto(TextoJornalisticoDTO $texto){
  $textojornalistico = new CrudTextoJornalistico();
  $textojornalistico->GravarTexto($texto);

   }
public function Criar()
{
  $textojornalistico = new CrudTextoJornalistico();
  $textojornalistico->GravarTexto($this->texto);
}

public function ListarTextos($tipotexto){
    $textojornalistico = new CrudTextoJornalistico();
    $listTexto = new TextoJornalisticoLO();
    $listTexto= $textojornalistico->listarTipoTexto($tipotexto);
    return  $listTexto;
 }

 public function AlterarTextoJor(TextoJornalisticoDTO $texto,$idtextojor){
    $textojornalistico = new CrudTextoJornalistico();
    $textojornalistico->AlterarTexto($texto,$idtextojor);

}

 public function ExcluirTexto($idtextojor,$tipotexto){
      $textojornalistico = new CrudTextoJornalistico();
      $textojornalistico->excluir($tipotexto,$idtextojor);
   }

    }
}
?>