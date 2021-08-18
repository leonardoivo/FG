<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\VideosDTO;

    class VideosLO
    {
        private $Videos;

        function  __construct()
        {
            $this->Videos = new ArrayObject();
        }
        public function add(VideosDTO $Videos)
        {
            //$this->Videos->offsetSet($Videos->getTitulo(),$Videos); //Função porfora77
            $this->Videos->append($Videos); //adiciona um indice automatico
        }
        public function getVideos()
        {

            return $this->Videos;
        }
        public function del(VideosDTO $Videos)
        {
            $this->Videos->offsetUnset($Videos);
        }

        public function find(VideosDTO $Videos)
        {
            return $this->Videos->offsetExists($Videos);
        }
    }
}
