<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filter
 *
 * @author Maka
 */

class Validator{
    
    const IS_EMPTY = 'Le champs est vide';
    const IS_DIGIT = 'Le champ doit contenir un nombre';
    const BOTH_VALID = 'Les deux mots de passe doivent conrrespondre';
    
    protected $firstname;
    protected $name;
    protected $mail;
    protected $password1;
    protected $password2;
    
    protected $status = true;
    protected $message;
    
    protected function is_not_empty($str){
        return empty($str) ? $this->message = self::IS_EMPTY : $this->message = null;
    }
    
    protected function is_digit(){
        
    } 
    
    protected function is_valid_text(){

    }
    
    protected function is_valid_mail(){

    }
    
    protected function is_valid_password(){
        
    }
    
    protected function is_valid_both_password($pass1, $pass2){
//        return ($this->password1 === $this->password2) ? $this->message = self::BOTH_VALID : $this->message = null;
        return ($pass1 !== $pass2) ? $this->message = self::BOTH_VALID : $this->message = null;
    }   
    
}
