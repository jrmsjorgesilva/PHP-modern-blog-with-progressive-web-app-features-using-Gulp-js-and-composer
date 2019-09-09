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
    }