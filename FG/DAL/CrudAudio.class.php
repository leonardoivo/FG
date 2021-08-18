<?php

namespace FG\DAL {

    use FG\DAL\Crud;
    use FG\DTO\AudiosDTO;
    use FG\LO\AudiosLO;
    use \PDO;

    class CrudAudio
    {
        private $conexao;
        private $efetivar;


        public function __construct()
        {
            $this->conexao = new Crud();
        }
        public function listarAudios()
        {
            $resultado = $this->conexao->query("select * from audios");
            $AudiosLO = new AudiosLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $AudiosLT = new AudiosDTO();
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->nome_audio = $linha['nome_audio'];
                $AudiosLT->tipo_audio = $linha['tipo_audio'];
                $AudiosLT->descricao = $linha['descricao'];
                $AudiosLT->autor = $linha['autor'];
                $AudiosLT->formato = $linha['formato'];
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->data_de_inclusao = $linha['data_de_inclusao'];
                $AudiosLO->add($AudiosLT);
            }

            return $AudiosLO;
        }
        public function listarAudiosPorId($id_audio)
        {
            $resultado = $this->conexao->query("select * from audios where id_audio={$id_audio}");
            $AudiosLO = new AudiosLO();
            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $AudiosLT = new AudiosDTO();
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->nome_audio = $linha['nome_audio'];
                $AudiosLT->tipo_audio = $linha['tipo_audio'];
                $AudiosLT->descricao = $linha['descricao'];
                $AudiosLT->autor = $linha['autor'];
                $AudiosLT->formato = $linha['formato'];
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->data_de_inclusao = $linha['data_de_inclusao'];
                $AudiosLO->add($AudiosLT);
            }

            return $AudiosLO;
        }

        public function ListaraudioPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $resultado = $this->conexao->query("select * from audio order by id_audio limit $paginaCorrente,$linhasPorPagina");
            $Laudio = new AudiosLO();
            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $AudiosLT = new AudiosDTO();
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->nome_audio = $linha['nome_audio'];
                $AudiosLT->tipo_audio = $linha['tipo_audio'];
                $AudiosLT->descricao = $linha['descricao'];
                $AudiosLT->autor = $linha['autor'];
                $AudiosLT->formato = $linha['formato'];
                $AudiosLT->id_audio = $linha['id_audio'];
                $AudiosLT->data_de_inclusao = $linha['data_de_inclusao'];
                $Laudio->add($AudiosLT);
            }

            return  $Laudio;
        }
        public function ListarTotaisaudio()
        {
            $totais = 0;
            $resultado = $this->conexao->query("select * from audio order by id_audio asc");
            $resultado->execute();
            $totais = $resultado->rowCount();
            return $totais;
        }


        public function Gravar(AudiosDTO $audio)
        {
            $this->efetivar = $this->conexao->prepare("");
            $this->efetivar->bindParam("nome_audio", $audio->nome_audio);
            $this->efetivar->bindParam("tipo_audio", $audio->tipo_audio);
            $this->efetivar->bindParam("descricao", $audio->descricao);
            $this->efetivar->bindParam("autor", $audio->autor);
            $this->efetivar->bindParam("formato", $audio->formato);
            $this->efetivar->bindParam("id_audio", $audio->id_audio);
            $this->efetivar->bindParam("data_de_inclusao", $audio->data_de_inclusao);
            $this->efetivar->execute();

            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);

        }
        public function Alterar(AudiosDTO $audio, $id_audio)
        {
            $this->efetivar = $this->conexao->prepare("");
            $this->efetivar->bindParam("id_audio", $audio->$id_audio);
            $this->efetivar->bindParam("nome_audio", $audio->nome_audio);
            $this->efetivar->bindParam("tipo_audio", $audio->tipo_audio);
            $this->efetivar->bindParam("descricao", $audio->descricao);
            $this->efetivar->bindParam("autor", $audio->autor);
            $this->efetivar->bindParam("formato", $audio->formato);
            $this->efetivar->bindParam("id_audio", $audio->id_audio);
            $this->efetivar->bindParam("data_de_inclusao", $audio->data_de_inclusao);
            $this->efetivar->execute();
            //echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            //print_r($arr);
        }
        public function Excluir($id_audio)
        {
            $this->tabela = "delete from audios where id_audio= ? ";
            $this->efetivar = $this->conexao->prepare($this->tabela);
            $this->efetivar->bindParam("id_audio", $id_audio);
            $this->efetivar->execute();
        }
    }
}
