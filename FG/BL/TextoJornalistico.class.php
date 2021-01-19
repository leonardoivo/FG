<?php
namespace FG\BL{
   use FG\DAL\CrudTextoJornalistico;
   use FG\DTO\TextoJornalisticoDTO;
   use FG\LO\TextoJornalisticoLO;
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

            public function CriarTexto(TextoJornalisticoDTO $texto){
            $textojornalistico = new CrudTextoJornalistico();
            $textojornalistico->GravarTexto($texto);



            }
       public function Criar()
              {
               $textojornalistico = new CrudTextoJornalistico();
               $textojornalistico->GravarTexto($this->texto);
               }

         public function ListarTextos(){
          $textojornalistico = new CrudTextoJornalistico();
          $listTexto = new TextoJornalisticoLO();
          $listTexto= $textojornalistico->listar();
          return  $listTexto;
         }
           

    }
}
?>