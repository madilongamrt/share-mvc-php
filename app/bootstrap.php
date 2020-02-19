<?php

// load cpnfig
    require_once 'config/config.php';


    // autoload core library
spl_autoload_register(function($className) {
    require_once 'libraries/'. $className . '.php';
});

?>