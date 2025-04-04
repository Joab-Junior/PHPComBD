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

    echo "

        <noscript>

            <a href='../../Inicio.php'> Banco de dados completo, clique aqui para voltar ao inicio </a>

        </noscript>

    
        <script>

            setTimeout(() => {
            
                alert('Banco de dados completo, voltando ao inicio...');
                window.location.href = '../../Inicio.php';
            
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