<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h1> Utilisateur </h1>
<p>user/index</p>

<pre>
<?php
if(isset($this->vars)){
    print_r($this->vars);
}else{
    echo 'pas d\'id';
}
?>
</pre>