<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Maka
 */
class Session {
   
    Private static $_sessionStarted = false;
    
    public static function setSession(){
        if(self::$_sessionStarted == false){
            session_start();
            self::$_sessionStarted = true;
        }  
    }
 
    public function getId(){
        if(isset($_SESSION['id'])){
            return $_SESSION['id'];
        }
        return null;
    }
    
    public function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $secondKey = false){
        if($secondKey === true){
            if(isset($_SESSION[$key][$secondKey])){
                return $_SESSION[$key][$secondKey];
            }
        }else{
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }   
            
        }
        return false;
    }
    
    public static function setSessionAttributes($attr){
        //var_dump($attr);
        foreach($attr as $key => $value){
           $_SESSION[$key] = $value;
            echo 'cc';
        }
        //var_dump($_SESSION);
    }
              
    public static function destructSession(){
//        if(self::$_sessionStarted == true){
//            session_start();
            $_SESSION = array();
            session_unset();           
            session_destroy();
//            self::$_sessionStarted = false;
//        } 
    }
    
}
