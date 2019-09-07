<?php

    //REQUIRE


    class Core
    {
        public function start($urlGet)
        {
            if (isset($urlGet['pagina'])) {
                $controller = ucfirst($urlGet['pagina'].'Controller');
            } else {
                $controller = 'HomeController';
            }
            $action = 'index';
            
            if (!class_exists($controller)) {
                $controller = 'ErrorController';
            }

            call_user_func_array(array(new $controller, $action), array());
        }
    }

?>