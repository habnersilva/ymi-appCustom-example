<?php

namespace Framework\Aquarium;

class System {

    private $_url;
    private $_controller;
    private $_action;

    public function __construct()
    {

        $this->setUrl($_GET);
        $this->setController();
        $this->setAction();

    }

    public function setUrl( $url )
    {
        
        $this->_url = $url;

    }

    public function getUrl()
    {

    }

    public function setController()
    {

        $this->_controller = empty( $this->_url['controller'] ) ? "Index" : $this->_url['controller'];             

    }

    public function getController()
    {

        return $this->_controller;

    }

    public function setAction()
    {

        $this->_action = empty( $this->_url['action'] ) ? "Index" : $this->_url['action'];

    }

    public function getAction()
    {
        return $this->_action;
    }

    public function run()
    {

        $controller  = "App\\Controllers\\" . $this->getController() . "Controller";
        $action = $this->getAction();

        $instance = new $controller();
        $instance->$action();

    }


}

?>