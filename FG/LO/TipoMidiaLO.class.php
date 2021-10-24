<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\TipoMidiaDTO;

    class TipoMidiaLO
    {
        private $TipoMidia;

        function  __construct()
        {
            $this->TipoMidia = new ArrayObject();
        }
        public function add(TipoMidiaDTO $TipoMidia)
        {
            //$this->TipoMidia->offsetSet($TipoMidia->getTitulo(),$TipoMidia); //Função porfora77
            $this->TipoMidia->append($TipoMidia); //adiciona um indice automatico
        }
        public function getTipoMidia()
        {

            return $this->TipoMidia;
        }
        public function del(TipoMidiaDTO $TipoMidia)
        {
            $this->TipoMidia->offsetUnset($TipoMidia);
        }

        public function find(TipoMidiaDTO $TipoMidia)
        {
            return $this->TipoMidia->offsetExists($TipoMidia);
        }
    }
}
