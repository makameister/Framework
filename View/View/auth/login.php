<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="jumbotron container">
    <h1> login </h1>
    <p>user/login</p>
</div>

<div class="jumbotron container">
    <form name="login" action=" <?php echo BASE_URL."/auth/login/" ?> " method="POST">
        <div class="form-group">
            <label for="mail">Mail</label>
            <?= $this->vars['mail']; ?>     
        </div>
        <div class="form-group">
            <label for="pass1">Password 1</label>
            <?= $this->vars['password']; ?>        
        </div>     
        <p><?= isset($this->vars['error']) ? $this->vars['error'] : null ; ?></p>
        <p><?= $this->vars['submit']; ?></p>
    </form>   
    <div class="row">
      <a href=" <?php echo BASE_URL.'/auth/register' ?> ">Créer un compte</a>
    </div>
</div>
