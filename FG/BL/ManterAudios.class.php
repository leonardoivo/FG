<?php

namespace FG\BL {

    use FG\DTO\AudiosDTO;
    use FG\LO\AudiosLO;
    use FG\DAL\CrudAudio;

    class ManterAudios
    {
        private $audio;
        public function __construct()
        {
            $this->audio = new CrudAudio();
        }
        public function ListarAudio()
        {
            $lAudios = new AudiosLO();
            $lAudios = $this->audio->listarAudios();
            return $lAudios;
        }
        public function ListarAudioPorID($id_audio)
        {
            $lAudios = new AudiosLO();
            $lAudios = $this->audio->listarAudiosPorId($id_audio);
            return $lAudios;
        }
        public function ListarTotais()
        {
            $totais = 0;
            $totais = $this->audio->ListarTotaisaudio();

            return $totais;
        }

        public function ListarAudioComPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $LlistarGeral = new AudiosLO();
            $LlistarGeral = $this->audio->ListarAudioPaginacao($paginaCorrente, $linhasPorPagina);
            return $LlistarGeral;
        }
        public function InserirAudio(AudiosDTO $AudioDT)
        {

            $this->audio->Gravar($AudioDT);
        }
        public function EditarAudio(AudiosDTO $AudioDT, $id_audio)
        {
            $this->audio->Alterar($AudioDT, $id_audio);
        }
        public function ExcluirAudio($id_audio)
        {

            $this->audio->Excluir($id_audio);
        }
    }
}
