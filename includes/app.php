<?php
 
  require 'functions.php'; 
  require 'config/database.php'; 
  require __DIR__ . '/../vendor/autoload.php';
 
//Conectarnos a la Base de Datos   
$db = conectDB();

use Model\ActiveRecord; 

ActiveRecord::setDB($db); 

?>
