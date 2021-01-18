<?php
namespace FG\BL{
   use FG\BL\TextoJornalistico;
   use FG\DAL\CrudTextoJornalistico;
   
   class Editorial extends TextoJornalistico{
      $gravarTexto = new CrudTextoJornalistico();
      public function setTextoEditorial($textoEditorial){
         
         $this->texto=$textoEditorial;
     
     
      }
     
      public function setTituloEditorial($tituloEditorial){
     
         $this->$titulo=$tituloEditorial;
      }
      public function CriarEditorial($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao){
       $this->tipotexto=3;
       $this->titulo=$textoeditorial;
     
     
       $campos = array( "texto"=>$this->titulo, "datapublicacao"=>$data_publicacao, "idusuario"=>"4", "autor"=>"5", "id_secao"=>"6", "idcoluna"=>"7", "idtipotexto"=>"8", "titulo"=>$tituloEditorial, "subtitulo"=>$subtitulo);
     
       $gravarTexto->Criar($campos);
     
      }
         
        public function Alterar($textoeditorial,$tituloEditorial,$subtitulo,$data_publicacao,$idtextojor){
     
           $this->tipotexto=3;
           $this->titulo=$textoeditorial;
         
         
           $campos = array( "texto"=>$this->titulo, "datapublicacao"=>$data_publicacao, "idusuario"=>"4", "autor"=>"5", "id_secao"=>"6", "idcoluna"=>"7", "titulo"=>$tituloEditorial, "subtitulo"=>$subtitulo);
       
           $gravarTexto->Alterar($this->tipotexto,$campos,$idtextojor);
         
     
        }
     
     
     
     
     }
}


?>