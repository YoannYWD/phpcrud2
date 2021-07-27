<?php 

$dsn = "mysql:host=localhost;dbname=footballclub";
$username = "root";
$password = "Arinfo/2021";
$options = [];
$connection = new PDO($dsn, $username, $password, $options);
try {

} catch(PDOException $e) {
    print "error : " . $e->getMessage();
    die();
}

?>
