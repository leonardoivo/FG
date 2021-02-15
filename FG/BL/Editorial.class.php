<?php
namespace FG\BL{
   use FG\BL\TextoJornalistico;
   use FG\DAL\CrudTextoJornalistico;
   use FG\DTO\TextoJornalisticoDTO;
   use FG\DTO\SecoesDTO;
   use FG\DTO\TipotextoDTO;
   use FG\LO\TextoJornalisticoLO;
   class Editorial extends TextoJornalistico{
     private  $textoEditorial;
     private  $tituloEditorial;

     public function __construct()
{
    $arguments = func_get_args();
    $numberOfArguments = func_num_args();

    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
        call_user_func_array(array($this, $function), $arguments);
    }
}


      public function setTextoEditorial($textoEditorial){
         
         $this->texto=$textoEditorial;
     
     
      }
      



    
      public function CriarEditorial($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao){
         $editorialDT = new TextoJornalisticoDTO();
         $editorialDT= $this->tipotexto=3;
         $editorialDT=  $this->titulo=$this->tituloEditorial;
         $editorialDT =$this->texto=$this->textoeditorial;
         $this->CriarTexto($editorialDT);

      }
         
        public function Alterar($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao,$idtextojor){
         $editorialDT = new TextoJornalisticoDTO();
         $editorialDT= $this->tipotexto=3;
         $editorialDT=  $this->titulo=$this->tituloEditorial;
         $editorialDT =$this->texto=$this->textoeditorial;
         $this->AlterarTextoJor($editorialDT,$idtextojor);
       
         
     
        }
     
        public function Excluir($idtextojor, $tipotexto){
        $this->excluir($tipotexto,$idtextojor);

        }
     
     
     }
}


?>