<!DOCTYPE html>
<html lang="pt-br">
 
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="../../css/style.css">
 
    <title> Alterar Cliente </title>
 
</head>
 
<body>
 
    <main class="mainForms">
 
        <h1> Alteração De Clientes </h1>
 
        <?php
        
            $cod = $_GET['id'];
        
            include_once('../connection.php');
        
            $select = $conn->prepare("SELECT * FROM cliente where codigo=$cod");
            $select->execute();
        
            $row = $select->fetch();

        ?>
 
        <form class="formBase" action="./confirma/confirmaCliente.php" method="post" onsubmit="return validateForm()">
 
            <label for="cname"><b>Código</b></label>
            <input required class="form-control" type="text" name="codigo" value="<?php echo $row['codigo'];?>" readonly="true">
 
            <label for="nome"> Nome: </label>
            <input required class="inputForms" name="nome" value="<?php echo $row['nome'];?>" type="text" id="nome" placeholder="Digite seu nome...">
 
            <label for="cpf"> CPF: </label>
            <input required class="inputForms" name="cpf" value="<?php echo $row['cpf'];?>" onkeypress='return event.charCode >=48 && event.
            charCode <= 57' onblur="alert(ValidateCPF(this.value));" type="text" id="cpf" maxlength="14" placeholder="Digite seu CPF...">
 
            <label for="rg"> RG: </label>
            <input required class="inputForms" name="rg" value="<?php echo $row['rg']; ?>" type="text" id="rg" maxlength="12"
             placeholder="Digite seu número do RG...">
 
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
 
            <div class="divRegisterAndClear">
 
                <button class="buttonFormsRegister" type="submit"> Cadastrar </button>
                <button class="buttonFormsClear" type="button" onclick="cleanForm()"> Limpar </button>
 
            </div>
 
            <a class="aBackButton" href="./Inicio.php"> Voltar </a>
 
 
        </form>
 
    </main>
 
    <!-- Não troque a ordem desses Scripts, lembre-se, sempre o Script com a lógica das validações primeiro e depois o Script que valida! -->
    <script src="../scripts/Form_Validations.js"></script>
    <script src="../scripts/Forms.js"></script>
 
</body>
 
</html>
 