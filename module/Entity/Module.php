<?php

namespace Entity;

use \Fine\Di;

class Module extends Container
{
    
    public function autoload()
    {
        $this->app->autoload->addNamespace('Entity', 'module/Entity');
    }
    
    public function bootstrap(Event $event)
    {
        $app = $event->app;
        
        $app('repository', function() use ($app) {
            return $app->repository = $app->module->Entity->repository;
        });

    }
    
    public function onEntitySubentityInit()
    {
        $c = $this->app->module->Entity->subentity;
        
        $c(array(
            'entityAttr'     => function () use ($c) { return $c->entityAttr     = new Subentity\EntityAttr\Subentity();     },    
            'entityDispatch' => function () use ($c) { return $c->entityDispatch = new Subentity\EntityDispatch\Subentity(); },    
            'entityLink'     => function () use ($c) { return $c->entityLink     = new Subentity\EntityLink\Subentity();     },    
            'entityOrder'    => function () use ($c) { return $c->entityOrder    = new Subentity\EntityOrder\Subentity();    },    
            'entityRoute'    => function () use ($c) { return $c->entityRoute    = new Subentity\EntityRoute\Subentity();    },    
            'entityRel'      => function () use ($c) { return $c->entityRel      = new Subentity\EntityRel\Subentity();      },    
            'entityTag'      => function () use ($c) { return $c->entityTag      = new Subentity\EntityTag\Subentity();      },    
            'entityTree'     => function () use ($c) { return $c->entityTree     = new Subentity\EntityTree\Subentity();     },    
        ));
    }
    
    protected function _repository()
    {
        $this->repository = new Container();
        $this->repository->entity = new Repository\Entity();
        $this->app->module->each()->onEntityRepositoryInit();        
        return $this->repository;
    }
    
    protected function _subentity()
    {
        $this->subentity = new Container();
        $this->app->module->each()->onEntitySubentityInit();        
        return $this->subentity;
    }

}
