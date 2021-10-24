<?php

namespace FG\DAL {

    use FG\DAL\Crud;
    use FG\DTO\TipoMidiaDTO;
    use FG\LO\TipoMidiaLO;
    use \ArrayObject;
    use \PDO;

    class CrudTipoMidia extends Crud
    {
        public $id_tipomidia = 0;
        public $nome_midia = "";
        private $conexao;
        private $efetivar;
        public $tipomidia;


        public function __construct()
        {
            $this->conexao = new Crud();
        }

        public function ListarTipoMidia()
        {

            $resultado = $this->conexao->query("select * from tipomidia");
            $tipomidia = new TipoMidiaLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $TipoMidiaDT = new TipoMidiaDTO();
                $TipoMidiaDT->id_tipomidia = $linha['id_tipomidia'];
                $TipoMidiaDT->nome_midia = $linha['nome_midia'];
                $tipomidia->add($TipoMidiaDT);
            }
            return $tipomidia;
        }

        public function ListarTipoMidiaPorID($id_tipomidia)
        {

            $resultado = $this->conexao->query("select * from tipomidia where id_tipomidia={$id_tipomidia}");
            $tipomidia = new TipoMidiaLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $TipoMidiaDT = new TipoMidiaDTO();
                $TipoMidiaDT->id_tipomidia = $linha['id_tipomidia'];
                $TipoMidiaDT->nome_midia = $linha['nome_midia'];
                $tipomidia->add($TipoMidiaDT);
            }
            return $tipomidia;
        }


        public function GravarTipoMidia($nome_midia)
        {
            $this->nome_midia = $nome_midia;
            $this->efetivar = $this->conexao->prepare("insert into tipomidia (nome_midia) values (:nome_midia)");
            $this->efetivar->bindParam("nome_midia", $this->nome_midia);
            $this->efetivar->execute();
            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);

        }

        public function AlterarTipoMidia($nome_midia, $id_tipomidia)
        {
            $this->nome_midia = $nome_midia;
            $this->id_tipomidia = $id_tipomidia;
            $this->efetivar = $this->conexao->prepare("update tipomidia set nome_midia=? where id_tipomidia=?");
            $this->efetivar->bindValue(1, $this->nome_midia);
            $this->efetivar->bindValue(2, $this->id_tipomidia);
            $this->efetivar->execute();
            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);
        }

        public function ExcluirTipoMidia($id_tipomidia)
        {

            $this->id_tipomidia = $id_tipomidia;
            $this->efetivar = $this->conexao->prepare("delete from  tipomidia where id_tipomidia=?");
            $this->efetivar->bindValue(1, $this->id_tipomidia);
            $this->efetivar->execute();
        }
    }
}
