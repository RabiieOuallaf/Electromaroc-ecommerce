<?php 

   

    // Loading config files
    require_once 'config/config.php';
    
    require_once 'helpers/session_helper.php';

    require_once 'core/Core.php';
    

    require_once 'core/Database.php';

    // autoloader (just for scalability) (it's for loading the core files)

    // spl_autoload_register(function($className){
    //     if(file_exists('core/'.$className.'.php')){
    //         require_once 'core/'.$className.'.php';
    //     }
    // });

    