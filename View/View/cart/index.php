<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1> Panier </h1>
<p>user/panier</p>

<div class="jumbotron">
    <h4>Mon panier</h4>
    <div class="container">        
        <?php
            if(!empty($this->vars['cart']['lib'])){
                $lng = count($this->vars['cart']['lib']) -1;
                echo '<table class="table table-bordered table-hover">';
                echo '<tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Total</th><th>Supprimer</th>';
                for($i=0;$i<=$lng;$i++){
                    echo '<tr>';
                        echo '<td>' . $this->vars['cart']['lib'][$i] . '</td>' .
                                '<td>' .  $this->vars['cart']['price'][$i] . '</td>' .
                                '<td>' . $this->vars['cart']['qte'][$i] .'</td>' .
                                '<td>' . ($this->vars['cart']['price'][$i]) * ($this->vars['cart']['qte'][$i]) . '</td>' . 
                                '<td><button><a href="'.BASE_URL.'/cart/removeItem/'.$this->vars['cart']['id'][$i].'">Supprimer</a></button></td>';
                    echo '</tr>';                       
                }
                echo  '</table>';
                echo '<p> Total : </p>';
            }else{
                echo '<p>Votre panier est vide</p>';
            }
        ?>
          
        <?php
            if(isset($this->vars['info'])){
                echo '<p>' . $this->vars['info'] . '</p>';
            }
        ?>
        <button><a href="<?php echo BASE_URL;?>/order/index">Payer</a></button>
        <button><a href="<?php echo BASE_URL;?>/cart/emptyCart">Vider le panier</a></button>
    </div>
</div>

<?php
var_dump($this->vars);