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
                $params['id'] = $post->id;
                $params['titulo'] = $post->titulo;
                $params['conteudo'] = $post->conteudo;
                $params['comentarios'] = $post->comentarios;

                $values = $template->render($params);
                echo $values;
                // var_dump($values);

            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }

        public function addComment()
        {
            try {
                
                Comentario::inserir($_POST);
                header('
                    location: http://localhost/site%20PHP/app/php/?pagina=post&id='.$_POST['id'].'
                ');

            } catch(Exception $e) {

                echo '<script> alert("'. $e->getMessage() .'");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=post&id='.$_POST['id'].'"</script>';
                
            }
        }
    }

?>