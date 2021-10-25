<?php
include("conexao.php");
//$link=mysqli_connect($host,$login_db,$senha_db);
$cpf="";
$nome="";

$sobrenome="";

$Email="";
$Senha="";
$Ressenha="";
$cadastro= "";
if(isset($_POST['cpf'])){
	$cpf=$_POST['cpf'];
	$nome=$_POST['nome'];
	
	$sobrenome=$_POST['sobrenome'];
	
	$Email=$_POST['email'];
	$Senha=$_POST['senha'];
	$Ressenha=$_POST['re-senha'];
	}




if(!isset($Senha)||!isset($Ressenha)){
	
	echo "Campo senha vazio";
	 header("location:cadastrar.php");

	}

if($Senha!=$Ressenha){
	
	echo "As senhas não coincidem!";
	


	}
	
$Cadastrar="insert into usuarios (cpf,nome,email,senha,sobrenome) values('$cpf','$nome','$Email','$Senha','$sobrenome')";


$query=mysqli_query($link,"SELECT * from usuarios where cpf=".$cpf);

$cadastro= mysqli_num_rows($query); 

   if($cadastro>0){

	   echo "usuario já cadastrado";

	 }
   else if($cadastro==0){
		$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

		echo "Cadastrado com sucesso!";

	 }

//try {
   //$query=mysqli_query($link,$Cadastrar);

		//echo "Cadastrado com sucesso!";
//} catch (Exception $e) {
    //echo 'Causa do Erro: ',  $e->getMessage(), "\n";
//}
       	 //header("location:cadastrar.php");

?>

<!DOCTYPE html>
<head></head>
<body>
<html>
	<h1>Cadastro</h1>
<form name="cadastrar" method="post" action="EfetivarCadastro.php">
<table  border="0" cellspacing="0" cellpadding="0">
<tr>
	<td>
CPF:<input type="text"  maxlength="11" name="cpf"></td>
</tr>
<tr><td>Nome:<input type="text" name="nome"></td><td> Sobrenome: <input type="text" name="sobrenome"></td></tr>
<tr><td>Email:<input type="text" name="email"></td></tr>
<tr><td>Senha:<input type="password" name="senha"></td></tr>
<tr><td>Re-senha:<input type="password" name="re-senha"></td></tr>


</table>
<input type="submit" value="cadastrar">

</body>
</form>
</html>







