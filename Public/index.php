<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

define('FPUBLIC', dirname(__FILE__));
define('ROOT', dirname(FPUBLIC));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'Includes.php';

if(!isset($dispatcher)){
    $dispatcher =  new Dispatcher();
}
$dispatcher->run_app();

//echo '<pre>';
//var_dump($dispatcher);
//echo '</pre>';