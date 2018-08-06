<?php

define('API_CONNECTOR', true);
include('config/inc.autoload.php');

/*
$format         = filter_input(INPUT_GET, 'format');
if(!in_array($format, array('csv','json'))) {
    $format = '';
} */

$dbConnection   = new DBConnection();
$dbConnector    = $dbConnection->get();
$output         = new OutputFormatter($dbConnector);

echo $output->json();