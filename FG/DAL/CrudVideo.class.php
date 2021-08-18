<?php

namespace FG\DAL {

   use FG\DAL\Crud;
   use \PDO;
   use FG\DTO\VideosDTO;
   use FG\LO\VideosLO;

   class CrudVideo
   {
      private $conexao;
      private $efetivar;


      public function __construct()
      {
         $this->conexao = new Crud();
      }

      public function listarVideos()
      {
         $resultado = $this->conexao->query("select * from videos");
         $videoLO = new videosLO();
         while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $videosLT = new videosDTO();
            $videosLT->id_video = $linha['id_video'];
            $videosLT->nome_video = $linha['nome_video'];
            $videosLT->tipo_video = $linha['tipo_video'];
            $videosLT->descricao = $linha['descricao'];
            $videosLT->autor = $linha['autor'];
            $videosLT->formato = $linha['formato'];
            $videosLT->id_acervo = $linha['id_acervo'];
            $videosLT->data_de_inclusao = $linha['data_de_inclusao'];
            $videoLO->add($videosLT);
         }

         return $videoLO;
      }

      public function listarVideoPorId($id_video)
      {
         $resultado = $this->conexao->query("select * from videos where id_video={$id_video}");
         $videoLO = new videosLO();
         while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $videosLT = new videosDTO();
            $videosLT->id_video = $linha['id_video'];
            $videosLT->nome_video = $linha['nome_video'];
            $videosLT->tipo_video = $linha['tipo_video'];
            $videosLT->descricao = $linha['descricao'];
            $videosLT->autor = $linha['autor'];
            $videosLT->formato = $linha['formato'];
            $videosLT->id_acervo = $linha['id_acervo'];
            $videosLT->data_de_inclusao = $linha['data_de_inclusao'];
            $videoLO->add($videosLT);
         }

         return $videoLO;
      }

      public function Gravar(VideosDTO  $video)
      {
         $this->efetivar = $this->conexao->prepare("");
         $this->efetivar->bindParam("nome_video", $video->nome_video);
         $this->efetivar->bindParam("tipo_video", $video->tipo_video);
         $this->efetivar->bindParam("descricao", $video->descricao);
         $this->efetivar->bindParam("autor", $video->autor);
         $this->efetivar->bindParam("formato", $video->formato);
         $this->efetivar->bindParam("id_acervo", $video->id_acervo);
         $this->efetivar->bindParam("data_de_inclusao", $video->data_de_inclusao);
         $this->efetivar->execute();

         //echo "\nPDOStatement::errorInfo():\n";
         $arr = $this->efetivar->errorInfo();
         //print_r($arr);

      }
      public function ListarvideosPaginacao($paginaCorrente, $linhasPorPagina)
      {

         $resultado = $this->conexao->query("select * from videos order by id_videos limit $paginaCorrente,$linhasPorPagina");
         $Lvideos = new videosLO();
         while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
            $videoDT = new videosDTO();
            $videoDT->id_video = $linha['id_video'];
            $videoDT->nome_video = $linha['nome_video'];
            $videoDT->tipo_video = $linha['tipo_video'];
            $videoDT->descricao = $linha['descricao'];
            $videoDT->autor = $linha['autor'];
            $videoDT->formato = $linha['formato'];
            $videoDT->id_acervo = $linha['id_acervo'];
            $videoDT->data_de_inclusao = $linha['data_de_inclusao'];
            $Lvideos->add($videoDT);
         }

         return  $Lvideos;
      }
      public function ListarTotaisvideos()
      {
         $totais = 0;
         $resultado = $this->conexao->query("select * from videos order by id_videos asc");
         $resultado->execute();
         $totais = $resultado->rowCount();
         return $totais;
      }

      public function Alterar(VideosDTO  $video, $id_video)
      {
         $this->efetivar = $this->conexao->prepare("");
         $this->efetivar->bindParam("id_video", $id_video);
         $this->efetivar->bindParam("nome_video", $video->nome_video);
         $this->efetivar->bindParam("tipo_video", $video->tipo_video);
         $this->efetivar->bindParam("descricao", $video->descricao);
         $this->efetivar->bindParam("autor", $video->autor);
         $this->efetivar->bindParam("formato", $video->formato);
         $this->efetivar->bindParam("id_acervo", $video->id_acervo);
         $this->efetivar->bindParam("data_de_inclusao", $video->data_de_inclusao);
         $this->efetivar->execute();
         //echo "\nPDOStatement::errorInfo():\n";
         $arr = $this->efetivar->errorInfo();
         //print_r($arr);

      }

      public function Excluir($id_video)
      {
         $this->tabela = "delete from videos where id_video= ? ";
         $this->efetivar = $this->conexao->prepare($this->tabela);
         $this->efetivar->bindParam("id_video", $id_video);
         $this->efetivar->execute();
      }
   }
}
