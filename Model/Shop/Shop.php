<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shop
 *
 * @author Maka
 */
require_once 'shopModel.php';

class Shop {
    
    private $model;
    
    public function __construct(){
        $this->model = new shopModel();
    }
    
    public function getItems(){
        return $this->model->findAll();
    }
}
