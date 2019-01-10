<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productController
 *
 * @author Maka
 */
class productController extends Controller {
    
    public function index(){
        $this->loadFile('product');
        if(!is_null($this->getParam(0))){
            $this->req = $this->product->getItem($this->getParam(0));
            $this->set($this->req);
        }else{
            $this->set('info', 'pas d\'id');
        }       
        $this->render('index');
    }
}
