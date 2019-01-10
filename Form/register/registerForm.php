<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerForm
 *
 * @author Maka
 */

class registerForm extends Form {
    
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
                'openform' => $this->openForm('register'),
                'firstname' => array(
                   'label' => $this->label('firstname'),
                   'input' => $this->input('firstname', 'text', 'form-control')
                ),
                'name' => $this->input('name', 'text', 'form-control'),
                'mail' => $this->input('mail', 'text', 'form-control'),
                'password1' => $this->input('password1', 'text', 'form-control'),
                'password2' => $this->input('password2', 'text', 'form-control'),
                'submit' => $this->submit('btn btn-primary'),
                'closeform' => $this->closeForm()
            );
    }
     
}
