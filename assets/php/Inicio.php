<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Início </title>
    
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bodyMainPage">

    <header class="mainHeader">

        <img class="adjustLogo2" src="../img/EcoTech Innovations Logo2.png" alt="EcoTech Logo">

        <div class="divDropdown">

            <button id="button1" class="buttonDropdown"> Cadastro </button>

            <ul id="menu1" class="dropdownMenu">

                <li> <a href="./Cadastros/Cliente_Formulario.php"> Cliente </a> </li>
                <li> <a href="./Cadastros/Funcionario_Formulario.php"> Funcionário </a> </li>
                <li> <a href="./Cadastros/Fornecedor_Formulario.php"> Fornecedor </a> </li>
                <li> <a href="./Cadastros/Produtos_Formulario.php"> Produto </a> </li>
                <li> <a href="./Cadastros/Usuario_Formulario.php"> Usuário </a> </li>

            </ul>

        </div>

        <div class="divDropdown">

            <button id="button2" class="buttonDropdown"> Consulta </button>

            <ul id="menu2" class="dropdownMenu">

                <li> <a href="./Consultas/Cliente_Consulta.php"> Cliente </a> </li>
                <li> <a href="./Consultas/Funcionario_Consulta.php"> Funcionário </a> </li>
                <li> <a href="./Consultas/Fornecedor_Consulta.php"> Fornecedor </a> </li>
                <li> <a href="./Consultas/Produtos_Consulta.php"> Produto </a> </li>
                <li> <a href="./Consultas/Usuario_Consulta.php"> Usuário </a> </li>

            </ul>

        </div>

        <a class="aLogOut" href="../html/Login.html"> Sair </a>

        <div class="divDropdown">

            <button id="createDB" onclick="window.location.href='./config/sistemaBD/createDB.php'"> CreateDB </button>

            <ul id="menu3" class="dropdownMenu">

                <li> <a href="./config/sistemaBD/createTableCliente.php"> Table Cliente </a> </li>
                <li> <a href="./config/sistemaBD/createTableFornecedor.php"> Table Fornecedor </a> </li>
                <li> <a href="./config/sistemaBD/createTableFuncionario.php"> Table Funcionário </a> </li>
                <li> <a href="./config/sistemaBD/createTableProduto.php"> Table Produto </a> </li>
                <li> <a href="./config/sistemaBD/createTableUsuario.php"> Table Usuário </a> </li>

            </ul>

        </div>

    </header>

    <script src="../js/Main.js"></script>

</body>

</html>