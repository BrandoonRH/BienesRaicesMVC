<?php 
require '../includes/config/database.php'; 
$db = conectDB(); 

$email = "admin@admin.com"; 
$password = "admin@12345"; 
$passhoesHash = password_hash($password, PASSWORD_BCRYPT); 
$query = "INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passhoesHash}'); ";

echo $query; 
mysqli_query($db, $query); 
exit; 


