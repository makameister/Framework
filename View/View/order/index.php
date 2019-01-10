<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1> Paiement </h1>
<p>pay/index</p>


<div class="jumbotron">
    <h4>Paiement</h4>
    <div class="container">
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
            <label for="adresse">Mail</label>
            <?= $this->vars['adresse']; ?>     
        </div>
        <div class="form-group">
            <label for="cp">code postal</label>
            <?= $this->vars['cp']; ?>        
        </div>
        <div class="form-group">
            <label for="ville">ville</label>
            <?= $this->vars['ville']; ?>        
        </div>
        <div class="form-group">
            <label for="carte">carte</label>
            <?= $this->vars['carte']; ?>        
        </div>
        <div class="form-group">
            <label for="code">code</label>
            <?= $this->vars['code']; ?>        
        </div>
        <p><?= isset($this->vars['error']) ? $this->vars['error'] : null ; ?></p>
        <p><?= $this->vars['submit']; ?></p>
    <?= $this->vars['closeform']; ?>
    </div>
</div>
    

<?php

var_dump($this->vars);