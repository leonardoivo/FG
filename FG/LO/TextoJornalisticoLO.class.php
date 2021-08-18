<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\TextoJornalisticoDTO;

    class TextoJornalisticoLO
    {
        private $TextoJornalistico;

        function  __construct()
        {
            $this->TextoJornalistico = new ArrayObject();
        }
        public function add(TextoJornalisticoDTO $TextoJornalistico)
        {
            //$this->TextoJornalistico->offsetSet($TextoJornalistico->getTitulo(),$TextoJornalistico); //Função porfora77
            $this->TextoJornalistico->append($TextoJornalistico); //adiciona um indice automatico
        }
        public function getTextoJornalistico()
        {

            return $this->TextoJornalistico;
        }
        public function del(TextoJornalisticoDTO $TextoJornalistico)
        {
            $this->TextoJornalistico->offsetUnset($TextoJornalistico);
        }

        public function find(TextoJornalisticoDTO $TextoJornalistico)
        {
            return $this->TextoJornalistico->offsetExists($TextoJornalistico);
        }
    }
}
