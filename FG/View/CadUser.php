<?php

use FG\DTO\UsuariosDTO;
use FG\LO\UsuariosLO;
use FG\BL\{ManterUsuario,ControleAcesso};
use FG\Common\EnvioEmail;
require '../StartLoader/autoloader.php';
$Redirecionamento = new ControleAcesso();
$cadastroDT = new UsuariosDTO();
$ManterUsuario = new ManterUsuario();
$pagina='';
$remetente="boasvindas@trilhosdorio.com.br";
$editar=false;
$id_usuario='';
 $p = $GLOBALS['_'.$_SERVER['REQUEST_METHOD']];
$editar=isset($_POST['editar'])?$_POST['editar']:false;
$id_usuario=isset($_POST['id_usuario'])?$_POST['id_usuario']:0;

   $cadastroDT->nome=$_POST['nome'];
   $cadastroDT->sobrenome=$_POST['sobrenome'];
   $cadastroDT->login=$_POST['login'];
   $cadastroDT->email=$_POST['email'];
   $cadastroDT->idtipousuario= $_POST['idtipousuario']; //A ser preenchido por uma caixa de seleção.
   $cadastroDT->senha=$_POST['senha'];
   $cadastroDT->situacao=0;
   
   if($editar==true && $id_usuario>0){
    $pagina='ManterUsuario.php';
    $ManterUsuario->EditarUsuario($id_usuario,$cadastroDT);
    $Redirecionamento->Redirecionar($pagina);
   }else{
    $pagina='../login.html';
    $ManterUsuario->CadastrarUsuario($cadastroDT);
    $enviarEmail = new EnvioEmail($remetente,$cadastroDT->email,'Seja muito bem vindo a Trilhos do Rio','E um Prazer ter você como associado');
    $enviarEmail->sendMail();
    $Redirecionamento->Redirecionar($pagina);

   }



?>
