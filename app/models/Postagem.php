<?php

    class Postagem
    {
        public static function selectAll()
        {
            $connect = Connection::getConn();

            $sql = 'SELECT * FROM postagem ORDER BY id DESC';
            $sql = $connect->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('postagem')) {
                $result[] = $row;
            }

            if (!$result) {
                throw new Exception('Não foram encontrados resultados... Contate o administrador do sistema');
            }

            return $result;
        }

        public static function selectPostById($idPost)
        {
            $connect = Connection::getConn();

            $sql = "SELECT * FROM postagem WHERE id = :id";
            $sql = $connect->prepare($sql);
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();

            $result = $sql->fetchObject('Postagem');

            if (!$result) {
                throw new Exception('não foi encontrado nenhum registro no banco');
            }

            return $result;
        }
    }

?>