<?php
class CrudSecao extends Crud{
private $id_secao=0;
private $nome_secao="";
protected $conexao;
protected $efetivar;
protected $arraySecao;
public function __construct()
{
    $this->conexao = new Crud();
    $this->arraySecao = new ArrayObject();

}
public function add($objeto){
    $this->arraySecao->append($objeto);

}
public function ListarSecao(){
    $resultado=$this->conexao->query("select * from secoes");
    $listaSecao =  new ArrayObject();
    while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
    $Secao = new CrudSecao();
    $this->id_secao=$linha['id_secao'];
    $this->nome_secao=$linha['nomeSecao'];
    $listaSecao->append($this);
    }
    return $listaSecao;
    }



public function CriarSecao($nomeSecao){
$this->nome_secao=$nomeSecao;
$this->efetivar=$this->conexao->prepare("insert into secoes (nomeSecao) values (:nomeSecao)");
$this->efetivar->bindValue("nomeSecao",$this->nome_secao);
$this->efetivar->execute();


}

public function AlterarSecao($nomeSecao,$id_secao){
    $this->nome_secao=$nomeSecao;
    $this->id_secao=$id_secao;
    $this->efetivar=$this->conexao->prepare("update secoes set nomeSecao=? where id_secao=?");
    $this->efetivar->bindValue(1,$this->nome_secao);
    $this->efetivar->bindValue(2,$this->id_secao);
    $this->efetivar->execute();

}

public function ExcluirSecao($id_secao){

    $this->id_secao=$id_secao;
    $this->efetivar=$this->conexao->prepare("delete from  secoes where id_secao=?");
    $this->efetivar->bindValue(1,$this->id_secao);
    $this->efetivar->execute();


}


}

?>