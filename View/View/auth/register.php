<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="jumbotron container">
    <h1>Register</h1>
</div>

<div class="jumbotron container">
    <?= $this->vars['openform']; ?>
        <div class="form-group">
            <?= $this->vars['firstname']['label']; ?>
            <?= $this->vars['firstname']['input']; ?>
        </div>
        <div class="form-group">
            <label for="name">Prenom</label>
            <?= $this->vars['name']; ?>       
        </div>
        <div class="form-group">
            <label for="mail">Mail</label>
            <?= $this->vars['mail']; ?>     
        </div>
        <div class="form-group">
            <label for="pass1">Password 1</label>
            <?= $this->vars['password1']; ?>        
        </div>
        <div class="form-group">
            <label for="pass2">password 2</label>
            <?= $this->vars['password2']; ?>        
        </div>
        <p><?= isset($this->vars['error']) ? $this->vars['error'] : null ; ?></p>
        <p><?= $this->vars['submit']; ?></p>
    <?= $this->vars['closeform']; ?>
</div>