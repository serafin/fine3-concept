<?php

namespace \Fine\Event;

class Event
{
    
    protected $_app;
    
    protected $_conclude;
    
    public function __invoke($callback)
    {
        return $this->appendConclude($callback);
    }
    
    /* conclude */
    
    public function setApp(\Fine\Di\Container $app)
    {
        $this->_app = $app;
        return $this;
    }
    
    public function getApp()
    {
        return $this->_app;
    }
    
    /* conclude */
    
    public function prependConclude($callback)
    {
        array_unshift($this->_conclude, $callback);
        return $this;
    }
    
    public function appendConclude($callback)
    {
        $this->_conclude[] = $callback;
    }
    
    public function conclude()
    {
        while ($callback = array_shift($this->_conclude)) {
            $callback($this);
        }
        return $this;
    }
    
}