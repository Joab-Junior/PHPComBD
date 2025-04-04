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

        <h1> CADASTRO DE USUÁRIOS </h1>

        <form class="formBase" action="" method="post">

            <label for="nome"> Nome de Usuário: </label>
            <input required class="inputForms" name="nome" type="text" id="nome" placeholder="Digite o nome do seu usuário...">

            <label for="senha"> Senha: </label>
            <input required class="inputForms" name="senha" type="password" id="senha" placeholder="Digite a senha...">

            <label for="confirmaSenha"> Confirma Senha: </label>
            <input required class="inputForms" type="password" id="confirmaSenha" placeholder="Confirme a senha...">

            <label for="funcionario"> Funcionário: </label>
            <input required class="inputForms" type="text" name="funcionario" id="funcionario" placeholder="Digite o funcionário...">

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
                    $user = array(

                        /* O "htmlspecialchars()" serve para que os dados fiquem encriptados, ou seja, segurança a mais contra ataques, 
                        não é necessário nessa lição, mas é indispensável para o nosso TCC */
                        "nomeUsuario" => htmlspecialchars($_POST['nome']),
                        "senha" => htmlspecialchars($_POST['senha']),
                        "funcionario" => htmlspecialchars($_POST['funcionario'])

                    );

                    include_once('../../config/connection.php');

                    if ($conn) {

                        try {

                            $stmt = $conn->prepare("INSERT INTO usuario(usuario, senha, nome_funcionario) VALUES(:nomeUsuario, :senha, :funcionario)");
    
                            $stmt->bindParam(':usuario', $client['usuario']);
                            $stmt->bindParam(':senha', $client['senha']);
                            $stmt->bindParam(':funcionario', $client['funcionario']);
    
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