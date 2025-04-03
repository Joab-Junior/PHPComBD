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
            
            <h1> Consulta dos Produtos </h1>

            <div class="divContent">

                <?php

                    include_once('../config/connection.php');

                    try {

                        $select = $conn->prepare('SELECT * FROM produto');
                        $select->execute();

                        while($row = $select->fetch()) {

                            echo "<br><b>Codigo: </b>".$row['codigo'];
                            echo "<br><b>ID do Produto: </b>".$row['codigo_produto'];
                            echo "<br><b>Nome do Produto: </b>".$row['nome_produto'];
                            echo "<br><b>Categoria: </b>".$row['categoria'];
                            echo "<br><b>Descrição: </b>".$row['descricao'];
                            echo "<br><b>Preço de Compra: </b>".$row['preco_compra'];
                            echo "<br><b>Quantidade: </b>".$row['quantidade'];
                            echo "<br><b>Data de Compra: </b>".$row['data_compra'];
                            echo "<br><b>Data de Validade: </b>".$row['data_validade'];
                            echo "<br><b>Fornecedor: </b>".$row['fornecedor'];
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