<?php

namespace FG\BL {

    use FG\DTO\TipoMidiaDTO;
    use FG\LO\TipoMidiaLO;
    use FG\DAL\CrudTipoMidia;

    class ManterTipoMidia
    {

        private $TipoMidia;

        public  function __construct()
        {
            $this->TipoMidia = new CrudTipoMidia();
        }


        public function ListarTipos()
        {

            $LTipoMidia = new TipoMidiaLO();
            $LTipoMidia = $this->TipoMidia->ListarTipoMidia();
            return $LTipoMidia;
        }
        public function ListarTiposPorID($id_tipomidia)
        {

            $LTipoMidia = new TipoMidiaLO();
            $LTipoMidia = $this->TipoMidia->ListarTipoMidiaPorID($id_tipomidia);
            return $LTipoMidia;
        }
        public function AdicionarTipo($tipo)
        {

            $this->TipoMidia->GravarTipoMidia($tipo);
        }

        public function EditarTipo($tipo, $id_tipomidia)
        {

            $this->TipoMidia->AlterarTipoMidia($tipo, $id_tipomidia);
        }

        public function ExcluirTipo($id_tipomidia)
        {

            $this->TipoMidia->ExcluirTipoMidia($id_tipomidia);
        }
    }
}
