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
            
            <h1> Consulta do Fornecedor </h1>

            <div class="divContent">

                <?php

                    include_once('../config/connection.php');

                    try {

                        $select = $conn->prepare('SELECT * FROM fornecedor');
                        $select->execute();

                        while($row = $select->fetch()) {

                            echo "<br><b>Codigo: </b>".$row['codigo'];
                            echo "<br><b>Nome: </b>".$row['nome'];
                            echo "<br><b>CNPJ: </b>".$row['cnpj'];
                            echo "<br><b>I.E: </b>".$row['ie'];
                            echo "<br><b>CEP: </b>".$row['cep'];
                            echo "<br><b>Rua: </b>".$row['rua'];
                            echo "<br><b>Número: </b>".$row['numero_rua'];
                            echo "<br><b>Bairro: </b>".$row['bairro'];
                            echo "<br><b>Cidade: </b>".$row['cidade'];
                            echo "<br><b>UF: </b>".$row['uf'];
                            echo "<br><b>Celular: </b>".$row['celular'];
                            echo "<br><b>Email: </b>".$row['email'];
                            echo "<br><b>Vendedor: </b>".$row['vendedor'];
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