<?php

    class HomeController
    {
        public function index()
        {
            //TRATAMENTO DE ERROS
            try {
                $postCollection = Postagem::selectAll();
                
                $loader = new \Twig\Loader\FilesystemLoader('../view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('home.html');

                $params = array();
                $params['posts'] = $postCollection;

                $values = $template->render($params);
                echo $values;
                // var_dump($values);

            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }

?>