let campoCep = document.querySelector("#txtCep");
campoCep.addEventListener("blur", () => {

    let cep = campoCep.value;

    let ajax = new XMLHttpRequest();

    ajax.open("GET", `https://viacep.com.br/ws/${cep}/json/`);

    ajax.onload = function () {
        
        let dadosEndereco = JSON.parse(ajax.responseText);

        if (!dadosEndereco.logradouro) {
            document.querySelector("#frmCep").reset();
            swal("Erro!", "O Cep digitado é Inválido!", "error");
            return;
        }
        
        document.querySelector("#txtEndereco").value = dadosEndereco.logradouro;
        document.querySelector("#txtBairro").value = dadosEndereco.bairro;
        document.querySelector("#txtCidade").value = dadosEndereco.localidade;
        document.querySelector("#txtUf").value = dadosEndereco.uf;
    }
    ajax.send();
});