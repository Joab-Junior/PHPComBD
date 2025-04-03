<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "

        CREATE TABLE fornecedor (

            codigo INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            cnpj VARCHAR(18) NOT NULL,
            ie VARCHAR(18) NOT NULL,
            cep VARCHAR(9) NOT NULL,
            rua VARCHAR(50) NOT NULL,
            numero_rua VARCHAR(10) NOT NULL,
            bairro VARCHAR(100) NOT NULL,
            cidade VARCHAR(21) NOT NULL,
            uf CHAR(2) NOT NULL,
            celular VARCHAR(15) NOT NULL,
            email VARCHAR(100) NOT NULL,
            vendedor VARCHAR(100) NOT NULL

        );
    
    ";

    $conn->exec($sql);
    
    echo "Supplier Table Created successfully";

} catch(PDOException $e) {

    echo "Creation failed: " . $e->getMessage();

}

$conn = null;

?>