<?php

require "vendor/Fine/Autoload/Psr4.php";

\Fine\Autoload\Psr4::newInstance()
    ->addNamespace('Fine', 'vendor/Fine')
    ->addNamespace('App', 'modules')
    ->register();
    
\Fine\Controller\Application::newInstance()
    ->setModules(array(
        'App', 
        'Backend', 
        'CloudMsg',
    ))
    ->run();
