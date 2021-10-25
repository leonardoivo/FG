<?php

namespace FG\DAL {

    use FG\DAL\Crud;
    use FG\DTO\AcervoDTO;
    use FG\LO\AcervoLO;

    class CrudAcervo extends Crud
    {

        protected $conexao;
        protected $efetivar;

        public function __construct()
        {
            $this->conexao = new Crud();
        }

        public function ListarAcervo()
        {
            $resultado = $this->conexao->query("select * from acervo");
            $lAcervoLO = new AcervoLO();

            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $acervoDT = new AcervoDTO();
                $acervoDT->id_acervo = $linha['id_acervo'];
                $acervoDT->nome_acervo = $linha['nome_acervo'];
                $acervoDT->Descricao = $linha['Descricao'];
                $acervoDT->DataDeCriacao = $linha['DataDeCriacao'];
                $acervoDT->id_tipomidia = $linha['id_tipomidia'];

                $lAcervoLO->add($acervoDT);
            }
            return $lAcervoLO;
        }
        public function ListarAcervoPorID($id_acervo)
        {

            $resultado = $this->conexao->query("select * from acervo where id_acervo={$id_acervo}");

            $lAcervoLO = new AcervoLO();

            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $acervoDT = new AcervoDTO();
                $acervoDT->id_acervo = $linha['id_acervo'];
                $acervoDT->nome_acervo = $linha['nome_acervo'];
                $acervoDT->id_acervo = $linha['id_acervo'];
                $acervoDT->Descricao = $linha['Descricao'];
                $acervoDT->DataDeCriacao = $linha['DataDeCriacao'];
                $acervoDT->id_tipomidia = $linha['id_tipomidia'];

                
                $lAcervoLO->add($acervoDT);
            }
            return $lAcervoLO;
        }

        public function ListarAcervoPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $resultado = $this->conexao->query("select * from acervo order by id_acervo limit $paginaCorrente,$linhasPorPagina");
            $Lacervo = new acervoLO();
            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $acervoDT = new acervoDTO();
                $acervoDT->id_acervo = $linha['id_acervo'];
                $acervoDT->nome_acervo = $linha['nome_acervo'];
                $acervoDT->Descricao = $linha['Descricao'];
                $acervoDT->DataDeCriacao = $linha['DataDeCriacao'];
                $acervoDT->id_tipomidia = $linha['id_tipomidia'];

                $Lacervo->add($acervoDT);
            }

            return  $Lacervo;
        }
        public function ListarTotaisAcervo()
        {
            $totais = 0;
            $resultado = $this->conexao->query("select * from acervo order by id_acervo asc");
            $resultado->execute();
            $totais = $resultado->rowCount();
            return $totais;
        }

        public function CriarAcervo(AcervoDTO $acervoDT)
        {


            $this->efetivar = $this->conexao->prepare("insert into acervo (nome_acervo,idtextojor,Descricao,DataDeCriacao,id_tipomidia) values (?,?,?,?,?)");
            $this->efetivar->bindParam("nome_acervo", $acervoDT->nome_acervo);
            $this->efetivar->bindParam("idtextojor", $acervoDT->idtextojor);
            $this->efetivar->bindParam("Descricao", $acervoDT->Descricao);
            $this->efetivar->bindParam("DataDeCriacao", $acervoDT->DataDeCriacao);
            $this->efetivar->bindParam("id_tipomidia", $acervoDT->id_tipomidia);
            $this->efetivar->execute();
        }

        public function AlterarAcervo(AcervoDTO $acervoDT, $id_acervo)
        {

            $this->efetivar = $this->conexao->prepare("update acervo set nome_acervo=:nome_acervo,Descricao:Descricao,id_tipomidia:id_tipomidia where id_acervo=?");
            $this->efetivar->bindParam("nome_acervo", $acervoDT->nome_acervo);
            $this->efetivar->bindParam("Descricao", $acervoDT->Descricao);
            $this->efetivar->bindParam("id_acervo", $acervoDT->id_acervo);
            $this->efetivar->bindParam("id_tipomidia", $acervoDT->id_tipomidia);
            $this->efetivar->bindParam(2, $acervoDT->id_secao);
            $this->efetivar->execute();
        }

        public function ExcluirAcervo($id_acervo)
        {


            $this->efetivar = $this->conexao->prepare("delete from  acervo where id_acervo=?");
            $this->efetivar->bindParam("id_acervo", $id_acervo);
            $this->efetivar->execute();
        }
    }
}
