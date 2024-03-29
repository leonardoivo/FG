<?php

namespace FG\BL {

    use FG\DAL\{CrudUsuario, CrudPerfil};
    use FG\LO\{UsuariosLO, PerfilLO};
    use FG\DTO\{UsuariosDTO, PerfilDTO};

    class ControleAcesso
    {

        public function __construct()
        {
            $arguments = func_get_args();
            $numberOfArguments = func_num_args();

            if (method_exists($this, $function = '__construct' . $numberOfArguments)) {
                call_user_func_array(array($this, $function), $arguments);
            }
        }

        public function acesso($login, $senha)
        {

            $liberar = false;
            $veracesso = new CrudUsuario();
            $liberar = $veracesso->VerificarLoginSenha($login, $senha);
            return $liberar;
        }
        public function ObterPaginaCorrente($linhasPorPagina, $numero_pagina)
        {
            $paginaCorrente = 0;
            $paginaCorrente = ($linhasPorPagina * $numero_pagina) - $linhasPorPagina;

            return $paginaCorrente;
        }
        public function ObterTotalDePaginas($TotalLinhas, $linhasPorPagina)
        {
            $totalPagina = 0;
            $totalPagina = ceil($TotalLinhas / $linhasPorPagina);
            return $totalPagina;
        }

        public function Redirecionar($pagina)
        {
            echo "<script>location.href=\"{$pagina}\";</script>";
        }
    }
}
