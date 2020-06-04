<?php


namespace PHPMVC\Controllers;


use PHPMVC\LIB\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    public function notFoundAction()
    {
        $this->view();
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->_params = $params;
    }

    protected function view($data=[])
    {
       // echo $this->_action ,$this->_controller ,'<br>';
        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';

        } else {
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view)) {
                require_once $view;
            } else {
                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';

            }
        }
    }
    protected function models($model)
    {
        $model  = 'PHPMVC\models\\'.$model.'Model';
        // Instatiate model
        return new $model;
    }

}