<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class shopModel extends Model
{    
    public $configuration = 'default';
    
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM produit");
        $stmt->execute();
        return $stmt->fetchAll();
    }  
}