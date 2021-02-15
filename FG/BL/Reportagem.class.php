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
  
    
    
    
    }
}
?>