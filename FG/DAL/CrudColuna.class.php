<?php

namespace FG\DAL {

    use FG\DAL\Crud;
    use FG\DTO\ColunasDTO;
    use FG\LO\ColunasLO;
    use \ArrayObject;
    use \PDO;

    class CrudColuna extends Crud
    {

        private $conexao;
        private $efetivar;


        public function __construct()
        {
            $this->conexao = new Crud();
        }

        public function Listarcoluna()
        {

            $resultado = $this->conexao->query("select * from colunas");
            $colunas = new ColunasLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $coluna = new ColunasDTO();
                $coluna->idcoluna = $linha['idcoluna'];
                $coluna->nome = $linha['nome'];
                $coluna->id_secao = $linha['id_secao'];
                $coluna->titular_coluna = $linha['titular_coluna'];
                $colunas->add($coluna);
            }
            return $colunas;
        }

        public function ListarcolunaPorID($idcoluna)
        {

            $resultado = $this->conexao->query("select * from colunas where idcoluna={$idcoluna}");
            $colunas = new ColunasLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $coluna = new ColunasDTO();
                $coluna->idcoluna = $linha['idcoluna'];
                $coluna->nome = $linha['nome'];
                $coluna->id_secao = $linha['id_secao'];
                $coluna->titular_coluna = $linha['titular_coluna'];
                $colunas->add($coluna);
            }
            return $colunas;
        }


        public function Gravarcoluna(ColunasDTO $ColunaDT)
        {
            $this->efetivar = $this->conexao->prepare("insert into colunas (nome,id_secao,titular_coluna) values (:nome,:id_secao,:titular_coluna)");
            $this->efetivar->bindParam("nome", $ColunaDT->nome);
            $this->efetivar->bindParam("id_secao", $ColunaDT->id_secao);
            $this->efetivar->bindParam("titular_coluna", $ColunaDT->titular_coluna);

            $this->efetivar->execute();
            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);

        }

        public function Alterarcoluna($nome, $idcoluna)
        {
            $this->nome_coluna = $nome;
            $this->idcoluna = $idcoluna;
            $this->efetivar = $this->conexao->prepare("update colunas set nome=?,id_secao=?,titular_coluna=? where idcoluna=?");
            $this->efetivar->bindParam("idcoluna", $this->idcoluna);
            $this->efetivar->bindParam("nome", $this->nome);
            $this->efetivar->bindParam("id_secao", $this->id_secao);
            $this->efetivar->bindParam("titular_coluna", $this->titular_coluna);
            $this->efetivar->execute();
            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);
        }

        public function Excluircoluna($idcoluna)
        {

            $this->idcoluna = $idcoluna;
            $this->efetivar = $this->conexao->prepare("delete from  colunas where idcoluna=?");
            $this->efetivar->bindValue(1, $this->idcoluna);
            $this->efetivar->execute();
        }
    }
}
