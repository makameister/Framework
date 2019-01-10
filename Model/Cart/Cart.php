<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author Maka
 */
class Cart {
      
    public function __construct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['cart']['id'] = array();
            $_SESSION['cart']['lib'] = array();
            $_SESSION['cart']['qte'] = array();
            $_SESSION['cart']['price'] = array();
        }
        return true;
    }
    
    /** 
     * @return type
     */
    public function checkCart(){
        return (!empty($_SESSION['cart']['id'])) ? true : false;
    }
    
    public function getIndex($id){
        return array_search($id, $_SESSION['cart']['id']);
    }
    
    public function inArray($id){
        return (in_array($id, $_SESSION['cart']['id'])) ? true : false;
    }
    
    /**
     * Add a item in the cart
     * @param type $id
     * @param type $lib
     * @param type $price
     * @param type $qte
     */
    public function add($id, $lib, $price, $qte){
        if(!$this->inArray($id)){
            array_push($_SESSION['cart']['id'], $id);
            array_push($_SESSION['cart']['lib'], $lib);
            array_push($_SESSION['cart']['price'], $price);
            array_push($_SESSION['cart']['qte'], $qte);
        }else{
           $key = $this->getIndex($id);
           $_SESSION['cart']['qte'][$key] += $qte;
        }
    }
    
    public function remove($id){
        if($this->inArray($id)){
            $key = $key = $this->getIndex($id);
            array_splice($_SESSION['cart']['id'], $key, 1);
            array_splice($_SESSION['cart']['lib'], $key, 1);
            array_splice($_SESSION['cart']['qte'], $key, 1);
            array_splice($_SESSION['cart']['price'], $key, 1);          
        }
    }
    
    /**
     * 
     */
    public function delete(){
        $_SESSION['cart']['id'] = array();
        $_SESSION['cart']['lib'] = array();
        $_SESSION['cart']['qte'] = array();
        $_SESSION['cart']['price'] = array();
    }
    
    public function getItem($id){
        if($this->inArray($id)){
            $key = $this->getIndex($id);
            return array('id' => $_SESSION['cart']['id'][$key], 'lib' => $_SESSION['cart']['lib'][$key],
                'price' => $_SESSION['cart']['price'][$key], 'qte' => $_SESSION['cart']['qte'][$key]);
        }
        return false;
    }
    
    public function getItems(){
        if($this->checkCart()){
            return $_SESSION['cart'];
        }
        return null;
    }
          
}
