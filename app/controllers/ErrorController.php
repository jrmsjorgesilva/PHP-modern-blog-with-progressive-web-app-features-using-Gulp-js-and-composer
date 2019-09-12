<?php

    class ErrorController
    {
        public function index()
        {
            
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('error.html');

            $params = array();
            
            $values = $template->render($params);
            echo $values;
        }
    }

?>