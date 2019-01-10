<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerFilter
 *
 * @author Maka
 */

class registerValidator extends Validator {
    
    protected $firstname;
    protected $name;
    protected $mail;
    protected $password1;
    protected $password2;
    
    public function is_valid($request){
        foreach($request as $key => $value){
            if($this->is_not_empty($request[$key]) != null){
                return $this->message . ' : ' . $key;
            }
        }
        if($this->is_valid_both_password($request['password1'], $request['password2']) != null){
            return $this->message;
        }
        return null;
    }
}
