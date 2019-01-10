<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="jumbotron">
    <h1> Magasin </h1>
    <p>shop/index</p>
</div>

<div class="container-fluid">

    <div class="col-sm-2">
        
    </div>

    <div class="col-sm-10">
        <?php
        $i = 1;
        foreach ($this->vars as $row) {

            $qte = "qte" . $row["id_produit"];
            $price = "pr" . $row["prix_produit"];

            if ($i % 3 == 1 || $i == 1) {
                    //echo '<div class="container">';
                    echo "<div class='row'>";
            }
        ?>
            <div class="col-sm-4">

                <div class="panel panel-primary">

                    <div class="panel-heading"><a href="<?php echo BASE_URL."/product/index/".$row['id_produit']?>"> <?php echo $row["nom_produit"]; ?></a></div>
                    <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>

                    <div class="panel-footer">


                        <p>Prix au kilo :<span id="<?php echo $price ?>"><?php echo $row["prix_produit"]; ?></span></p>                       

                        <p>Quantité : <span id="qte-max"><?php echo $row["quantite_produit"]; ?></span></p>

                        <div class="container-fluid text-center">

                            <label for="qte-select">Quantité: </label>
                            <select id="<?php echo $qte ?>" name="qte-select">
                            <?php
                                for($o = 1; $o <= $row["quantite_produit"]; $o++){
                                    echo "<option value='$o'>$o Kg</option>";
                                }
                            ?>
                            </select><br>

                            <button type="button" class="add-to-cart" id="<?php echo $row["id_produit"]; ?>" name="<?php echo $row["nom_produit"]; ?>"
                                    data="<?php echo $row["prix_produit"]; ?>" url="" onclick="createLine(id, name);">Ajouter au panier</button>

                        </div>

                    </div>

                </div>

            </div>
        <?php
            if ($i % 3 == 0 || $i == 3) {
                    //echo "</div>";
                    echo "</div><br>";
            }
            $i ++;
        }
        ?>
    </div>
<div>