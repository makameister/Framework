<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orderModel
 *
 * @author Maka
 */

class orderModel extends Model {
    
    public function createOrder($id, $post){
        $address = $post['adresse'] . '/' . $post['ville'] . '/' . $post['cp'];
        $status = 'En cours';
        $stmt = $this->db->prepare("INSERT INTO commande (id_client, adresse_commande, status_commande) VALUES (:id, :adresse, :status)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':adresse', $address);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $stmt->closeCursor();
    }
    
    public function fillOrder($items, $id){
        $lng = count($items['lib']) -1;
        for($i=0;$i<=$lng;$i++){
            $stmt = $this->db->prepare("INSERT INTO lignecommande (id_commande, id_produit, quantite_commande) VALUES (:idc, :idp, :qte)");
            $stmt->bindParam(':idc', $id);
            $stmt->bindParam(':idp', $items['id'][$i]);
            $stmt->bindParam(':qte', $items['qte'][$i]);
            $stmt->execute();
            $stmt->closeCursor();                   
        }
    }
    
    public function findLastID(){
        return $this->db->lastInsertId();
    }
}
