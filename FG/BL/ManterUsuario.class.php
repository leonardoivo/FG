<?php
namespace FG\BL{
    use FG\DTO\UsuariosDTO;
    use FG\LO\UsuariosLO;
    use FG\DAL\CrudUsuario;

class ManterUsuario{
    private $usuario;
    public function __construct(){ 

        $this->usuario = new CrudUsuario();

    }
 public function ListarUsuarios(){
    $lUsuarios= new UsuariosLO();
    $lUsuarios = $this->usuario->ListarUsuarios();
    return $lUsuarios;
   

 }

 public function ListarUsuario($nome){
     
    $lUsuarios= new UsuariosLO();
    $lUsuarios = $this->usuario->ListarUsuario($nome);
    return $lUsuarios;

 }
 
public function VerificarLoginSenha($login,$senha){


}
public function EditarUsuario(){}
public function ExcluirUsuario(){}



}

}
?>