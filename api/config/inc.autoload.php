<?php



set_include_path("./config");
set_include_path("./includes"); 

function __autoload($classname) {
    $filename = "". $classname .".php";
    include_once($filename);
}

