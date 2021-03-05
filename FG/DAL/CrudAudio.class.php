<?php
namespace FG\DAL{
use FG\DAL\Crud;
use FG\DTO\AudiosDTO;
use FG\LO\AudiosLO;
use \PDO;
class CrudAudio{
    private $conexao;
    private $efetivar;


 public function __construct()
 {
    $this->conexao = new Crud();
 }
public function listarAudios(){
$resultado= $this->conexao->query("select * from audios");
$AudioLO= new AudiosLO();
while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
$AudiosLT= new AudiosDTO();
        $AudiosLT->id_audio=$linha['id_audio'];
        $AudiosLT->nome_audio=$linha['nome_audio'];
        $AudiosLT->tipo_audio=$linha['tipo_audio'];
        $AudiosLT->descricao=$linha['descricao'];
        $AudiosLT->autor=$linha['autor'];
        $AudiosLT->formato=$linha['formato'];
        $AudiosLT->id_acervo=$linha['id_acervo'];
        $AudiosLT->data_de_inclusao=$linha['data_de_inclusao'];
        $AudioLO->add($AudiosLT);

}

return $AudioLO;
}
public function listarAudiosPorId()
{
    $resultado= $this->conexao->query("select * from audios");
$AudioLO= new AudiosLO();
while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
$AudiosLT= new AudiosDTO();
        $AudiosLT->id_audio=$linha['id_audio'];
        $AudiosLT->nome_audio=$linha['nome_audio'];
        $AudiosLT->tipo_audio=$linha['tipo_audio'];
        $AudiosLT->descricao=$linha['descricao'];
        $AudiosLT->autor=$linha['autor'];
        $AudiosLT->formato=$linha['formato'];
        $AudiosLT->id_acervo=$linha['id_acervo'];
        $AudiosLT->data_de_inclusao=$linha['data_de_inclusao'];
        $AudioLO->add($AudiosLT);

}

return $AudioLO;
}
public function Gravar(AudiosDTO $audio){
$this->efetivar=$this->conexao->prepare("");
$this->efetivar->bindParam("nome_audio",$audio->nome_audio);
$this->efetivar->bindParam("tipo_audio",$audio->tipo_audio);
$this->efetivar->bindParam("descricao",$audio->descricao);
$this->efetivar->bindParam("autor",$audio->autor);
$this->efetivar->bindParam("formato",$audio->formato);
$this->efetivar->bindParam("id_acervo",$audio->id_acervo);
$this->efetivar->bindParam("data_de_inclusao",$audio->data_de_inclusao);
$this->efetivar->execute();

 //echo "\nPDOStatement::errorInfo():\n";
 $arr = $this->efetivar->errorInfo();
 //print_r($arr);

}
public function Alterar(AudiosDTO $audio,$id_audio){
    $this->efetivar=$this->conexao->prepare("");
    $this->efetivar->bindParam("id_audio",$audio->$id_audio);
    $this->efetivar->bindParam("nome_audio",$audio->nome_audio);
    $this->efetivar->bindParam("tipo_audio",$audio->tipo_audio);
    $this->efetivar->bindParam("descricao",$audio->descricao);
    $this->efetivar->bindParam("autor",$audio->autor);
    $this->efetivar->bindParam("formato",$audio->formato);
    $this->efetivar->bindParam("id_acervo",$audio->id_acervo);
    $this->efetivar->bindParam("data_de_inclusao",$audio->data_de_inclusao);
    $this->efetivar->execute();
 //echo "\nPDOStatement::errorInfo():\n";
 $arr = $this->efetivar->errorInfo();
 //print_r($arr);
}
public function Excluir($id_audio){
    $this->tabela= "delete from audios where id_audio= ? ";  
    $this->efetivar=$this->conexao->prepare($this->tabela);
    $this->efetivar->bindParam("id_audio",$id_audio);
    $this->efetivar->execute();

}


}
}
?>