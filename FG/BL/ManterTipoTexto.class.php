<?php
namespace FG\BL{
    use FG\DTO\TipotextoDTO;
use FG\LO\TipoTextoLO;
use FG\DAL\CrudTipoTexto;
class ManterTipoTexto{

    public function ListarTipos(){
     $tipoTexto = new CrudTipoTexto();
     $LTipoTexto = new TipoTextoLO();
     $LTipoTexto = $tipoTexto->ListarTipoTexto();
     return $LTipoTexto;
    }
    public function ListarTiposPorID($id_tipotexto){
        $tipoTexto = new CrudTipoTexto();
        $LTipoTexto = new TipoTextoLO();
        $LTipoTexto = $tipoTexto->ListarTipoTexto();
        return $LTipoTexto;

    }
    public function AdicionarTipo($tipo){
        $tipoTexto = new CrudTipoTexto();
        $tipoTexto->GravarTipoTexto($tipo);

    }

    public function EditarTipo($tipo,$id_tipotexto){
        $tipoTexto = new CrudTipoTexto();
        $tipoTexto-> AlterarTipoTexto($tipo,$id_tipotexto);
    }

    public function ExcluirTipo($id_tipotexto){
        $tipoTexto = new CrudTipoTexto();
        $tipoTexto->ExcluirTipoTexto($id_tipotexto);
    }



}

}
?>