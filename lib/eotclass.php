<?php

function generalAutoLoad($className){
    require_once 'lib/settings.php';
    require_once "lib/". $className. ".php";
}

spl_autoload_register('generalAutoLoad');
session_start();

 ?>
