/*
da pra colocar um item em cada formulario somente pra identificar pra onde deve ir
(a url) aí fica somente um enviarForm generico que altera a url
*/

// função para enviar formulário de asfalto
url = "http://localhost/LUPANH/asfalto";
function enviarFormAsfalto() {
    var dataForm = $("#form-asfalto").serialize();
    $.ajax({
        url: url+"/agua",
        data: dataForm,
        method: 'POST',
    }).done(function(resposta) {
        var teste = resposta;
        if (resposta.status == "ok") {
            alert(resposta.mensagem);
        } else {
            alert(resposta.mensagem);
        }
    }).fail(function () {
        alert("erro");
    });
}

// função para enviar formulário de água
url = "http://localhost/LUPANH/api";
function enviarFormAgua() {
    var dataForm = $("#form-agua").serialize();
    $.ajax({
        url: url+"/agua",
        data: dataForm,
        method: 'POST',
    }).done(function(resposta) {
        var teste = resposta;
        if (resposta.status == "ok") {
            alert(resposta.mensagem);
        } else {
            alert(resposta.mensagem);
        }
    }).fail(function () {
        alert("erro");
    });
}

// função para enviar formulário de coleta de lixo
function enviarFormLixo() {
    var dataForm = $("#form-lixo").serialize();
    $.ajax({
        url: url+"/lixo",
        data: dataForm,
        method: 'POST',
    }).done(function(resposta) {
        var teste = resposta;
        if (resposta.status == "ok") {
            alert(resposta.mensagem);
        } else {
            alert(resposta.mensagem);
        }
    }).fail(function () {
        alert("erro");
    });
}

// função para enviar formulário de esgoto
function enviarFormEsgoto() {
    console.log('hm');
    var dataForm = $("#form-esgoto").serialize();
    $.ajax({
        url: url+"/esgoto",
        data: dataForm,
        method: 'POST',
    }).done(function(resposta) {
        var teste = resposta;
        if (resposta.status == "ok") {
            alert(resposta.mensagem);
        } else {
            alert(resposta.mensagem);
        }
    }).fail(function () {
        alert("erro");
    });
}