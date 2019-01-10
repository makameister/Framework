<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authController
 *
 * @author Maka
 */
class authController extends Controller {
    
    private $pass;
    private $id;
    protected $post;
        
    public function login(){
//        $this->loadFile('loginForm');
        $this->loadFile('loginForm', 'login', 'Form');
        $this->post = $_POST;
        $this->form = $this->loginForm->init($this->post);             
        if(!empty($this->post)){
            $this->loadFile('loginvalidator', 'login', 'Validator');           
            $this->error = $this->loginvalidator->is_valid($this->post);
            if($this->error == null){
                $this->loadfile('user', 'user');
                $this->pass = $this->user->getPassword($this->post['mail']);
                if($this->post['password'] === $this->pass){
                    $this->id = $this->user->getId($this->post['mail']);
                    $this->loadFile('Session', 'Session');
                    $this->Session->setsession();
                    $this->Session->set('id', $this->id);
                    $this->redirect('user', 'index');                
                }else{
                    $this->form = $this->loginForm->setErrorMessage($this->form, 'Mot de passe ou mail incorrect');
                }
            }else{
                $this->form = $this->loginForm->setErrorMessage($this->form, $this->error);
            }
        }       
        $this->set($this->form);
        $this->render($this->getAction());
    }
    
    public function logout(){
        $this->loadFile('Session', 'Session');
        $this->Session->destructSession();
        $this->redirect('index', 'index');
    }
       
    public function register(){
        $this->loadFile('registerForm', 'register', 'Form');
        $this->post = $_POST;
        $this->form = $this->registerForm->init($this->post);                      
        if(!empty($this->post)){
            $this->loadFile('registervalidator', 'register', 'Validator');           
            $this->error = $this->registervalidator->is_valid($this->post);
            if($this->error == null){
                $this->loadFile('user', 'user');
                //Vérifier si l'adresse mail est déjàa utilisée ? champs unique
                $this->user->setUser($this->post['name'], $this->post['firstname'], $this->post['mail'], $this->post['password1']);
                $this->redirect('auth', 'login');
            }else{
                $this->form = $this->registerForm->setErrorMessage($this->form, $this->error);
            }
        }
        $this->set($this->form);
        $this->render('register');
    }
}
