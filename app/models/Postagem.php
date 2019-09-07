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
    }

?>