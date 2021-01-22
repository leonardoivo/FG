<?php
namespace FG\BL{
 use FG\BL\TextoJornalistico;
 use FG\DAL\CrudTextoJornalistico;
 use FG\DTO\TextoJornalisticoDTO;
 use FG\DTO\SecoesDTO;
 use FG\DTO\TipotextoDTO;
 use FG\LO\TextoJornalisticoLO;
class TextoBlog extends TextoJornalistico{
public $textoblog;
public $autorblog;
public $tipotexto;
public $tituloblog;

public function __construct()
{
    $arguments = func_get_args();
    $numberOfArguments = func_num_args();

    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
        call_user_func_array(array($this, $function), $arguments);
    }
}


public function listarBlogs(){
 $this->tipotexto=2;
 return $this->ListarTextos($this->tipotexto);    
}
public function CriarTextoBlog(){
    $blogDT = new TextoJornalisticoDTO();
    $blogDT->titulo=$this->tituloblog;
    $blogDT->autor=$this->autorblog;
    $blogDT->datapublicacao=$this->dataentrevista;
    $blogDT->texto=$this->textoblog;
    $this->CriarTexto($blogDT);
  
}
public function alterarBlog($idtextojor,TextoJornalisticoDTO $blog){
    $this->AlterarTextoJor($blog,$idtextojor);
}

public function ExcluirTextoBlog($idtextojor, $tipotexto)
{
    $this->ExcluirTexto($idtextojor,$tipotexto);
}


    
}
}
?>