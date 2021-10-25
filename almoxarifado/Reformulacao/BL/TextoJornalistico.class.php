<?php
namespace FG\BL{
   use FG\DAL\CrudTextoJornalistico;
    class TextoJornalistico{
      
        var $titulo;
        var $subtitulo;
        var $texto;
        var $dataTexto;
        Var $autor;
        var $tipotexto;
    
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

           public function ___construct(){}

            public function CriarTexto(){}
           

    }
}
?>