<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\ImagensDTO;

    class ImagensLO
    {
        private $Imagens;

        function  __construct()
        {
            $this->Imagens = new ArrayObject();
        }
        public function add(ImagensDTO $Imagens)
        {
            //$this->Imagens->offsetSet($Imagens->getTitulo(),$Imagens); //Função porfora77
            $this->Imagens->append($Imagens); //adiciona um indice automatico
        }
        public function getImagens()
        {

            return $this->Imagens;
        }
        public function del(ImagensDTO $Imagens)
        {
            $this->Imagens->offsetUnset($Imagens);
        }

        public function find(ImagensDTO $Imagens)
        {
            return $this->Imagens->offsetExists($Imagens);
        }
    }
}
