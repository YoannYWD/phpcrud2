<?php
include "./head.php";
?>

<?php 

$dsn = "mysql:host=localhost;dbname=footballclub";
$username = "root";
$password = "Arinfo/2021";
$options = [];
$connection = new PDO($dsn, $username, $password, $options);
try {
    print "Connexion réussie";
} catch(PDOException $e) {
    print "error : " . $e->getMessage();
    die();
}

?>
