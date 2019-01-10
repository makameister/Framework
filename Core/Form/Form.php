<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form
 *
 * @author Maka
 */

//namespace Model\Form;

class Form {
    
    public $surround = 'p';
    
    protected $form = array();
    protected $data;
    
    protected function openForm($action, $Controller = null){
        if($Controller === null){$Controller = 'auth';}
        return ("<form action='".BASE_URL."/".$Controller."/".$action."' method='POST' name='$action'<br />");
    }

    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }
    
    protected function label($name){
        return ("<label for='$name'>Prenom</label>");
    }
             
    protected function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
 
    protected function input($name, $type, $class = null, $id = null){
        return ("<input type='" . $type . "' name='" . $name . "' value='" . $this->getValue($name) . "' class='" . $class . "' id='" . $id . "'><br />");
    }
    
    protected function submit($class){
        return ("<button type='submit' class='$class'>Envoyer</button>");
    }
    
    protected function closeForm(){
        return ('</form>');
    }
    
    public function setErrorMessage($form, $error) {
        $add = array('error' => $error);
        return array_merge($form, $add);  
    } 
}
