<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payController
 *
 * @author Maka
 */
class orderController extends Controller {
    
    private $items;
    private $id;
           
    public function index(){
        $this->loadFile('Session', 'Session');
        $this->loadFile('Cart', 'Cart');
        if(!empty($this->Cart->checkCart())){      
            if(!is_null($this->Session->getId())){
                    $this->loadFile('orderForm', 'order', 'Form');
                    $this->set($this->orderForm->init($this->post));     
                    $this->render('index');
            }else{
                $this->redirect('cart', 'index', array('connectez-vous avant'));
            }
        }else{
            $this->redirect('cart', 'index', array('Le panier est vide'));
        }
    }
    
    public function process(){
        $this->post = $_POST;
        $this->loadFile('orderValidator', 'order', 'Validator');       
        $this->error = $this->orderValidator->is_valid($this->post);       
        if($this->error == null){
            //faire paiement
            $payment = true;
            if($payment){
                //creer la commande et la remplir
                $this->loadFile('Cart', 'Cart');
                $this->items = $this->Cart->getItems();
                $this->loadFile('Session', 'Session');
                $this->id = $this->Session->getId();
                $this->loadFile('Order');
                $this->Order->setOrder($this->id, $this->post, $this->items);
                //rétierer le nombre de produit
                $this->loadFile('Product', 'Product');
                $this->Product->update($this->items);
                //vider le panier
                $this->Cart->delete();
                //rediriger index
                $this->redirect('index', 'index'); 
            }else{
                
            }         
        }else{
                       
        }
        //si érreur du formulaire et payment non effectué on revoi au formulaire de payment
        $this->index();
    }
}
