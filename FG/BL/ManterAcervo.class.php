<?php

namespace FG\BL {

    use FG\DTO\AcervoDTO;
    use FG\LO\AcervoLO;
    use FG\DAL\CrudAcervo;

    class ManterAcervo
    {

        private $acervo;
        public function __construct()
        {
            $this->acervo = new CrudAcervo();
        }

        public function ListarAcervo()
        {
            $lAcervo = new AcervoLO();
            $lAcervo =  $this->acervo->ListarAcervo();
            return $lAcervo;
        }
        public function ListarAcervoPorID($id_acervo)
        {
            $lAcervo = new AcervoLO();
            $lAcervo =  $this->acervo->ListarAcervoPorID($id_acervo);
            return $lAcervo;
        }
        public function ListarTotais()
        {
            $totais = 0;
            $totais = $this->AcervoJor->ListarTotaisAcervos();

            return $totais;
        }

        public function ListarAcervoComPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $LlistarGeral = new AcervoLO();
            $LlistarGeral = $this->textoJor->ListarAcervoPaginacao($paginaCorrente, $linhasPorPagina);
            return $LlistarGeral;
        }
        public function CriarAcervo(AcervoDTO $acervoDT)
        {
            $this->acervo->CriarAcervo($acervoDT);
        }
        public function EditarAcervo($acervoDT, $id_acervo)
        {
            $this->acervo->AlterarAcervo($acervoDT, $id_acervo);
        }
        public function ExcluirAcervo($id_acervo)
        {
            $this->acervo->ExcluirAcervo($id_acervo);
        }
    }
}
