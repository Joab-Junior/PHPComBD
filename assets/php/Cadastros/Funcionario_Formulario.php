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

        <h1> CADASTRO DE FUNCIONÁRIO </h1>

        <form class="formBase" action="" method="post" onsubmit="return validateForm()">

            <label for="nome"> Nome: </label>
            <input required class="inputForms" name="nome" type="text" id="nome" placeholder="Digite seu nome...">

            <label for="cpf"> CPF: </label>
            <input required class="inputForms" name="cpf" type="text" id="cpf" maxlength="14" placeholder="Digite seu CPF...">

            <label for="rg"> RG: </label>
            <input required class="inputForms" name="rg" type="text" id="rg" maxlength="12" placeholder="Digite seu número do RG...">

            <label for="cep"> CEP: </label>
            <input
            
                required
                class="inputForms"
                name="cep"
                type="text"
                id="cep"
                value=""
                size="10"
                maxlength="9"
                onblur="pesquisacep(this.value);"
                placeholder="Digite seu CEP..."
            
            >

            <label for="rua"> Rua: </label>
            <input required class="inputForms" name="rua" type="text" id="rua" maxlength="40" placeholder="Digite sua rua...">

            <label for="num"> N°: </label>
            <input required class="inputForms" name="num" type="number" id="num" min="1" max="99999" placeholder="Digite o número...">

            <label for="bairro"> Bairro: </label>
            <input required class="inputForms" name="bairro" type="text" id="bairro" maxlength="40" placeholder="Digite seu bairro...">

            <label for="cidade"> Cidade: </label>
            <input required class="inputForms" name="cidade" type="text" id="cidade" maxlength="40" placeholder="Digite sua cidade...">

            <label for="uf"> UF: </label>
            <input required class="inputForms" name="uf" type="text" id="uf" maxlength="2" placeholder="Digite seu estado...">

            <label for="celular"> Celular: </label>
            <input required class="inputForms" name="celular" type="tel" id="celular" maxlength="15" placeholder="Digite seu celular...">

            <label for="email"> Email: </label>
            <input required class="inputForms" name="email" type="email" id="email" maxlength="60" placeholder="Digite seu email...">

            <label for="data"> Data de Admissão: </label>
            <input required class="inputForms" name="data" type="date" id="data">

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
                    $functionary = array(

                        /* O "htmlspecialchars()" serve para que os dados fiquem encriptados, ou seja, segurança a mais contra ataques, 
                        não é necessário nessa lição, mas é indispensável para o nosso TCC */
                        "nome" => htmlspecialchars($_POST['nome']),
                        "cpf" => htmlspecialchars($_POST['cpf']),
                        "rg" => htmlspecialchars($_POST['rg']),
                        "cep" => htmlspecialchars($_POST['cep']),
                        "rua" => htmlspecialchars($_POST['rua']),
                        "numero" => htmlspecialchars($_POST['num']),
                        "bairro" => htmlspecialchars($_POST['bairro']),
                        "cidade" => htmlspecialchars($_POST['cidade']),
                        "uf" => htmlspecialchars($_POST['uf']),
                        "celular" => htmlspecialchars($_POST['celular']),
                        "email" => htmlspecialchars($_POST['email']),
                        "data" => htmlspecialchars($_POST['data'])

                    );

                    include_once('../../config/connection.php');

                    if ($conn) {

                        try {

                            $stmt = $conn->prepare("INSERT INTO funcionario(nome, cpf, rg, cep, rua, numero_rua, bairro, cidade, uf, celular, email, data_admissao) VALUES(:nome, :cpf, :rg, :cep, :rua, :numero, :bairro, :cidade, :uf, :celular, :email, :data_admissao)");
    
                            $stmt->bindParam(':nome', $client['nome']);
                            $stmt->bindParam(':cpf', $client['cpf']);
                            $stmt->bindParam(':rg', $client['rg']);
                            $stmt->bindParam(':cep', $client['cep']);
                            $stmt->bindParam(':rua', $client['rua']);
                            $stmt->bindParam(':numero', $client['numero']);
                            $stmt->bindParam(':bairro', $client['bairro']);
                            $stmt->bindParam(':cidade', $client['cidade']);
                            $stmt->bindParam(':uf', $client['uf']);
                            $stmt->bindParam(':celular', $client['celular']);
                            $stmt->bindParam(':email', $client['email']);
                            $stmt->bindParam(':data_admissao', $client['data']);
    
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

    <!-- Não troque a ordem desses Scripts, lembre-se, sempre o Script com a lógica das validações primeiro e depois o Script que valida! -->
    <script src="../../js/Form_Validations.js"></script>
    <script src="../../js/Forms.js"></script>

</body>

</html>