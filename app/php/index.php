<?php

    //IMPORTS
    require_once('../helpers/Core/Core.php');
    require_once('../controllers/HomeController.php');
    require_once('../controllers/ErrorController.php');
    require_once('../models/Postagem.php');
    require_once('../../lib/database/Connection.php');
    require_once('../../vendor/autoload.php');

    $template = file_get_contents('../template/index.html');
    
    //INSTANCIANDO CORE
    ob_start();
        $core = new Core;
        $core->start($_GET);
        $saida = ob_get_contents();
    ob_end_clean();

    //CARREGANDO STRING TEMPLATE
    $final_template = str_replace('{{area_dinamica}}', $saida, $template);
    echo $final_template;

?>