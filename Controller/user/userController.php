<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userController extends Controller
{       
    protected $id;
    protected $userData;

    public function index(){
        $this->loadFile('Session', 'Session');
        $this->id = $this->Session->getId();
        if(!is_null($this->id)){
            $this->loadFile('User');
            $this->userData = $this->User->getUser($this->id);
            $this->set($this->userData);
        }else{
            $this->set('info', 'connectez-vous');
        }
        $this->render('index'); 
    }  
}
