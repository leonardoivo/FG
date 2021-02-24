<?php
namespace FG\BL{
    use FG\BL\TextoJornalistico;
    use FG\DAL\CrudTextoJornalistico;
    use FG\DTO\TextoJornalisticoDTO;
    use FG\DTO\SecoesDTO;
    use FG\DTO\TipotextoDTO;
    use FG\LO\TextoJornalisticoLO;
    class Reportagem extends TextoJornalistico{

        var $local_da_reportagem;
        var $fotos;
    
  public function __construct()
  {
      $arguments = func_get_args();
      $numberOfArguments = func_num_args();
  
      if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
          call_user_func_array(array($this, $function), $arguments);
      }
  }
  
  public function ListarReportagens(){
   $reportagens = new TextoJornalisticoDTO();
   $this->tipotexto=3;

   $reportagens = $this->ListarTextos($ $this->tipotexto);
   
  }
    public function CriarReportagem(TextoJornalisticoDTO $reportagemDT){
        $this->CriarTexto($reportagemDT);
    }
    
    public function AlterarReportagem($idtextojor,TextoJornalisticoDTO $reportagemDT){
        $this->AlterarTextoJor($reportagemDT,$idtextojor,$idtextojor);


    }
    public function ExcluirReportagem($idtextojor, $tipotexto){
        $this->ExcluirTexto($idtextojor,$tipotexto);
    }

    }
}
?>