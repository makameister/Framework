<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h1> Produit </h1>
<p>shop/product</p>

<div class="jumbotron">
    <button><a href="/edsa-social-network/shop/index">Retour</a></button>
    <br>    
    <label for="qte-select">Quantité: </label>
    <select id="qte" name="qte-select">
    <?php
        for($o = 1; $o <= $this->vars["quantite_produit"]; $o++){
            echo "<option value='$o'>$o</option>";
        }
    ?>
    </select>
    <br>
    <button onclick="createURL();"><a id="URL" href="">Ajouter au panier</a></button>
</div>

<input type="hidden" id="id" value="<?php echo $this->vars['id_produit']?>"/>
<input type="hidden" id="base" value=" <?php echo BASE_URL ?>"/>
<script>
    function createURL(){
        var id = document.getElementById('id').value;
        var qte = document.getElementById('qte').value;
        var baseURL = document.getElementById('base').value;
        var url = baseURL + "/cart/addItem/" +id+ "/" +qte;
        document.getElementById('URL').href = url;       
    }
</script>


<pre>
<?php
var_dump($this->vars);
?>
</pre>