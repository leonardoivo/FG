<?php
use FG\BL\{ControleAcesso as AcessoLogin};
use FG\DTO\{UsuariosDTO,PerfilDTO};
require '../StartLoader/autoloader.php';
$cpf=$_POST[''];
$senha=$_POST[''];
$logado=0;
$novoacesso= new AcessoLogin();
$resultado=$novoacesso->acesso($cpf,$senha);
   if($resultado==true){
     $logado=1;
   }
   else{
    header("Location:../login.html");			
	 exit();		

   }
   if($logado==1){
     session_start();
     $_SESSION['usuario']=$cpf;
     header("Location:index.php");
     exit();
   }

?>