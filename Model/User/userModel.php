<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userModel extends Model
{    
     
    public function findUser($req){
        $stmt = $this->db->prepare("SELECT * FROM registerTable WHERE id = ?");
        $stmt->execute(array($req[0]));
        //return $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->fetch();
    } 
    
    public function findPass($mail){
        $stmt = $this->db->prepare("SELECT pass FROM registerTable WHERE mail = ?");
        $stmt->execute(array($mail));
        $req = $stmt->fetch();
        $stmt->closeCursor();
        return $req['pass'];
    }
   
    public function findId($mail){
        $stmt = $this->db->prepare("SELECT id FROM registerTable WHERE mail = ?");
        $stmt->execute(array($mail));
        $req = $stmt->fetch();
        return $req['id'];
    }

    public function addUser($name, $firstname, $mail, $password){
        $stmt = $this->db->prepare("INSERT INTO registerTable (nom, prenom, mail, pass) VALUES (:nom, :prenom, :mail, :pass)");
        $stmt->bindParam(':nom', $name);
        $stmt->bindParam(':prenom', $firstname);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
        $stmt->closeCursor();
    }
}