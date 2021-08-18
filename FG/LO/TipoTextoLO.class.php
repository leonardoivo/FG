<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\TipoTextoDTO;

    class TipoTextoLO
    {
        private $TipoTexto;

        function  __construct()
        {
            $this->TipoTexto = new ArrayObject();
        }
        public function add(TipoTextoDTO $TipoTexto)
        {
            //$this->TipoTexto->offsetSet($TipoTexto->getTitulo(),$TipoTexto); //Função porfora77
            $this->TipoTexto->append($TipoTexto); //adiciona um indice automatico
        }
        public function getTipoTexto()
        {

            return $this->TipoTexto;
        }
        public function del(TipoTextoDTO $TipoTexto)
        {
            $this->TipoTexto->offsetUnset($TipoTexto);
        }

        public function find(TipoTextoDTO $TipoTexto)
        {
            return $this->TipoTexto->offsetExists($TipoTexto);
        }
    }
}
