var objAjax = null;
        function criaObjetoAjax() {
            if(window.XMLHttpRequest) {
                try {
                    objeto = new XMLHttpRequest();
                } catch(e) {
                    objeto = false;
                }
            } else if(window.ActiveXObject) {
                try {
                    objeto = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(e) {
                    try {
                        objeto = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch(e) {
                    objeto = false;
                    }
                }
            }
            return objeto;
        }


function cadastra(){
    objAjax = criaObjetoAjax();

    var url = "cadastro.php";
    var apelido = document.getElementById("apelido").value;
    var senha = document.getElementById("senha").value;
    var email = document.getElementById("email").value;
    var idade = document.getElementById("idade").value;
    objAjax.open("POST",url,true);

    objAjax.setRequestHeader('Content-Type','application/json');
    objAjax.send(JSON.stringify({'apelido': apelido, 'senha': senha, 'email':email, 'idade':idade}));
    objAjax.onreadystatechange=confirmaCadastro;
}

function confirmaCadastro(){
    if(objAjax.readyState == 4){
        if(objAjax.status == 200) {
            var response = objAjax.responseText;
            document.getElementById('mural').innerHTML ="<p class='bg-success text-white'> Parabéns " + response +", Cadastro realizado!</p>";
        } else {
            document.getElementById('mural').innerHTML = "<p class='bg-danger text-white'> Houve um erro ao inserir os dados remotos: "+objAjax.statusText + "<p>";
        }
    }
}

function lista() {
    objAjax = criaObjetoAjax();
    var nome = document.getElementById("nome_lista").value;
    url = "lista.php?nome="+ nome;
    objAjax.open("GET",url,true);
    objAjax.onreadystatechange=confirmaLista;
    objAjax.send(null);
}

