<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Router
{
    //ajout config fonction de l'url
    
    public static function parse($url, $request){
        $r = trim($url, '/');
        $params = explode('/', $r);
        $request->controller = isset($params[1]) ? $params[1] : 'index';
        $request->action = isset($params[2]) ? $params[2] : 'index';
        $request->params = array_slice($params, 3);
    }
}
