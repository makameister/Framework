<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dispatcher
{
    var $request;
    var $controller;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $this->controller = $this->loadController();
        if(is_null($this->controller)){
             $this->request->controller = 'index';
             $this->controller = $this->loadController();
             $this->controller->error('controlleur n\'existe pas');
        }
        if(!in_array($this->request->action, get_class_methods($this->controller))){
            $this->controller->error('Le controller ' . $this->request->controller . ' n\'a pas de méthode 
                ' . $this->controller->request->action);
        }       
        call_user_func_array(array($this->controller, $this->request->action), $this->request->params);
        $this->controller->render($this->request->action);     
    }
    
    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'Controller'.DS.$this->request->controller.DS.$name.'.php';
        if(file_exists($file)){
            require $file;
        }else{
            return null;
        }
        if(!isset($this->controller)){        
            return new $name($this->request);
        }
        return $this->controller;
    }
    
    public function run_app(){
        return $this->controller;       
    }
}

