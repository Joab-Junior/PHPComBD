<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "

        CREATE TABLE usuario (

            codigo INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(50) NOT NULL,
            senha VARCHAR(20) NOT NULL,
            nome_funcionario VARCHAR(100) NOT NULL
            
        );
            
    ";

    $conn->exec($sql);
    
    echo "User Table Created successfully";

} catch(PDOException $e) {

    echo "Creation failed: " . $e->getMessage();

}

$conn = null;

?>