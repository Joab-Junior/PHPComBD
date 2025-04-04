<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">
    
    <title>Consulta Cliente</title>

</head>

<body>

    <main class="mainConsult">

        <div class="divConsult">
            
            <h1> Consulta do Usuário </h1>

            <div class="divContent">

                <?php

                    include_once('../../config/connection.php');

                    try {

                        $select = $conn->prepare('SELECT * FROM usuario');
                        $select->execute();

                        while($row = $select->fetch()) {

                            echo "<br><b>Codigo: </b>".$row['codigo'];
                            echo "<br><b>Usuário: </b>".$row['usuario'];
                            echo "<br><b>Senha: </b>".$row['senha'];
                            echo "<br><b>Funcionário: </b>".$row['nome_funcionario'];
                            echo "<br>";

                        }

                    } catch(PDOException $e) {

                        echo 'ERROR: ' . $e->getMessage();

                    }

                ?>

            </div>
            
        </div>

        <a class="aBackButton" href="../Inicio.php"> Voltar </a>

    </main> 

</body>

</html>