<?php
namespace FG\BL{
use FG\DTO\ColunasDTO;
use FG\LO\ColunasLO;
use FG\DAL\CrudColuna;
class ManterColuna{
    private $coluna;
    public function __construct()
    {
        $this->coluna = new CrudColuna();
    }
    public function ListarColuna(){
     $lColuna = new ColunasLO();
     $lColuna = $this->coluna->Listarcoluna();
     return $lColuna; 
    }
public function ListarColunaPorID($id_coluna){
    $lColuna = new ColunasLO();
    $lColuna = $this->coluna-> ListarcolunaPorID($id_coluna);
    return $lColuna; 

}
public function CriarColuna($nomecoluna){
   $this->coluna->Gravarcoluna($nomecoluna);

}
public function EditarColuna($nomecoluna,$id_coluna){
    $this->coluna->Alterarcoluna($nomecoluna,$id_coluna);

}
public function ExcluirColuna($id_coluna){
    $this->coluna->Excluircoluna($id_coluna);
}
}
}
?>