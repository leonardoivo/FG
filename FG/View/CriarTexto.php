<?php
use FG\BL\{TextoJornalistico ,CrudSecao,CrudUsuario};
use FG\LO\{TextoJornalisticoLO,SecoesLO,UsuariosLO};
use FG\DTO\{TextoJornalisticoDTO,SecoesDTO,UsuariosDTO};
require '../StartLoader/autoloader.php';
$texto = new TextoJornalisticoDTO();
$textoGeral = new TextoJornalistico();


?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form action="ManterTextos.php" method="post">
Título:<input type="text"  name="titulo" cols="70">	<br/>

Data de publicação:<input type="date"  name="data_publicacao">	<br/>

	<br/>
	Texto: <textarea name="texto" rows="100" cols="80"></textarea>
	
	<input type="submit" text="enviar">
</form>
</body>
</html>

