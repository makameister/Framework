<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginForm
 *
 * @author Maka
 */
class loginForm extends Form {
    
    protected $form = array();
    protected $data;
    
    /*
     * On ne passe pas par le constructeur du au fait du charegement de la classe
     *  et l'envoie des donné au constructeur
     */
    public function init($data = array()){       
        $this->data = $data;
        return $this->setForm();
    }
    
    protected function setForm() {   
        return $this->form = array(
                'mail' => $this->input('mail', 'text', 'form-control'),
                'password' => $this->input('password', 'text', 'form-control'),
                'submit' => $this->submit('btn btn-primary'),
            );
    }
}
