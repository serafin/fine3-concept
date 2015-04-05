<?php


interface f_controller_intreface 
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
        
        if (!$action) {
            $action = 'index';
        }
        
        if (!method_exists($this, "{$action}Action")) {
            
            if () {
                
            }
            $action = 'index';
            
        }
        
    
    }
    
}
    
    