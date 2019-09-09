<?php

    class AboutController
    {
        public function index()
        {
            
            $loader = new \Twig\Loader\FilesystemLoader('../view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('about.html');

            $params = array();
            
            $values = $template->render($params);
            echo $values;
        }
    }

?>