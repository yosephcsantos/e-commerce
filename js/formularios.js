document.querySelector('form input').oninvalid = function(evt) {
    // cancela comportamento padrão do browser
    evt.preventDefault();

    // checa validade e mostra alert
    if (!this.validity.valid) {
        alert("Nome obrigatório!");
    }
};

document.querySelector('input[type=email]').oninvalid = function() {

	// remove mensagens de erro antigas
    this.setCustomValidity("");

    // reexecuta validação
    if (!this.validity.valid) {

    	// se inválido, coloca mensagem de erro
        this.setCustomValidity("Email inválido");
    }
};