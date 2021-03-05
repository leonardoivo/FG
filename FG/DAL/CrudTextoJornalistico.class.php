<?php
namespace FG\DAL{
   use FG\DAL\Crud;
   use FG\LO\TextoJornalisticoLO;
   use FG\DTO\TextoJornalisticoDTO;
   use \PDO;

   class CrudTextoJornalistico extends Crud{
      private $conexao;
      private $efetivar;


   public function __construct()
   {
      $this->conexao = new Crud();
   }



      public function listarTipoTexto($tipotexto){
         
         $resultado = $this->conexao->query("select * from TextoJornalistico where idtipotexto in({$tipotexto})");

         // $resultado = $this->conexao->prepare("select * from TextoJornalistico where idtipotexto=".$tipotexto);
         
          //  $resultado->execute();
         //  $linha= $resultado->fetchALL(\PDO::FETCH_OBJ); 
          $textoJornalistico = new TextoJornalisticoLO();
          while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){

           $textoJornalisticoDT= new TextoJornalisticoDTO();
           $textoJornalisticoDT->idtextojor=$linha['idtextojor'];
           $textoJornalisticoDT->texto=$linha['texto'];
           $textoJornalisticoDT->datapublicacao=$linha['datapublicacao'];
           $textoJornalisticoDT->idusuario=$linha['idusuario'];
           $textoJornalisticoDT->autor=$linha['autor'];
           $textoJornalisticoDT->id_secao=$linha['id_secao'];
           $textoJornalisticoDT->idcoluna=$linha['idcoluna'];
           $textoJornalisticoDT->idtipotexto=$linha['idtipotexto'];
           $textoJornalisticoDT->titulo=$linha['titulo'];
           $textoJornalisticoDT->subtitulo=$linha['subtitulo'];
           $textoJornalistico->add($textoJornalisticoDT);
            }
        
        return $textoJornalistico;
        }
        public function listar(){
         
         $resultado = $this->conexao->query("select * from TextoJornalistico");

         // $resultado = $this->conexao->prepare("select * from TextoJornalistico where idtipotexto=".$tipotexto);
         
          //  $resultado->execute();
         //  $linha= $resultado->fetchALL(\PDO::FETCH_OBJ); 
          $textoJornalistico = new TextoJornalisticoLO();
          while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){

           $textoJornalisticoDT= new TextoJornalisticoDTO();
           $textoJornalisticoDT->idtextojor=$linha['idtextojor'];
           $textoJornalisticoDT->texto=$linha['texto'];
           $textoJornalisticoDT->datapublicacao=$linha['datapublicacao'];
           $textoJornalisticoDT->idusuario=$linha['idusuario'];
           $textoJornalisticoDT->autor=$linha['autor'];
           $textoJornalisticoDT->id_secao=$linha['id_secao'];
           $textoJornalisticoDT->idcoluna=$linha['idcoluna'];
           $textoJornalisticoDT->idtipotexto=$linha['idtipotexto'];
           $textoJornalisticoDT->titulo=$linha['titulo'];
           $textoJornalisticoDT->subtitulo=$linha['subtitulo'];
           $textoJornalistico->add($textoJornalisticoDT);
            }
        
        return $textoJornalistico;
        }


        
        public function listarPorBusca($tipotexto,$parametrosBusca){
        //  $resultado = array();
         

        
          // $this->tabela= "select * from TextoJornalistico where idtipotexto=? and texto=?";  
         //   $this->conexao->prepare($this->tabela);
         //   $this->conexao->bindValue(1,$tipotexto);
         //   $this->conexao->bindValue(2,$parametrosBusca);
         //   $this->conexao->execute();
          $resultado= $this->conexao->query("select * from TextoJornalistico where idtipotexto={$tipotexto} and texto={$parametrosBusca}");
          $textoJornalistico = new TextoJornalisticoLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
           
              $textoJornalisticoDT= new TextoJornalisticoDTO();
              $textoJornalisticoDT->idtextojor=$linha['idtextojor'];
              $textoJornalisticoDT->texto=$linha['texto'];
              $textoJornalisticoDT->datapublicacao=$linha['datapublicacao'];
              $textoJornalisticoDT->idusuario=$linha['idusuario'];
              $textoJornalisticoDT->autor=$linha['autor'];
              $textoJornalisticoDT->id_secao=$linha['id_secao'];
              $textoJornalisticoDT->idcoluna=$linha['idcoluna'];
              $textoJornalisticoDT->idtipotexto=$linha['idtipotexto'];
              $textoJornalisticoDT->titulo=$linha['titulo'];
              $textoJornalisticoDT->subtitulo=$linha['subtitulo'];
              $textoJornalistico->add($textoJornalisticoDT);
           }
         
           return $textoJornalistico;
           }
        
        public function GravarTexto(TextoJornalisticoDTO $texto){
         $this->efetivar=$this->conexao->prepare("INSERT INTO textojornalistico( texto, datapublicacao, idusuario, autor, id_secao, idcoluna, idtipotexto, titulo, subtitulo) VALUES ( :texto, :datapublicacao, :idusuario, :autor, :id_secao, :idcoluna, :idtipotexto, :titulo, :subtitulo)");

         $this->efetivar->bindParam("texto", $texto->texto);
         $this->efetivar->bindParam("datapublicacao", $texto->datapublicacao);
         $this->efetivar->bindParam("idusuario", $texto->idusuario);
         $this->efetivar->bindParam("autor", $texto->autor);
         $this->efetivar->bindParam("id_secao", $texto->id_secao);
         $this->efetivar->bindParam("idcoluna", $texto->idcoluna);
         $this->efetivar->bindParam("idtipotexto", $texto->idtipotexto);
         $this->efetivar->bindParam("titulo", $texto->titulo);
         $this->efetivar->bindParam("subtitulo", $texto->subtitulo);

         $this->efetivar->execute();
           //echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
                     //print_r($arr);

        }

        public function AlterarTexto(TextoJornalisticoDTO $texto, $idtextojor){
         $this->efetivar=$this->conexao->prepare("UPDATE textojornalistico SET texto=:texto,datapublicacao=:datapublicacao,idusuario=:idusuario,autor=:autor,id_secao=:id_secao,idcoluna=:idcoluna,idtipotexto=:idtipotexto,titulo=:titulo,subtitulo=:subtitulo WHERE idtextojor=:idtextojor");
         $this->efetivar->bindParam("idtextojor", $idtextojor); 
         $this->efetivar->bindParam("texto", $texto->texto);
         $this->efetivar->bindParam("datapublicacao", $texto->datapublicacao);
         $this->efetivar->bindParam("idusuario", $texto->idusuario);
         $this->efetivar->bindParam("autor", $texto->autor);
         $this->efetivar->bindParam("id_secao", $texto->id_secao);
         $this->efetivar->bindParam("idcoluna", $texto->idcoluna);
         $this->efetivar->bindParam("idtipotexto", $texto->idtipotexto);
         $this->efetivar->bindParam("titulo", $texto->titulo);
         $this->efetivar->bindParam("subtitulo", $texto->subtitulo);
         $this->efetivar->execute();
           //echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
                     //print_r($arr);

        }

        public function excluir($tipotexto,$idtextojor){
        
         $this->tabela= "delete from TextoJornalistico where idtextojor= ? and idtipotexto=?";  
         $this->efetivar=$this->conexao->prepare($this->tabela);
         $this->efetivar->bindValue(1,$idtextojor); 
         $this->efetivar->bindValue(2,$tipotexto);
         $this->efetivar->execute();   
         }       

        
           
        
  }

}


?>