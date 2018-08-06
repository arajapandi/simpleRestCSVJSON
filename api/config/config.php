<?php

defined('API_CONNECTOR') || die("");



class Config {
    
    private static $_config = null;

    static function get($key = null)
    {
        
        if(empty(self::$_config)) {
            self::$_config = require "inc.config.php";
        }
        
        if(!empty($key) && !empty(self::$_config)) {
            return isset(self::$_config[$key]) ? self::$_config[$key] : null;
        }
        
        return self::$_config;
    }
}