// Script exclusivo contendo a lógica de todas as validações, explicarei todas


// Função especifica para validar o CPF ⬇️
function validateCPF(cpf) {

    console.log("CPF antes da limpeza:", cpf);

    // Tira todos os caracteres não números do CPF
    cpf = cpf.replace(/\D/g, "");
    console.log("Cpf após limpeza:", cpf);

    console.log("Verificando repetitividade");
    // Vê se o usuário digitou números repetidos, caso sim, retorna falso encerrando a função, caso não, continua a função ignorando isso daqui
    if (/^(\d)\1+$/.test(cpf)) {
    
        console.log("CPF com números repetidos");

        return false;
    }
    console.log("Sem repetições");

    console.log("Verificando comprimento");
    console.log("Comprimento:", cpf.length);
    // Vê se a quantidade de digitos do número é diferente de "11", caso for, ele retorna falso encerrando a função, caso não, ele ignora isso e continua a função normalmente
    if (cpf.length != 11) {
        
        console.log("CPF com comprimento inválido");
        
        return false;
    }
    console.log("Comprimento válido");

    console.log("Calculando digitos verificadores com base no digito capturado do usuário do usuário");
    // Função auxiliar para calcular os digitos verificadores
    function calculateDigit(baseNumber, weights) {

        let sum = 0;

        for (let i = 0; i < weights.length; i++) sum += parseInt(baseNumber.charAt(i)) * weights[i];

        let rest = sum % 11;

        return rest < 2 ? 0 : 11 - rest;
    }

    /* Verifica se o primeiro digito verificador é diferente do primeiro digito verificador digitado pelo usuário, 
    caso sim, ele retorna falso encerrando a função, caso não, ele continua a função ignorando isso daqui */
    let firstDigit = calculateDigit(cpf.substring(0, 9), [10, 9, 8, 7, 6, 5, 4, 3, 2]);
    console.log("Primeiro digito verificador calculado:", firstDigit);
    console.log("Comparação do número verificador calculado com o número fornecido pelo usuário:", `${firstDigit} | ${cpf.charAt(9)}`);

    if (firstDigit != parseInt(cpf.charAt(9))) {
     
        console.log("Primeiro digito verificador inválido");

        return false;
    }
    /* Verifica se o segundo digito verificador é diferente do segundo digito verificador digitado pelo usuário, 
    caso sim, ele retorna falso encerrando a função, caso não, ele continua a função ignorando isso daqui */
    let secondDigit = calculateDigit(cpf.substring(0, 10), [11, 10, 9, 8, 7, 6, 5, 4, 3, 2]);
    console.log("Segundo digito verificador calculado:", secondDigit);
    console.log("Comparação do número verificador calculado com o número fornecido pelo usuário:", `${secondDigit} | ${cpf.charAt(10)}`);

    if (secondDigit != parseInt(cpf.charAt(10))) {
        
        console.log("Segundo digito verificador inválido");    
        
        return false;
    }

    // Caso o CPF passe por tudo isso e consiga chegar até aqui, ele é válido retornando verdadeiro
    return true;
}


// Função especifica para validar o RG ⬇️
function validateRG(rg) {

    console.log("RG antes da limpeza:", rg);

    // Tira todos os caracteres não números do RG
    rg = rg.replace(/[\.\-]/g, "");
    console.log("RG após limpeza:", rg);

    console.log("Verificando comprimento");
    /* Vê se a quantidade de digitos do RG é diferente de "9" ou diferente de "10", caso um dos dois for diferente, 
    ele retorna falso encerrando a função, caso nenhuma das verificações forem iguais, ele ignora isso e continua a função normalmente */
    if (!(rg.length == 9 || rg.length == 10)) {
        
        console.log("RG com comprimento inválido");
        
        return false;
    }
    console.log("Comprimento válido");

    console.log("Verificando digitos não numéricos");
    // Vê se contém digitos não números no RG, caso tenha, ele retorna falso encerrando a função
    if (!/^\d+$/.test(rg)) {
        
        console.log("RG com digitos não númericos");
        
        return false;
    }
    console.log("Sem digitos não numéricos");

    // Caso o RG passe por tudo isso e consiga chegar até aqui, ele é válido retornado verdadeiro
    return true;
}


// Função especifica para validar o número de celular ⬇️
function validateCellNumber(number) {

    console.log("Número antes da limpeza:", number);

    // Tira todos os caracteres não números do número
    number = number.replace(/\D/g, "");
    console.log("Número depois da limpeza:", number);


    console.log('Número irá passar pela verificação, retorno de não válido feito por "validateForm"');
    // Retorna a verificação do número de celular
    return /^(\d{2})9\d{8}$/.test(number);
}


// Função especifica para validar o Email ⬇️
function validateEmail(email) {

    // Criando uma variável que contém um certo padrão de digitos
    const regular = /^[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    console.log('Email irá passar pela verificação, retorno de não válido feito por "validateForm"');
    // Retorna a verificação do Email associando a variável padrão com o Email
    return regular.test(String(email).toLowerCase());
}


// Função especifica para validar o CNPJ ⬇️
function validateCNPJ(cnpj) {

    console.log("CNPJ antes da limpeza:", cnpj);

    // Tira todos os caracteres não números do CNPJ
    cnpj = cnpj.replace(/[^\d]+/g, "");
    console.log("CNPJ após limpeza:", cnpj);

    console.log("Verificando comprimento");
    console.log("Comprimento:", cnpj.length);
    // Vê se a quantidade de digitos do número é diferente de "14", caso for, ele retorna falso encerrando a função, caso não, ele ignora isso e continua a função normalmente
    if (cnpj.length != 14) {
        
        console.log("CNPJ com comprimento inválido");
        
        return false;
    }
    console.log("Comprimento válido");

    console.log("Verificando repetitividade");
    // Vê se o usuário digitou números repetidos, caso sim, retorna falso encerrando a função, caso não, continua a função ignorando isso daqui
    if (/^(\d)\1+$/.test(cnpj)) {
    
        console.log("CNPJ com números repetidos");

        return false;
    }
    console.log("Sem repetições");

    console.log("Separando o corpo e os números verificadores");
    // Criando variáveis para separar os números verificadores do resto
    const baseNumber = cnpj.substring(0, 12);
    const checkDigits = cnpj.substring(12);
    console.log("Corpo e números verificadores:", `${baseNumber} | ${checkDigits}`);

    console.log("Calculando digitos verificadores com base no digito capturado do usuário do usuário");
    // Função auxiliar para calcular os digitos verificadores
    function calculateCheckDigits(base, startPos) {

        let sum = 0, pos = startPos;

        for (let i = 0; i < base.length; i++) {

            sum += parseInt(base.charAt(i)) * pos--;

            if (pos < 2) pos = 9;

        }


        return sum % 11 < 2 ? 0 : 11 - sum % 11;
    }

    // Pegando o primeiro digito verificador
    const firstDigit = calculateCheckDigits(baseNumber, 5);
    console.log("Primeiro dígito verificador calculado:", firstDigit);
    console.log("Comparação do número calculado com o número fornecido pelo usuário:", `${firstDigit} | ${checkDigits.charAt(0)}`);

    // Verifica se o primeiro digito é diferente do primeiro digito do usuário, caso for, retorna falso encerrando a função, caso não for, ignora isso e segue normalmente a função
    if (firstDigit != parseInt(checkDigits.charAt(0))) {
        
        console.log("Primeiro dígito verificador inválido");
        
        return false;
    }

    // Pegando o segundo digito verificador
    const secondDigit = calculateCheckDigits(baseNumber + firstDigit, 6)
    console.log("Segundo dígito verificador calculado:", secondDigit);
    console.log("Comparação do número calculado com o número fornecido pelo usuário:", `${secondDigit} | ${checkDigits.charAt(1)}`);

    // Verifica se o segundo digito é diferente do segundo digito do usuário, caso for, retorna falso encerrando a função, caso não for, ignora isso e segue normalmente a função
    if (secondDigit != parseInt(checkDigits.charAt(1))) {
        
        console.log("Segundo dígito verificador inválido");    
        
        return false;
    }

    // Caso o CNPJ passe por tudo isso e consiga chegar até aqui, ele é válido retornado verdadeiro
    return true;
}


// Função especifica para validar o I.E(Inscrição Estadual) ⬇️
function validateIE(ie) {

    // Criando uma variável que contém um tipo de comprimento padrão
    const regular = /^[A-Za-z0-9]{9,14}$/;

    console.log("Verificando repetitividade");
    // Vê se o usuário digitou números ou letras repetidas, caso sim, retorna falso encerrando a função, caso não, continua a função ignorando isso daqui
    if (/^(\d)\1+$/.test(ie) || /^([a-zA-Z])\1+$/.test(ie)) {
    
        console.log("I.E(Inscrição Estadual) com repetitividade");

        return false;
    }
    console.log("Sem repetições");

    console.log('I.E(Inscrição Estadual) irá passar pela verificação, retorno de não válido feito por "validateForm"');
    // Retorna a verificação do I.E(Inscrição Estadual)
    return regular.test(ie);
}

// Função especifica para validar as UFs ⬇️
function validateUF(uf) {

    // Criando uma variável com os estados existente
    const stateAbbreviations = [

        "AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", 
        "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", 
        "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"

    ];
    console.log("Estados existentes", stateAbbreviations);

    // Colocando o digito do usuário em maiúsculo
    uf = uf.toUpperCase();

    console.log('UF digitada irá passar pela verificação, retorno de não válido feito por "validateForm"');
    // Retorna a verificação do estado
    return stateAbbreviations.includes(uf);
}