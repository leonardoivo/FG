<?php

namespace FG\BL {

    use FG\DTO\UsuariosDTO;
    use FG\LO\UsuariosLO;
    use FG\DAL\CrudUsuario;

    class ManterUsuario
    {
        private $usuario;
        public function __construct()
        {

            $this->usuario = new CrudUsuario();
        }
        public function ListarUsuarios()
        {
            $lUsuarios = new UsuariosLO();
            $lUsuarios = $this->usuario->ListarUsuarios();
            return $lUsuarios;
        }

        public function ListarUsuario($nome)
        {

            $lUsuarios = new UsuariosLO();
            $lUsuarios = $this->usuario->ListarUsuario($nome);
            return $lUsuarios;
        }
        public function ListarTotais()
        {
            $totais = 0;
            $totais = $this->usuario->ListarTotaisUsuarios();

            return $totais;
        }

        public function ListarUsuariosPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $LlistarGeral = new UsuariosLO();
            $LlistarGeral = $this->usuario->ListarUsuariosPaginacao($paginaCorrente, $linhasPorPagina);
            return $LlistarGeral;
        }

        public function CadastrarUsuario(UsuariosDTO $usuarioDT){
            
            $this->usuario->InserirUsuario($usuarioDT);


        }
        public function VerificarLoginSenha($login, $senha)
        {
            $logado = 0;
            $logado = $this->usuario->VerificarLoginSenha($login, $senha);

            return $logado;
        }
        public function EditarUsuario(UsuariosDTO $usuarioDT, $idusuario)
        {
            $this->usuario->AlterarUsuario($usuarioDT, $idusuario);
        }
        public function ExcluirUsuario($idusuario)
        {
            $this->usuario->ExcluirUsuario($idusuario);
        }
    }
}
