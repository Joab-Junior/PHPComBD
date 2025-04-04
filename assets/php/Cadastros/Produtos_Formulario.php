<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">

    <title> Funcionário Formulário </title>

</head>

<body>

    <main class="mainForms">

        <h1> CADASTRO DE PRODUTOS </h1>

        <form class="formBase" action="" method="post">

            <label for="idProduto"> Código do Produto: </label>
            <input required class="inputForms" name="idProduto" type="text" id="idProduto" placeholder="Digite o código do produto...">

            <label for="nomeProduto"> Nome do Produto: </label>
            <input required class="inputForms" name="nomeProduto" type="text" id="nomeProduto" placeholder="Digite o nome do produto...">

            <label for="categoria"> Categoria: </label>
            <input required class="inputForms" name="categoria" type="text" id="categoria" maxlength="30" placeholder="Digite a categoria do produto...">

            <label for="descricao"> Descrição: </label>
            <textarea required class="inputForms" name="descricao" id="descricao" placeholder="Digite a descrição do produto..."></textarea>

            <label for="precoDeCompra"> Preço de Compra: </label>
            <input required class="inputForms" name="precoDeCompra" type="number" id="precoDeCompra" min="1" placeholder="Digite o preço de compra do produto...">

            <label for="quantidade"> Quantidade: </label>
            <input required class="inputForms" name="quantidade" type="number" id="quantidade" min="1" placeholder="Digite a quantidade do produto...">

            <label for="dataCompra"> Data de Compra: </label>
            <input required class="inputForms" name="dataCompra" type="date" id="dataCompra" placeholder="Digite a data da compra do produto...">

            <label for="dataValidade"> Data de Validade: </label>
            <input required class="inputForms" name="dataValidade" type="date" id="dataValidade" placeholder="Digite a data de validade do produto...">

            <label for="fornecedor"> Fornecedor: </label>
            <input required class="inputForms" name="fornecedor" type="text" id="fornecedor" placeholder="Digite o fornecedor...">

            <div class="divRegisterAndClear">

                <button class="buttonFormsRegister" type="submit"> Cadastrar </button>
                <button class="buttonFormsClear" type="button" onclick="cleanForm()"> Limpar </button>

            </div>

            <a class="aBackButton" href="../Inicio.php"> Voltar </a>

            <?php
                // PHP para processar os dados dos usuários, irei explicar cada coisa
                
                // Faz o PHP processar na mesma página em vez de mandar pra outra
                if (!empty($_POST)) {

                    // Criando uma array associativo, ou seja, array que utiliza índices personalizados, para puxar os dados e o tipo de cadastro
                    $product = array(

                        /* O "htmlspecialchars()" serve para que os dados fiquem encriptados, ou seja, segurança a mais contra ataques, 
                        não é necessário nessa lição, mas é indispensável para o nosso TCC */
                        "produtoId" => htmlspecialchars($_POST['idProduto']),
                        "produtoNome" => htmlspecialchars($_POST['nomeProduto']),
                        "categoria" => htmlspecialchars($_POST['categoria']),
                        "descricao" => htmlspecialchars($_POST['descricao']),
                        "precoDeCompra" => htmlspecialchars($_POST['precoDeCompra']),
                        "quantidade" => htmlspecialchars($_POST['quantidade']),
                        "dataDeCompra" => htmlspecialchars($_POST['dataCompra']),
                        "dataDeValidade" => htmlspecialchars($_POST['dataValidade']),
                        "fornecedor" => htmlspecialchars($_POST['fornecedor'])

                    );

                    include_once('../../config/connection.php');

                    if ($conn) {

                        try {

                            $stmt = $conn->prepare("INSERT INTO produto(codigo_produto, nome_produto, categoria, descricao, preco_compra, quantidade, data_compra, data_validade, fornecedor) VALUES(:produtoId, :produtoNome, :categoria, :descricao, :precoDeCompra, :quantidade, :dataDeCompra, :dataDeValidade, :fornecedor)");
    
                            $stmt->bindParam(':produtoId', $client['produtoId']);
                            $stmt->bindParam(':produtoNome', $client['produtoNome']);
                            $stmt->bindParam(':categoria', $client['categoria']);
                            $stmt->bindParam(':descricao', $client['descricao']);
                            $stmt->bindParam(':precoDeCompra', $client['precoDeCompra']);
                            $stmt->bindParam(':quantidade', $client['quantidade']);
                            $stmt->bindParam(':dataDeCompra', $client['dataDeCompra']);
                            $stmt->bindParam(':dataDeValidade', $client['dataDeValidade']);
                            $stmt->bindParam(':fornecedor', $client['fornecedor']);
    
                            $stmt->execute();
    
                            // Cria uma variável vazia, ela será utilizado para mostrar os dados cadastrados
                            $show = "";
    
                            // Loop para percorrer a nossa array do cadastro
                            foreach ($client as $attribute => $value) {
    
                                /* Fazendo a mesma coisa, mas só que para mostrar os dados na tela, por que eu não utilizo a mesma variável? 
                                Porque a organização de uma e de outra estão diferentes */
                                $show .= "<p> " . strtoupper($attribute) . ": $value </p>";
    
                            }
    
                            // Mostrar um alerta de sucesso
                            echo "<script> alert('Dados cadastrados com sucesso!'); </script>";
    
                            // Mostra os dados cadastrados
                            echo "
                            
                                <div class='divRegisteredData'>
    
                                    <h3> Dados Cadastrados </h3>

                                    $show
                                
                                </div>

                            ";
    
    
                            echo "
                                <script>
    
                                    setTimeout(() => {
    
                                        alert('Voltando...');
    
                                        setTimeout(() => { window.location.href = '../Inicio.php'; }, 5000)
    
                                    }, 10000);
    
                                </script>"
                            ;
    
                        } catch(PDOException $e) {
    
                            // Mostra um alerta de erro caso haja algum erro no cadastro
                            echo "<script> alert('Erro ao se cadastrar!'); </script>";
                            echo "Erro ao cadastrar: " . $e->getMessage();
    
                        }

                    } else {

                        die("Erro na conexão com o banco de dados.");

                    }

                    $conn = null;

                }

            ?>

        </form>

    </main>

    <!-- Esse arquivo só precisa desse Script! -->
    <script src="../../js/Forms.js"></script>

</body>

</html>