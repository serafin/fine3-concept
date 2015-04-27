<?php

namespace App;

use \Fine\Event;

class Module extends \Fine\Controller\ModuleAbstract
{
    
    public function autoload()
    {
        $event->app->autoload->addNamespace('App', 'module/App');
    }
    
    public function bootstrap(Event $event)
    {
        
        $app = $this->app;
        
        $app('config', function() use ($app) {
            return $app->config = \Fine\Config\Config::newInstace()->path('module/App/config');
        });

        $app('request', function() use ($app) {
            return $app->request = \Fine\Controller\Request::newFromGlobals();
        });
        
        $app('router', function() use ($app) {
            $app->router = new \Fine\Controller\Router();
            $event = Event::newInstace()->app($app);
            $app->module->each()->onAppRouterInit($event);
            $event->conclude();
            return $app->router;
        });
        
        $app('dispatcher', function() use ($app) {
           /** @todo */
        });
        
        $app('response', function() use ($app) {
            return $app->response = new \Fine\Controller\Response();
        });
        
        $app('target', function() use ($app) {
            $app->target = \Fine\Controller\Target::newInstace()->config('module/App/config/target');
            
            $app->target->setCurrent(
                $app->target->is($app->request->env('ENV')) 
                    ? $app->request->env('ENV') 
                    : 'prod' 
            );
            
            return $app->target;
        });
        
        $app('db', function() use ($app) {
            $target = $app->target->current;
            $app->db = \Fine\Db\MySQL\Client::newInstace();
            $app->module->each()->onAppDbInit($app->db);
            return $app->db;
        });
        
        // main
        $event(function() use ($app) {
            $app->dispatcher->run();
            $app->response->send();
        });
        
    }
    
}