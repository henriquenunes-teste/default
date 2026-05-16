<?php

class Config {
    public static function get_config(){
        $json = file_get_contents("config.json");

        return json_decode($json,true);
    }
}

?>