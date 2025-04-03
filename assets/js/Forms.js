// Script para todos os formulários, irei separar por categorias e cada um delas será explicada


// Criando um objeto base contendo todos os inputs
const fields = {

    nome: document.getElementById("nome"),
    cpf: document.getElementById("cpf"),
    rg: document.getElementById("rg"),
    cnpj: document.getElementById("cnpj"),
    ie: document.getElementById("ie"),
    cep: document.getElementById("cep"),
    rua: document.getElementById("rua"),
    num: document.getElementById("num"),
    bairro: document.getElementById("bairro"),
    cidade: document.getElementById("cidade"),
    uf: document.getElementById("uf"),
    celular: document.getElementById("celular"),
    email: document.getElementById("email"),
    vendedor: document.getElementById("vendedor"),
    idProduto: document.getElementById("idProduto"),
    nomeProduto: document.getElementById("nomeProduto"),
    categoria: document.getElementById("categoria"),
    descricao: document.getElementById("descricao"),
    precoDeCompra: document.getElementById("precoDeCompra"),
    quantidade: document.getElementById("quantidade"),
    dataDeCompra: document.getElementById("dataDeCompra"),
    dataDeValidade: document.getElementById("dataDeValidade"),
    fornecedor: document.getElementById("fornecedor"),
    funcionario: document.getElementById("funcionario"),
    senha: document.getElementById("senha"),
    confirmaSenha: document.getElementById("confirmaSenha")

};


// Script para limpar o campo do Formulário ⬇️

//função para limpar o campo do Formulário
function cleanForm() { Object.values(fields).forEach(field => { if (field) field.value = ""; }); }


// Script para validar o que o usuário digitou ⬇️

// Criando função para validar os campos necessários
function validateForm() {

    // Criando um array com objetos que contém o que vai validar e a mensagem de erro caso dê errado
    const validations = [

        { field: fields.cpf, validate: validateCPF, errorMessage: "CPF inválido!" },
        { field: fields.rg, validate: validateRG, errorMessage: "RG inválido!" },
        { field: fields.cnpj, validate: validateCNPJ, errorMessage: "CNPJ inválido!" },
        { field: fields.ie, validate: validateIE, errorMessage: "I.E(Inscrição Estadual) inválido!" },
        { field: fields.uf, validate: validateUF, errorMessage: `O estado "${fields.uf.value}" não existe` },
        { field: fields.celular, validate: validateCellNumber, errorMessage: "Celular inválido!" },
        { field: fields.email, validate: validateEmail, errorMessage: "Email inválido!" }

    ];

    // Loop para percorrer o array e fazer toda a validação
    for (let { field, validate, errorMessage } of validations) {

        if (field) {

            console.log(`Validando campo: ${field.name.toUpperCase()}`);

            let isValid = validate(field.value);
            console.log(`Validação do campo ${field.name} resultou em: ${isValid ? "Válido" : "Inválido"}`);

            // Valida os campos
            if (!isValid) {

                alert(errorMessage);

                field.focus();

                return false;
            }

        }

    }

    console.log("Validação completa, nenhum dos campos são inválidos");

    // Caso o formulário passe por toda verificação e for aprovado em tudo, ele retorna verdadeiro, deixando o formulário ser enviado
    return true;
}




// Script para pegar o endereço pelo CEP pegado do "viacep.com", explicação não foi eu que fiz ⬇️

function limpa_formulário_cep() {

    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");

}

function meu_callback(conteudo) {

    if (!("erro" in conteudo)) {

        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);

    } //end if.
    else {

        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");

    }
    
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {

            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
            
        }
    } //end if.
    else {

        //cep sem valor, limpa formulário.
        limpa_formulário_cep();

    }

};