<?php

namespace PHPMVC\LIB;


//frontcontroller =new frontcontroller();
class FrontController
{
    const NOT_FOUND_ACTION='notFoundAction';
    const NOT_FOUND_CONTROLLER='PHPMVC\Controllers\NotFoundController';
    private $_controller='index';
    private $_action='default';
    private $_params=array();
    public function __construct()
    {
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $r = explode('/', trim($url, '/'));
        array_shift($r);
        array_shift($r);

        $r = implode('/', $r);
        $r=explode('/',$r,3);

        if(isset($r[0])&&$r[0]!='')
        {
            $this->_controller=$r[0];
        }
        if(isset($r[1])&&$r[1]!='')
        {
            $this->_action=$r[1];
        }
        if(isset($r[2])&&$r[2]!='')
        {
            $this->_params=explode('/',$r[2]);
        }


    }
    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\Controllers\\'.ucfirst($this->_controller).'Controller';
        $actionName=$this->_action.'Action';

        if(!class_exists( $controllerClassName))
        {
            $controllerClassName= self::NOT_FOUND_CONTROLLER ;
        }
        $controller=new $controllerClassName();
        //var_dump($controller);
        if(!method_exists($controller,$actionName))
        {
            $this->_action=$actionName=self::NOT_FOUND_ACTION;

        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        call_user_func_array([$controller,$this->_action.'Action'],$this->_params);


    }
}

