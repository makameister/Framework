<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orderValidator
 *
 * @author Maka
 */
class orderValidator extends Validator{
    
    public function is_valid($request){
  
        foreach($request as $key => $value){
            if($this->is_not_empty($request[$key]) != null){
                return $this->message . ' : ' . $key;
            }
        }
        return null;
    }
}
