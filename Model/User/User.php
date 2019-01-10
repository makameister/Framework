<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Maka
 */
require_once 'userModel.php';

class User {
    
    private $model;
    public $user = array();
    
    public function __construct(){
        $this->model = new userModel;
    }
    
    public function getUser($id){
        return $this->model->findUser($id);
    }
    
    public function getId($mail){
        return $this->model->findId($mail);
    }
    
    public function getPassword($mail){
        return $this->model->findPass($mail);
    }
        
    public function setUser($name, $firstname, $mail, $password){
        $this->model->addUser($name, $firstname, $mail, $password);
    }
       
}
