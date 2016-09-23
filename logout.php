<?php
session_start();
require_once 'lib/eotclass.php';

$user = new User();
$user->logOff();
header('Location:index.php');

 ?>
