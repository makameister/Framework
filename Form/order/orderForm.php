<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payForm
 *
 * @author Maka
 */

class orderForm extends Form {
    
    protected $form = array();
    protected $data;
   
    public function init($data = array()){       
        $this->data = $data;
        return $this->setForm();
    }
    
    protected function setForm() {   
        return $this->form = array(
                'openform' => $this->openForm('process', 'order'),
                'firstname' => array(
                   'label' => $this->label('firstname'),
                   'input' => $this->input('firstname', 'text', 'form-control')
                ),
                'name' => $this->input('name', 'text', 'form-control'),
                'mail' => $this->input('mail', 'text', 'form-control'),
                'adresse' => $this->input('adresse', 'text', 'form-control'),
                'cp' => $this->input('cp', 'text', 'form-control'),
                'ville' => $this->input('ville', 'text', 'form-control'),
                'carte' => $this->input('carte', 'text', 'form-control'),
                'code' => $this->input('code', 'text', 'form-control'),
                'submit' => $this->submit('btn btn-primary'),
                'closeform' => $this->closeForm()
            );
    }
    
}
