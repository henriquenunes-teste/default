<?php
abstract class Controller{
    function view($view, $data){
        extract($data);
        include "view/template.php";
    }

    function redirect($caminho){
        header("location:".APP."/".$caminho);
    }
}