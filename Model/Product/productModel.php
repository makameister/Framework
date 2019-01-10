<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productModel
 *
 * @author Maka
 */
class productModel extends Model {
    
    public function findItem($id){
        $stmt = $this->db->prepare("SELECT * FROM produit where id_produit = $id;");
        $stmt->execute();
        $req = $stmt->fetch();
        $stmt->closeCursor(); 
        return $req;
    }
    
    public function findPrice($id){
        $stmt = $this->db->prepare("SELECT prix_produit FROM produit where id_produit = $id;");
        $stmt->execute();
        $req = $stmt->fetch();
        $stmt->closeCursor(); 
        return $req;
    }
    
    public function findLib($id){
        $stmt = $this->db->prepare("SELECT nom_produit FROM produit where id_produit = $id;");
        $stmt->execute();
        $req = $stmt->fetch();
        $stmt->closeCursor(); 
        return $req;
    }
    
    public function findQte($id){
//        $stmt = $this->db->prepare("SELECT * FROM registerTable WHERE id = ?");
//        $stmt->execute(array($id));
        $stmt = $this->db->prepare("SELECT quantite_produit FROM produit where id_produit = $id;");
        $stmt->execute();
        $req = $stmt->fetch();
        $stmt->closeCursor(); 
        return $req["quantite_produit"]; 
    }
    
    public function update($items){       
        $lng = count($items['lib']) -1;
        for($i=0;$i<=$lng;$i++){
            $id = $items['id'][$i];
            $qte = $this->findQte($id);
            $newQte = $qte - $items['qte'][$i];           
            $stmt = $this->db->prepare('UPDATE produit SET quantite_produit = ? WHERE id_produit = ?;');
            $stmt->execute(array(
                $newQte,
                $id               
                    ));
            $stmt->closeCursor();                   
        }
    }
}
