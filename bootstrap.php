<?php 

   

    // Loading config files
    require_once 'config/config.php';

    // autoloader (just for scalability) (it's for loading the core files)

    spl_autoload_register(function($className){
        require_once './core/'.$className.'.php';
    });