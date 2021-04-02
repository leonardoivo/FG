<?php
namespace FG\BL{
    use FG\DTO\TipotextoDTO;
use FG\LO\TipoTextoLO;
use FG\DAL\CrudTipoTexto;
class ManterTipoTexto{

    private $tipoTexto;

    public  function __construct()
    {
        $tipoTexto = new CrudTipoTexto();
    }


    public function ListarTipos(){
    
     $LTipoTexto = new TipoTextoLO();
     $LTipoTexto = $this->tipoTexto->ListarTipoTexto();
     return $LTipoTexto;
    }
    public function ListarTiposPorID($id_tipotexto){
       
        $LTipoTexto = new TipoTextoLO();
        $LTipoTexto = $this->tipoTexto->ListarTipoTexto();
        return $LTipoTexto;

    }
    public function AdicionarTipo($tipo){
       
        $this->tipoTexto->GravarTipoTexto($tipo);

    }

    public function EditarTipo($tipo,$id_tipotexto){
       
        $this->tipoTexto-> AlterarTipoTexto($tipo,$id_tipotexto);
    }

    public function ExcluirTipo($id_tipotexto){
       
        $this->tipoTexto->ExcluirTipoTexto($id_tipotexto);
    }



}

}
?>