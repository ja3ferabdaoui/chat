<?php

class View 
{
    private $view ;

    public function __construct($view = null)
    {
        $this->view = $view;
    }

    public function render($params = [])
    {   
        extract($params);
        $view = $this->view;
     
        include_once(VIEWS.'pages/'.$view.'.php');
    }

    public function redirect($route)
    {   
        header("Location:" . $route);
        exit;
    }
}