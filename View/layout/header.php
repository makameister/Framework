<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="active"><a href=" <?php echo BASE_URL.'/index/index' ?> ">Acceuil</a></li>
        <li><a href=" <?php echo BASE_URL.'/shop/index' ?> ">Magasin</a></li>
        <li><a href=" <?php echo BASE_URL.'/user/index' ?> ">Mon compte</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            echo '<li><a href="'.BASE_URL.'/cart/index/'.'">Mon panier</a></li>';
            if(isset($_session['id'])){
              echo '<li><a href="'.BASE_URL.'/auth/logout'.'">Se deconnecter</a></li>';
            }else{
              echo '<li><a href="'.BASE_URL.'/auth/login'.'"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>';
            }       
        ?>
      </ul>
    </div>
  </div>
</nav>