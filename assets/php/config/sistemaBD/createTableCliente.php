<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "

        CREATE TABLE cliente (

            codigo INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            cpf VARCHAR(14) NOT NULL,
            rg VARCHAR(12) NOT NULL,
            cep VARCHAR(9) NOT NULL,
            rua VARCHAR(50) NOT NULL,
            numero_rua VARCHAR(10) NOT NULL,
            bairro VARCHAR(100) NOT NULL,
            cidade VARCHAR(21) NOT NULL,
            uf CHAR(2) NOT NULL,
            celular VARCHAR(15) NOT NULL,
            email VARCHAR(100) NOT NULL

        );

    ";

    $conn->exec($sql);
    
    echo "Client Table Created successfully";

    echo "

        <noscript>

            <a href='./createTableFornecedor.php'> Clique aqui para continuar </a>

        </noscript>

    
        <script>

            setTimeout(() => {
            
                alert('Continuando...');
                window.location.href = './createTableFornecedor.php';
            
            }, 2000);

        </script>

    ";

} catch(PDOException $e) {

    echo "Creation failed: " . $e->getMessage();

    echo "

        <noscript>

            <a href='../../Inicio.php'>Clique aqui para voltar ao inicio</a>
            
        </noscript>
    
        <script>

            setTimeout(() => {
            
                alert('Voltando ao inicio...');
                window.location.href = '../../Inicio.php';
            
            }, 2000);

        </script>

    ";

}

$conn = null;

exit;

?>