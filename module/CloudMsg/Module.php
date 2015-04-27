<?php

namespace CloudMsg;

class Module
{
    
    public function autoload()
    {
        $this->app->autoload->addNamespace('CloudMsg', 'module/CloudMsg');
    }
    
    public function bootstrap(Event $event)
    {
        
        
    }
    
    public function onAppDbInit()
    {
        $db = $this->app->db;

        $db(array(
            'CloudMsg' => function() use ($db) {
                return $db->CloudMsg = Module\App\Db\Table\CloudMsg::newInstance()->db($db);
            },
            'CloudMsgToken' => function() use ($db) {
                return $di->db->CloudMsg = \Fine\Db\MySQL\Table::newInstance()
                    ->db($db)
                    ->table('cloudMsgToken')
                    ->field(array('cloudMsgToken_id', 'CloudMsgToken_token'/* , ...*/));
            }
        ));
    }
    
    public function onEntityRepositoryInit()
    {
        $repository = $this->app->module->Entity->repository;
        
        $repository('CloudMsg', function() use ($repository) {
            return $repository->CloudMsg = new Module\Entity\Repository\CloudMsg();
        });
    }
    
}
