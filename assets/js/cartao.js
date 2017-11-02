function listarSetor(unidade){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200) {
	    document.getElementById("setores").innerHTML = this.responseText;
	}

    };
    xhttp.open("GET", "index.php/cartoes/listarSetor/"+unidade, true);
    xhttp.send();
}

function listarEndereco(unidade){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200) {
	    document.getElementById("enderecos").innerHTML = this.responseText;
	}

    };
    xhttp.open("GET", "index.php/cartoes/listarEndereco/"+unidade, true);
    xhttp.send();
}

function verificarSobrenome(nome){
    //var nome = document.getElementById("nome").value;
    var res = nome.split(" ");
    if(res.length < 2){
	document.getElementById("error_nome").style.display = 'block';
	document.getElementById("error_nome").innerHTML = "Preencha o campo com Nome e Sobrenome";
	return false;
    }else{
	if(document.getElementById("error_nome").style.display == 'block'){
	    document.getElementById("error_nome").style.display = 'none';
	}
	return true;
    }
}

function ativarVisualizar(){
    var nomeval = document.getElementById("nome").value;
    var nl = nomeval.length;
    var emailval = document.getElementById("email_prefixo").value;
    var el = emailval.length;
    
    if(nl>0){
        validarSobrenome = verificarSobrenome(nomeval);
    } else {
	validarSobrenome = false;
    }

    if((validarSobrenome) && (el > 0)){

	document.getElementById("btn_visualizar").disabled = false;
    }

}

function ativarAprovacao()
{

    document.getElementById("aprovar").disabled = false;

}

function aprovar()
{

    document.getElementById("btn_aprovar").disabled = false;

}

function addPedido()
{

    document.getElementById("btn_solicitar").disabled = false;

}

function visualizarPDF(){
    var nome = document.getElementById("nome").value;
    var setor = document.getElementById("setores").value;
    var dados = []
    var xhttp = new XMLHttpRequest();

    dados = [nome, setor]
    xhttp.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200) {
	    //document.getElementById("pdf").innerHTML = this.responseText;
	    document.getElementById("pdf").src = "index.php/cartoes/pdf/"+dados;
	}

    };
    xhttp.open("GET", "index.php/cartoes/pdf/"+dados, true);
    xhttp.send();
}
