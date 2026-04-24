<?php

spl_autoload_register(function ($classes){
    $directories = [
        "controller/","model/","system/"
    ];

    foreach($directories as $directory){
        if(file_exists($directory.$classes.".php")){
            require_once $directory.$classes.".php";
            return;
        }
    }
});