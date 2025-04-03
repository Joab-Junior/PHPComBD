<?php

$servername = "localhost";
$username = "root";
$password = "";

try {

    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE sistema";

    $conn->exec($sql);

    echo "Database created successfully";

} catch(PDOException $e) {

    echo "Creation failed: " . $e->getMessage();

}

$conn = null;

?>