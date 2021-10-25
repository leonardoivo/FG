<?php
include("conexao.php");
$login=$_POST["login"];
$senha=$_POST["senha"];
$logado=0;
$resultado= mysqli_query($link,"select cpf, senha from usuarios where usuario='$login' and senha=".$senha);
if(isset($login)&& isset($senha))
{
   if(mysqli_num_rows==1)
   {
	 $logado=1;
	
	}
	else{
		header("Location: login.html");
		exit();
		}


}
if($logado==1){
	session_start();
	$_SESSION["usuario"]=$login;
	 header("Location:index.php");
	exit();
	
	
	}
?>
