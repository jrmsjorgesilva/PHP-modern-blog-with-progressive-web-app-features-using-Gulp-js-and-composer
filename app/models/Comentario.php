<?php

    class Comentario
    {
        public static function selectCommentary($idPost)
        {
            $connect = Connection::getConn();

            $sql = 'SELECT * FROM comentario WHERE id_postagem = :id';
            $sql = $connect->prepare($sql);
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();

            $result = array();

            while ($row = $sql->fetchObject('Comentario')) {
                $result[] = $row;
            }

            return $result;
        }

        public static function inserir($reqPost)
        {
            $connect = Connection::getConn();

            $sql = 'INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nom, :msg, :idp)';
            $sql = $connect->prepare($sql);
            $sql->bindValue(':nom', $reqPost['nome']);
            $sql->bindValue(':msg', $reqPost['msg']);
            $sql->bindValue(':idp', $reqPost['id']);
            $sql->execute();

            if ($sql->rowCount()) {
                return true;
            }

            throw new Exception("falha na inserção");

        }
    }