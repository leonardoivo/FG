<?php
namespace FG\BL{
   use FG\BL\TextoJornalistico;
   use FG\DAL\CrudTextoJornalistico;
   use FG\DTO\TextoJornalisticoDTO;
   use FG\DTO\SecoesDTO;
   use FG\DTO\TipotextoDTO;
   use FG\LO\TextoJornalisticoLO;
   class Editorial extends TextoJornalistico{
      public function setTextoEditorial($textoEditorial){
         
         $this->texto=$textoEditorial;
     
     
      }
    }
      public function CriarEditorial($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao){
       $this->tipotexto=3;
       $this->titulo=$textoeditorial;
     
   
      }
         
        public function Alterar($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao,$idtextojor){
     
       
         
     
        }
     
     
     
     
     }
}


?>