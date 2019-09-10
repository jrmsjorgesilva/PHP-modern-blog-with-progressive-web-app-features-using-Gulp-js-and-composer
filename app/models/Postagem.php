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
            } else {
                $result->comentarios = Comentario::selectCommentary($result->id);
            }

            return $result;
        }

        public static function insert($params)
        {
            if (empty($params['titulo']) || empty($params['conteudo'])) {
                throw new Exception("Preencha todos os campos!");

                return false;
            }

            $connect = Connection::getConn();

            $sql = $connect->prepare("INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)");
            // SUBSTITUINDO VALORES ':VALOR' NO BANCO
            $sql->bindValue(':tit', $params['titulo']);
            $sql->bindValue(':cont', $params['conteudo']);
            $result = $sql->execute();

            if ($result == 0) {
                throw new Exception("Erro na publicação");

                return false;
            }

            return true;
        }

        public static function update($params)
        {
            $connect = Connection::getConn();

            $sql = "UPDATE postagem SET titulo = :tit, conteudo = :cont WHERE id = :id";
            $sql = $connect->prepare($sql);
            $sql->bindValue(':tit', $params['titulo']);
            $sql->bindValue(':cont', $params['conteudo']);
            $sql->bindValue(':id', $params['id']);
            $result = $sql->execute();

            if ($result == 0) {
                throw new Exception("Falha na alteração");

                return false;
            }

            return true;

        }

        public static function delete($paramID)
        {
            $connect = Connection::getConn();

            $sql = "DELETE FROM postagem WHERE id = :id";
            $sql = $connect->prepare($sql);
            $sql->bindValue(':id', $paramID);
            $result = $sql->execute();

            if ($result == 0) {
                throw new Exception("Falha na deleção");

                return false;
            }

            return true;
        }
    }

?>