<?php

namespace FG\BL {

    use FG\DTO\ImagensDTO;
    use FG\LO\ImagensLO;
    use FG\DAL\CrudImagem;

    class ManterImagens
    {
        private $imagens;

        public function __construct()
        {
            $this->imagens = new CrudImagem();
        }

        public function ListarImagem()
        {
            $lImagens = new ImagensLO();
            $lImagens = $this->imagens->listarImagens();
            return $lImagens;
        }

        public function ListarImagemPorID($id_imagem)
        {
            $lImagens = new ImagensLO();
            $lImagens = $this->imagens->listarImagemPorId($id_imagem);
            return $lImagens;
        }
        public function ListarTotais()
        {
            $totais = 0;
            $totais = $this->imagens->ListarTotaisImagens();

            return $totais;
        }

        public function ListarImagemPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $LlistarGeral = new ImagensLO();
            $LlistarGeral = $this->imagens->ListarImagensPaginacao($paginaCorrente, $linhasPorPagina);
            return $LlistarGeral;
        }
        public function InserirImagem(ImagensDTO $imagemDT, $id_imagem)
        {
            $lImagens = $this->imagens->Gravar($imagemDT);
        }
        public function EditarImagem(ImagensDTO $imagemDT, $id_imagem)
        {
            $lImagens = $this->imagens->Alterar($id_imagem, $imagemDT);
        }
        public function ExcluirImagem($id_imagem)
        {
            $this->imagens->Excluir($id_imagem);
        }
    }
}
