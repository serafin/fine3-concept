<?php

namespace \Fine\Controller;

use \Fine\Di;

class Application extends Container 
{
    
    public function setModules($modules)
    {
        $this->module->setModules($modeules);
        return $this;
    }
    
    public function run()
    {
        
        // autoload
        
        $this->module->each()->onAutoload();
        
        // bootstrap
        
        $intent = new Intent();
        $intent->di($this);
        
        $this->module->each()->onBootstrap($intent);
        
        $intent->conclude();    
        
        return $this;
        
    }
    
    protected function _module()
    {
        return $this->module = new \Fine\Controller\ModuleManager();
    }
    
}
