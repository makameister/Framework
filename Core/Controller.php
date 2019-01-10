<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 */
class Controller
{
    public $request; 
       
    private $vars = array();
    protected $layout = 'default';
    private $rendered = false;
    
    protected $form = array();
    protected $post = array();
    protected $req = array();
    protected $error;
    
    public $userId;
      
    public function __construct($request, $user = null){
        $this->request = $request;
        $this->user = $user;
    }
    
    /**
     * @param type $view
     * @return boolean
     */
    public function render($view){
        if($this->rendered){return false;}
        extract($this->vars);
        if(strpos($view, '/') === 0){
            $view = ROOT.DS.'View/View'.$view.'.php';
        }else{
            $view = ROOT.DS.'View/View'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require $view;
        $content = ob_get_clean();
        require ROOT.DS.'View'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = true;
    }
    
    /**
     * @param type $template
     */
    public function setTemplate($template){
        $this->layout = $template;
    }
    
    /**
     * @param type $key
     * @param type $value
     */
    public function set($key, $value = null){
        if(is_array($key)){
            $this->vars += $key;
        }else{
            $this->vars[$key] = $value;
        }
    }

    /**
     * @return type
     */
    public function getURL(){
        return $this->request->url;
    }

    /**
     * @return type
     */
    public function getController(){
        return $this->request->controller;
    }

    /**
     * @return type
     */
    public function getAction(){
        return $this->request->action;
    }
    
    /**
     * @return type
     */
    public function getParams(){
        return $this->request->params;
    }
    
    /**
     * @param type $param
     * @return type
     */
    public function getParam($param){
        if(!empty($this->request->params)){
            return $this->request->params[$param];
        }
        return null;
    }
    
    /**
     * @param type $controller
     * @param type $action
     * @param type $args
     */
    public function redirect($controller,$action = "index",$args = array()){
        $location = BASE_URL . "/" . $controller . "/" . $action . "/" . implode("/",$args);
        header("Location: " . $location);
        exit;
    }
          
    /*
     * @param type $name
     * @param type $folder
     * @param string $mainfoler
     */
    public function loadFile($name, $folder = null, $mainfoler = null){
        if(is_null($folder)){$folder = $this->getController();}
        if(is_null($mainfoler)){$mainfoler = 'Model';}
        $file = ROOT.DS.$mainfoler.DS.$folder.DS.$name.'.php';
        require_once $file;
        if(!isset($this->name)){
            $this->$name = new $name();
        }
    }
    
    /** 
     * @param type $message
     */
    function error($message){
       header("HTTP/1.0 404 Not Found");
       $controller = new controller($this->request);
       $controller->set('message', $message);
       $controller->render('/errors/404');
       die();
    }
    
    /**
     * @param type $message
     */
    public function internalError($message){
       $this->set('message', $message);
       $this->render('/errors/404');
       die();
    }    
}