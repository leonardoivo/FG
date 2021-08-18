<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\PerfilDTO;

    class PerfilLO
    {
        private $Perfil;

        function  __construct()
        {
            $this->Perfil = new ArrayObject();
        }
        public function addPerfil(PerfilDTO $Perfil)
        {
            //$this->Perfil->offsetSet($Perfil->getTitulo(),$Perfil); //Função porfora77
            $this->Perfil->append($Perfil); //adiciona um indice automatico
        }
        public function getPerfil()
        {

            return $this->Perfil;
        }
        public function del(PerfilDTO $Perfil)
        {
            $this->Perfil->offsetUnset($Perfil);
        }

        public function find(PerfilDTO $Perfil)
        {
            return $this->Perfil->offsetExists($Perfil);
        }
    }
}
