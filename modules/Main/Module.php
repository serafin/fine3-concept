<?php

namespace App;

use \Fine\Event;

class Module extends \Fine\Controller\ModuleAbstract
{
    
    public function autoload()
    {
        $this->app->autoload->addNamespace('App', 'module/App');
    }
    
    public function init()
    {
        
        $app = $this->app;
        
        $app(array(
            
            'db' =>  function() use ($app) {
                $target = $app->target->current;
                $app->db = \Fine\Db\MySQL\Client::newInstace();
                $app->module->each()->onAppDbInit();
                return $app->db;
            },
            
            'config' => function() use ($app) {
                return $app->config = \Fine\Config\Config::newInstace()->path('module/App/config');
            },
            
            'dispatcher' => function() use ($app) {
                /** @todo */
            },
            
            'request' => function() use ($app) {
                return $app->request = \Fine\Controller\Request::newFromGlobals();
            },
            
            'response' => function() use ($app) {
                return $app->response = new \Fine\Controller\Response();
            },
            
            'router' => function() use ($app) {
                $app->router = new \Fine\Controller\Router();
                $event = Event::newInstace()->app($app);
                $app->module->each()->onAppRouterInit($event);
                $event->conclude();
                return $app->router;
            },
            
            'target' => function() use ($app) {
                $app->target = \Fine\Controller\Target::newInstace()->config('module/App/config/target');
                
                $app->target->setCurrent(
                    $app->target->is($app->request->env('ENV')) 
                        ? $app->request->env('ENV') 
                        : 'prod' 
                );
                
                return $app->target;
            },
            
        ));
        
    }
    
    public function bootstrap()
    {
        $this->app->dispatcher->run();
        $this->app->response->send();
    }
    
}