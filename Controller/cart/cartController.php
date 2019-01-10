<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cartController
 *
 * @author Maka
 */
class cartController extends Controller {
    
    protected $productId;
    protected $productLib;
    protected $productPrice;
    protected $productQte;
       
    public function index(){
        $this->loadFile('cart');  
        if(!is_null($this->getParam(0))){
            $this->set(array('cart' => $this->cart->getItems(), 'info' => $this->getParam(0)));
        }else{
            $this->set(array('cart' => $this->cart->getItems()));
        }
        $this->render('index');
    }
    
    public function addItem(){ 
        $this->productId = $this->getParam(0);
        $this->productQte = $this->getParam(1);       
        $this->loadfile('Product', 'Product');
        $this->productPrice = $this->Product->getPrice($this->productId);
        $this->productLib = $this->Product->getLib($this->productId);
        $this->loadFile('cart');
        $this->cart->add($this->productId, $this->productLib[0], $this->productPrice[0], $this->productQte);       
        $this->redirect('shop', 'index');        
    }
       
    public function removeItem(){
        $this->loadFile('cart');
        if(!is_null($this->getParam(0))){
            $this->cart->remove($this->getParam(0));
        }
        $this->redirect('cart', 'index');
    }
    
    public function emptyCart(){
        $this->loadFile('cart');
        $this->cart->delete();
        $this->redirect('cart', 'index');
    }
    
}
