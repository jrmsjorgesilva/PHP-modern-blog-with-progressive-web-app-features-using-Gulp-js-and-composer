<?php

    class AdminController
    {
        public function index()
        {
            
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $objPosts = Postagem::selectAll();

            $params = array();
            $params['postagens'] = $objPosts;
            
            $values = $template->render($params);
            echo $values;
        }

        public function create()
        {
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');

            $params = array();
            
            $values = $template->render($params);
            echo $values;
        }

        public function insert()
        {
            try {
                
                Postagem::insert($_POST);
            
                echo '<script> alert("Publicação inserida com sucesso!");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=index"</script>';

            } catch(Exception $e) {

                echo '<script> alert("'. $e->getMessage() .'");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=create"</script>';

            }
        }

        public function change($paramID)
        {
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');

            $post = Postagem::selectPostById($paramID);

            $params = array();
            $params['id'] = $post->id;
            $params['titulo'] = $post->titulo;
            $params['conteudo'] = $post->conteudo;
            
            $values = $template->render($params);
            echo $values;
        }

        public function update()
        {
            try {

                Postagem::update($_POST);
                echo '<script> alert("Publicação alterada com sucesso!");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=index"</script>';

            } catch(Exception $e) {

                echo '<script> alert("'. $e->getMessage() .'");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
            
            }
        }

        public function delete($paramID)
        {
            try {

                Postagem::delete($paramID);
                echo '<script> alert("Publicação alterada com sucesso!");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=index"</script>';

            } catch(Exception $e) {

                echo '<script> alert("'. $e->getMessage() .'");</script>';
                echo '<script>location.href="http://localhost/site%20PHP/app/php/?pagina=admin&metodo=index"</script>';

            }
        }
    }

?>