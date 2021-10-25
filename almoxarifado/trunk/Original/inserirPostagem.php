<?php
include("conexao.php");

if(isset($_SESSION["usuario"])==1){
	$id_usuario=$_SESSION["usuario"];
	$autor=buscarUsuario($id_usuario);
	$titulo=$_POST['titulo'];
	$texto=$_POST['texto'];
	$data_postagem=date('d-m-Y');
     
    $insercao=mysqli_query($link,"insert into postagem(titulo,texto,data_postagem,autor) values('$titulo','$texto,'$data_postagem','$autor')");	
	} else
	{
		header("location:login.html");
		exit();
	}
   function buscarUsuario($id_usuario){
	$resultado=mysqli_query($link,"select id_usuario,nome from usuarios where id_usuario=".$id_usuario);	
	  while($linha=mysqli_fetch_assoc($resultado)){
            $nome=$linha['nome'];
	     }
   }
  

?>
<!DOCTYPE>
<html>
<head>
</head>
<body>
<h1>Inserir Postagem </h1>
<form action="inserirPostagem.php" method="post">
Titulo: 	<input type="text" name="titulo" value="">
<textarea rows="4" cols="50" name="assunto">
</textarea> 
<input type="submit"  value="enviar">
</form>
<a href="index.php">Voltar</a>
</body>
</html>
