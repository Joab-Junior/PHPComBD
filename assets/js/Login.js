/* Script exclusivo para página de Login, esse script foi separado por categorias e cada uma tem sua explicação


Script para fazer com que só haja um email e senha para logar ⬇️ */

// Criando um EventListener(Faz algo caso o evento que você especificou aconteça) para verificar se o usuário clicou para entrar ou deu enter
function logIn() {

    // Pegando o email e a senha
    const emailInput = document.getElementById("email").value;
    const passwordInput = document.getElementById("password").value;

    // Criando o email e a senha que eu quero que o usuário digite
    const wantedEmail = "administrador@admin.com";
    const wantedPassword = "1234Adm!";

    // Criando variável de erro para caso o usuário digite errado
    let errorMessage = document.getElementById("errorMessage");

    const isEqual = emailInput == wantedEmail && passwordInput == wantedPassword;
    console.log(isEqual);

    // Verificando se o usuário digitou errado ou não, caso sim, mostra o erro, se não, continua para próxima página
    if (!isEqual) {

        // Adiciona uma classe e um texto de erro
        errorMessage.classList.add("errorMessage");
        errorMessage.textContent = "Email ou senha inválido!";
        
        return false;        

    } else {

        // Apenas limpa a mensagem e deixa o formulário ser enviado
        errorMessage.textContent = "";
        errorMessage.classList.remove("errorMessage");

    }

    return true;

}


// Script para mostrar o email e a senha correta ⬇️

// Puxando o botão que eu criei pra isso
const buttonShowEmailAndPassword = document.getElementById("showEmailAndPassword");

// Criando um EventListener(Faz algo caso o evento que você especificou aconteça) para mostrar ou esconder a resposta
buttonShowEmailAndPassword.addEventListener("click", () => {

    // Criando uma variável para verificar se já está mostrando a resposta ou não
    let isShowing = document.getElementById("divWithAnswers");

    // Checa se a resposta está mostrando, caso não, ele ira mostrar, caso sim, ele ira esconder
    if (isShowing.classList.contains("divWithAnswersBlock")) {

        // Faz o botão mudar de nome e de classe
        buttonShowEmailAndPassword.innerHTML = "Mostrar email e senha...";
        buttonShowEmailAndPassword.classList.replace("buttonShowOrHideLogInKeysLockedWhite", "buttonShowOrHideLogInKeys");

        // Esconde a resposta
        isShowing.classList.replace("divWithAnswersBlock", "divWithAnswersNone");

    } else {

        // Faz o botão mudar de nome e de classe
        buttonShowEmailAndPassword.innerHTML = "Esconder resposta";
        buttonShowEmailAndPassword.classList.replace("buttonShowOrHideLogInKeys", "buttonShowOrHideLogInKeysLockedWhite");

        // Mostra a resposta
        isShowing.classList.replace("divWithAnswersNone", "divWithAnswersBlock");

    }

});