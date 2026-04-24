<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

define('APP','http://localhost/saborLoja');

include "autoload.php";

if(isset($_GET["url"]) && !empty($_GET["url"]) && $_GET["url"] != "index"){
    $url = $_GET["url"];
}else{
    $url = "index/index";
}

$parametros = explode("/",$url);




$nomeControlador = ucfirst($parametros[0]).'Controller';
$acao = $parametros[1];

$controller = new $nomeControlador();

if(count($parametros) == 2){
    $controller->$acao();
}else{
    $id = $parametros[2];
    $controller->$acao($id);
}




