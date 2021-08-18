<?php

namespace FG\DAL {

    use FG\DAL\Crud;
    use FG\DTO\UsuariosDTO;
    use FG\LO\UsuariosLO;

    class CrudUsuario extends Crud
    {


        protected  $conexao;
        protected  $efetivar;

        public function __construct()
        {
            $this->conexao = new Crud();
        }

        public function ListarUsuarios()
        {

            $resultado = $this->conexao->query("select * from usuarios");
            $LUsuarios = new UsuariosLO();

            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $usuarioDT = new UsuariosDTO();


                $usuarioDT->idusuario = $linha['idusuario'];
                $usuarioDT->nome = $linha['nome'];
                $usuarioDT->sobrenome = $linha['sobrenome'];
                $usuarioDT->email = $linha['email'];
                $usuarioDT->dataNascimento = $linha['dataNascimento'];
                $usuarioDT->dataCadastramento = $linha['dataCadastramento'];
                $usuarioDT->biografia = $linha['biografia'];
                $usuarioDT->idtipousuario = $linha['idtipousuario'];
                $LUsuarios->add($usuarioDT);
            }
            return $LUsuarios;
        }
        public function ListarUsuario($nome)
        {

            $resultado = $this->conexao->query("select * from usuarios where nome=" . $nome);
            $LUsuarios = new UsuariosLO();

            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $usuarioDT = new UsuariosDTO();


                $usuarioDT->idusuario = $linha['idusuario'];
                $usuarioDT->nome = $linha['nome'];
                $usuarioDT->sobrenome = $linha['sobrenome'];
                $usuarioDT->email = $linha['email'];
                $usuarioDT->dataNascimento = $linha['dataNascimento'];
                $usuarioDT->dataCadastramento = $linha['dataCadastramento'];
                $usuarioDT->biografia = $linha['biografia'];
                $usuarioDT->idtipousuario = $linha['idtipousuario'];
            }
        }

        public function VerificarLoginSenha($login, $senha)
        {
            $this->efetivar = $this->conexao->prepare("SELECT email, senha FROM usuarios WHERE cl_email = :login AND senha = :senha");
            $this->efetivar->bindValue(":login", $login);
            $this->efetivar->bindValue(":senha", $senha);
            $this->efetivar->execute();
            return $this->efetivar->rowCount();
        }

        public function ListarUsuariosPaginacao($paginaCorrente, $linhasPorPagina)
        {

            $resultado = $this->conexao->query("select * from Usuarios order by id_Usuarios limit $paginaCorrente,$linhasPorPagina");
            $LUsuarios = new UsuariosLO();
            while ($linha = $resultado->fetch(\PDO::FETCH_ASSOC)) {
                $usuarioDT = new UsuariosDTO();
                $usuarioDT->idusuario = $linha['idusuario'];
                $usuarioDT->nome = $linha['nome'];
                $usuarioDT->sobrenome = $linha['sobrenome'];
                $usuarioDT->email = $linha['email'];
                $usuarioDT->dataNascimento = $linha['dataNascimento'];
                $usuarioDT->dataCadastramento = $linha['dataCadastramento'];
                $usuarioDT->biografia = $linha['biografia'];
                $usuarioDT->idtipousuario = $linha['idtipousuario'];
                $LUsuarios->add($usuarioDT);
            }

            return  $LUsuarios;
        }
        public function ListarTotaisUsuarios()
        {
            $totais = 0;
            $resultado = $this->conexao->query("select * from Usuarios order by id_Usuarios asc");
            $resultado->execute();
            $totais = $resultado->rowCount();
            return $totais;
        }


        public function InserirUsuario(UsuariosDTO $usuarioDT)
        {


            $this->efetivar = $this->conexao->prepare("INSERT INTO usuarios (idusuario, nome, sobrenome, email, dataNascimento, login, senha, dataCadastramento, biografia, idtipousuario) VALUES (:nome, :sobrenome, :email, :dataNascimento, :login, :senha, :dataCadastramento, :biografia, :idtipousuario)");
            $this->efetivar->bindValue(":nome", $usuarioDT->nome);
            $this->efetivar->bindValue(":sobrenome", $usuarioDT->sobrenome);
            $this->efetivar->bindValue(":email", $usuarioDT->email);
            $this->efetivar->bindValue(":dataNascimento", $usuarioDT->dataNascimento);
            $this->efetivar->bindValue(":login", $usuarioDT->login);
            $this->efetivar->bindValue(":senha", $usuarioDT->senha);
            $this->efetivar->bindValue(":dataCadastramento", $usuarioDT->dataCadastramento);
            $this->efetivar->bindValue(":biografia", $usuarioDT->biografia);
            $this->efetivar->bindValue(":idtipousuario", $usuarioDT->idtipousuario);
            $this->efetivar->execute();
        }

        public function AlterarUsuario(UsuariosDTO $usuarioDT, $idusuario)
        {

            $this->efetivar = $this->conexao->prepare("update usuario set nome=:nome, sobrenome=:sobrenome, email=:email, dataNascimento=:dataNascimento, login=:login, senha=:senha, dataCadastramento=:dataCadastramento, biografia=:biografia, idtipousuario=:idtipousuario where idusuario=:idusuario");
            $this->efetivar->bindValue(":idusuario", $idusuario);
            $this->efetivar->bindValue(":nome", $usuarioDT->nome);
            $this->efetivar->bindValue(":sobrenome", $usuarioDT->sobrenome);
            $this->efetivar->bindValue(":email", $usuarioDT->email);
            $this->efetivar->bindValue(":dataNascimento", $usuarioDT->dataNascimento);
            $this->efetivar->bindValue(":login", $usuarioDT->login);
            $this->efetivar->bindValue(":senha", $usuarioDT->senha);
            $this->efetivar->bindValue(":dataCadastramento", $usuarioDT->dataCadastramento);
            $this->efetivar->bindValue(":biografia", $usuarioDT->biografia);
            $this->efetivar->bindValue(":idtipousuario", $usuarioDT->idtipousuario);
            $this->efetivar->execute();
        }

        public function ExcluirUsuario($idusuario)
        {

            $this->idusuario = $idusuario;
            $this->efetivar = $this->conexao->prepare("delete from  usuarios where idusuario=?");
            $this->efetivar->bindValue(1, $idusuario);
            $this->efetivar->execute();
        }
    }
}
