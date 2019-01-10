<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Maka
 */
require_once 'orderModel.php';

class Order {
    
    private $model;
    private $orderId;
    
    public function __construct(){
        $this->model = new orderModel();
    }
    
    public function getOrders(){
        
    }
    
    public function getOrder(){
        
    }
    
    public function getlastOrderID(){
        return $this->model->findLastID();
    }
    
    /**
     * 
     * @param type $id
     * @param type $post
     * @param type $items
     */
    public function setOrder($id, $post, $items){
        $this->model->createOrder($id, $post);
        $this->orderId = $this->getlastOrderID();
        $this->model->fillOrder($items, $this->orderId);
    }
}
