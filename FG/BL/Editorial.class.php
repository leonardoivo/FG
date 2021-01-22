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
     
       
         
     
        }
     
     
     
     
     }
}


?>