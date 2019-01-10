<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model
{  
    public $configuration = 'default';
    static $connexion;
    public $db;
    
    public function __construct(){
//        $conf = config::$database[$this->configuration];
        if(isset(Model::$connexion)){
            $this->db = Model::$connexion;
            return true;
        }
        try{
//            $pdo = new PDO("mysql:host=".$conf['host'].";dbname=".$conf['database'].";".$conf['login'].",".'');
            $pdo = new PDO('mysql:host=localhost;dbname=dbOne;charset=utf8', 'root', '');                
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            Model::$connexion = $pdo;
            $this->db = $pdo;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
