<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\AcervoDTO;

    class AcervoLO
    {
        private $acervo;

        function  __construct()
        {
            $this->acervo = new ArrayObject();
        }
        public function add(AcervoDTO $acervo)
        {
            //$this->acervo->offsetSet($acervo->getTitulo(),$acervo); //Função porfora77
            $this->acervo->append($acervo); //adiciona um indice automatico
        }
        public function getAcervo()
        {

            return $this->acervo;
        }
        public function del(AcervoDTO $acervo)
        {
            $this->acervo->offsetUnset($acervo);
        }

        public function find(AcervoDTO $acervo)
        {
            return $this->acervo->offsetExists($acervo);
        }
    }
}
