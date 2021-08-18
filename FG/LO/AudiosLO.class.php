<?php

namespace FG\LO {

    use \ArrayObject;
    use FG\DTO\AudiosDTO;

    class AudiosLO
    {
        private $Audio;

        function  __construct()
        {
            $this->Audio = new ArrayObject();
        }
        public function add(AudiosDTO $Audio)
        {
            //$this->Audio->offsetSet($Audio->getTitulo(),$Audio); //Função porfora77
            $this->Audio->append($Audio); //adiciona um indice automatico
        }
        public function getAudio()
        {

            return $this->Audio;
        }
        public function del(AudiosDTO $Audio)
        {
            $this->Audio->offsetUnset($Audio);
        }

        public function find(AudiosDTO $Audio)
        {
            return $this->Audio->offsetExists($Audio);
        }
    }
}
