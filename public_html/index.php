<?php 

    require_once "../vendor/autoload.php";

    if (!$_GET['url']) {
        throw new Exception("Erro ao acessar a url");
       
    }

    $url = explode('/', $_GET['url']);
   
    if ($url[0] !== "api") {
        throw new Exception("Erro ao acessar API (/api...)"); 
    }
    
    //Entrada para controladores