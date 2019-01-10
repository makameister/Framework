<?php
@session_start();
if(isset($_SESSION['id'])){
//    setcookie('id', $_SESSION['id']);
//    echo '<pre>';
//    var_dump($_SESSION) . '<br>';
//    echo '</pre>';
//    var_dump($_COOKIE) . '<br>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <!-- <link href="css/bootstrap.css" rel="stylesheet" /> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body{
                background-color: #DCDCDC;
                font-family: sans-serif;
            }
            .entete-image {
                padding: 5%;
                text-align: center;
                background: #1abc9c;
                color: white;
                font-size: 50px;               
            }
        </style>
    </head>        
    <body>
        <div class="entete-image">
            <h1>UT1online</h1>
        </div>
    	<?php 
            require_once('header.php');
            echo $content;
            require_once('footer.php'); 
        ?>
    </body>
</html>

