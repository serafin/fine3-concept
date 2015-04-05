<?php


interface f_controller_base_intreface 
{
    
    public function request(f_controller_request_interface $request = null);
    public function response(f_controller_response_interface $response = null);
    public function dispatch();
}   

interface f_controller_front_interface
{
    public function run();
}
    
class f_controller_action
{
    
    public function dispatch() 
    {
        
        $action = $this->request()->param('action');
        
        if (strlen($action) === 0 || !method_exists($this, "{$action}Action")) {
            
            if (!method_exists($this, "indexAction")) {
                throw new f_controller_exception_notFound();
            }
            $action = 'index';
            $this->request()->param('action', $action);

        }
        
        $this->{"{$action}Action"}();
    
    }
    
}
    
class f_controller_action_viewAutoRender
{
    
    
    public function dispatch()
    {
        parent::dispatch();
        
        $this->response()->body($this->container()->view()->render(
            "app/view/script" 
            . "/" . $this->request()->param('controller')
            . "/" . $this->request()->param('action')
        ));

    }
    
}