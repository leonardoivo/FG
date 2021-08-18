<?php
namespace FG\BL{
use FG\DTO\VideosDTO;
use FG\LO\VideosLO;
use FG\DAL\CrudVideo;
class ManterVideos{
    private $video;
    public function __construct()
    {
        $this->video = new CrudVideo();
    }
    public function ListarVideo(){
        $lVideos = new VideosLO();
        $lVideos = $this->video->listarVideos();
    }
    public function ListarVideoPorID($id_video){
        $lVideos = new VideosLO();
        $lVideos = $this->video->listarVideoPorId($id_video);

    }
    public function ListarTotais()
    {
        $totais = 0;
        $totais = $this->video->ListarTotaisvideos();

        return $totais;
    }

    public function ListarvideoPaginacao($paginaCorrente, $linhasPorPagina)
    {

        $LlistarGeral = new videosLO();
        $LlistarGeral = $this->video->ListarvideosPaginacao($paginaCorrente, $linhasPorPagina);
        return $LlistarGeral;
    }
     public function InserirVideos(VideosDTO $videoDT)
     {
        $this->video->Gravar($videoDT);
     }

    public function EditarVideo(VideosDTO $videoDT,$id_video){
        $this->video->Alterar($videoDT,$id_video);

    }
    public function ExcluirVideo($id_video){
        $this->video->Excluir($id_video);

    }
}
}
?>