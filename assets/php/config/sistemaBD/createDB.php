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

    echo "

        <noscript>

            <a href='./createTableCliente.php'>Clique aqui para continuar</a>

        </noscript>

    
        <script>

            setTimeout(() => {
            
                alert('Continuando...');
                window.location.href = './createTableCliente.php';
            
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