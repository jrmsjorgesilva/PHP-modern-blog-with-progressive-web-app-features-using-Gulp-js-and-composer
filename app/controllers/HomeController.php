<?php

    class HomeController
    {
        public function index()
        {
            //TRATAMENTO DE ERROS
            try {
                //echo 'Home';
                $postCollection = Postagem::selectAll();
            } catch(Exception $e) {
                echo $e->getMessage();
            }

            // var_dump($postCollection);
        }
    }

?>