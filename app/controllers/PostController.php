<?php

    class PostController
    {
        public function index($params)
        {
            //TRATAMENTO DE ERROS
            try {
                $post = Postagem::selectPostById($params);
                
                $loader = new \Twig\Loader\FilesystemLoader('../view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('single.html');

                $params = array();
                $params['titulo'] = $post->titulo;
                $params['conteudo'] = $post->conteudo;

                $values = $template->render($params);
                echo $values;
                // var_dump($values);

            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }

?>