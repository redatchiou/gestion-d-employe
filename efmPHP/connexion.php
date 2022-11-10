<?php
$dsn = 'mysql:host=localhost;dbname=gestionproduit_v2';
$username = 'root';
$password = 'root';

try {
$connection = new PDO($dsn, $username, $password);


}
catch(PDOException $e) {
echo 'reda non  coneecte';
    
    
}
