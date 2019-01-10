<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Items
 *
 * @author Maka
 */
require_once 'productModel.php';

class Product {
    
    private $model;
    
    public function __construct(){
        $this->model = new productModel();
    }
    
    public function getItem($id){
        return $this->model->findItem($id); 
    }
    
    public function getPrice($id){
        return $this->model->findPrice($id); 
    }
    
    public function getLib($id){
        return $this->model->findLib($id); 
    }
    
    public function getQte($id){
        return $this->model->findQte($id);
    }

    public function update($items){
        $this->model->update($items);
    }
}
