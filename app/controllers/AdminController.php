<?php

    class AdminController
    {
        public function index()
        {
            
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $params = array();
            
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
    }

?>