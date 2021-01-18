<?php
 class Crud{

  public   $TipoDatabase='mysql';
  private  $EnderecoDB='localhost';
  private  $banco='FatosGerais';
  private  $usuariodb='root';
  private  $senhadb='784512';
  private  $tabela="";
  private  $conexao;

 public function __construct()
 {
        $this->conectar();

 }
 private function conectar(){

$this->conexao= new PDO($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);

 }


public function listar2($tipotexto){

  $resultado = $this->conexao->prepare("select * from TextoJornalistico where idtipotexto=".$tipotexto);
  $resultado->execute();
  $linha= $resultado->fetchALL(PDO::FETCH_OBJ); 

    foreach($linha as $listar){
   



    }


   // $this->tabela="select * from TextoJornalistico where idtipotexto=".$tipotexto ;

   // $resultado=$this->conexao->query($this->tabela);
   
   
   // return $resultado;
   



}

public function listarPorBusca($tipotexto,$parametrosBusca){
  $resultado = array();


   $this->tabela= "select * from TextoJornalistico where idtipotexto=? and texto=?";  
   $this->conexao->prepare($this->tabela);
   $this->conexao->bindValue(1,$tipotexto);
   $this->conexao->bindValue(2,$parametrosBusca);
   $this->conexao->execute();
   while($linha=$this->conexao->fetch()){
      $resultado = array("texto"=>$linha[1],"idjor"=>$linha[2]);





   }
   

   return $resultado;
   }



   public function Alterar($tipotexto,$campos,$idtextojor){
      
      $cabecalhoUpdate=" update  TextoJornalistico set ";
         
      foreach($campos as $key=>$value)
      {
         $cabecalhoUpdate.= $key."=:".$key.',';

      }
      
      $totalcb=strlen($cabecalhoUpdate);
      $cabecalho=substr($cabecalhoUpdate,0,$totalcb-1);
      $this->tabela=$cabecalho." where idtextojor=? and idtipotexto=?";
      $this->conexao->prepare($this->tabela);
      foreach($campos as $key=>$value)
      {
         $this->conexao->bindValue($key,$campos[$key]);
         
      }
     
      $this->conexao->execute();
      
      }
      




public function Criar($campos){
    
   $cabecalhoinsert="insert into TextoJornalistico (";
   $valores= "values (";
   

    foreach($campos as $key=>$value)
     {
         $cabecalhoinsert.= $key.",";
     }

    $totalcb=strlen($cabecalhoinsert);
    $cabecalho=substr($cabecalhoinsert,0,$totalcb-1);
    $cabecalho.=")";

    foreach($campos as $key=>$value)
   {
      $valores .= ':'.$key.',';
   }
   $totalIn=strlen($valores);
   $entradas=substr($valores,0,$totalIn-1);
   $entradas.=")";
   $this->tabela= $cabecalho.$entradas;    
   $this->conexao->prepare($this->tabela);

   foreach($campos as $key=>$value)
   {
      
      $this->conexao->bindValue($key,$campos[$key]);

   }

    $this->conexao->execute();
         
         }

         
 public function excluir($tipotexto,$idtextojor){

         $this->tabela= "delete from TextoJornalistico where idtextojor= ? and idtipotexto=?";  
         $this->conexao->prepare($this->tabela);
         $this->conexao->bindValue(1,$idtextojor); 
         $this->conexao->bindValue(2,$tipotexto);
         $this->conexao->execute();

         }




}



?>