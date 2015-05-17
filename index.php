<?php

require "vendor/Fine/Autoload/Psr4.php";

$autoload = \Fine\Autoload\Psr4::newInstance()
    ->addNamespace('Fine', 'vendor/Fine/src')
    ->register();
    
    
class App extends \Fine\Di\Container
{
    
    public function __construct()
    {
        
        $this->autoload = $GLOBALS['autoload'];

        $this->module = \Fine\Controller\Module\Manager::newInstance()->setModules(require 'config/module.php');
        
        $this->module->each()
            ->app($this)
            ->autoload()
            ->init()
            ->bootstrap();
            
    }
    
}

new App();
