<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "

        CREATE TABLE produto (

            codigo INT AUTO_INCREMENT PRIMARY KEY,
            codigo_produto VARCHAR(50) NOT NULL,
            nome_produto VARCHAR(100) NOT NULL,
            categoria VARCHAR(50) NOT NULL,
            descricao TEXT NOT NULL,
            preco_compra DECIMAL(10, 2) NOT NULL,
            quantidade INT NOT NULL,
            data_compra DATE NOT NULL,
            data_validade DATE NOT NULL,
            fornecedor VARCHAR(100) NOT NULL
            
        );

    ";

    $conn->exec($sql);
    
    echo "Product Table Created successfully";

} catch(PDOException $e) {

    echo "Creation failed: " . $e->getMessage();

}

$conn = null;

?>