<!DOCTYPE>
<html>
<head>
	
</head>	
<body>
	

<?php
include("conexao.php");
$id=$_GET["id"];
$resultado=mysqli_query($link,"select * from postagens where id=".$id);

while($linha=mysqli_fetch_assoc($resultado)){
	
	echo $linha["titulo"];
	echo $linha["texto"];
	
	
	}

?>


</body>
</html>
