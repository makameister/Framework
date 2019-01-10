<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class shopController extends Controller{
      
    public function index(){
        $this->loadFile('shop');
        $this->req = $this->shop->getItems();
        $this->set($this->req);
        $this->render('index');
    }

}
