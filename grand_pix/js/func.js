
if (document.getElementById('inusuario')) {
    document.getElementById('inusuario').focus;
}




function mostrarprocessando() {
    var divprocessando = document.createElement('div');
    divprocessando.id = "processandodiv";
    divprocessando.style.position = "fixed";
    divprocessando.style.top = "50%";
    divprocessando.style.left = "50%";
    divprocessando.style.transform = 'translate(-50%, -50%)';
    divprocessando.innerHTML = '<img src="./img/processando.gif" width="150px" alt="carregando" title="carregando">';
    document.body.appendChild(divprocessando);
}
function esconderprocessando() {
    var divprocessando = document.getElementById('processandodiv');
    if (divprocessando) {
        document.body.removeChild(divprocessando); ''
    }
}

function fazerlogin() {
    var usuario = document.getElementById('inusuario').value;
    var senha = document.getElementById('insenha').value;
    var erromsg = document.getElementById('erromsg');
    var qntdsenha = senha.length;
    if (usuario === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'usuario e senha vazios, por favor preencha os campos.';
        return;
    }
    if (usuario === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'usuario vazio, por favor preencha o campo.';
        return;
    }
    if (senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha vazia, por favor preencha o campo.';
        return;
    }
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter no minimo 8 digitos.';
        return;

    }

    mostrarprocessando();

    fetch('logar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'usuario=' + encodeURIComponent(usuario) + "&senha=" + encodeURIComponent(senha),
    })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {
                    esconderprocessando();
                    window.location.href = 'principal.php'
                    erromsg.style.display = 'none';
                }, 800);

            } else {

                esconderprocessando();
                erromsg.classList.remove('alert-success');
                erromsg.classList.add('alert-danger');
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição', error)
        });
}

function fazercadastro() {
    var usuario = document.getElementById('inusuariocad').value;
    var senha = document.getElementById('insenhacad').value;

    var erromsg = document.getElementById('erromsg');
    var qntdsenha = senha.length;
    if (usuario === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'usuario e senha vazios, por favor preencha os campos.';
        return;
    }
    if (usuario === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'usuario vazio, por favor preencha o campo.';
        return;
    }
    if (senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha vazia, por favor preencha o campo.';
        return;
    }
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter no minimo 8 digitos.';
        return;

    }

    mostrarprocessando();

    fetch('cadastro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'usuario=' + encodeURIComponent(usuario) + "&senha=" + encodeURIComponent(senha),
    })

        .then(response => response.json())
        .then(data => {

            if (data.success) {

                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {
                    esconderprocessando();
                    window.location.href = 'index.php'
                    erromsg.style.display = 'none';
                }, 800);

            } else {

                esconderprocessando();
                erromsg.classList.remove('alert-success');
                erromsg.classList.add('alert-danger');
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição', error)
        });
}

function carregarConteudo(controle) {

    if (controle) {
        fetch('controle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'controle=' + encodeURIComponent(controle),
        })
            .then(response => response.text())
            .then(data => {
                document.getElementById('conteudo').innerHTML = data;
            })
            .catch(error => console.error('Erro na requisição:', error));
    }
}

function escolhervalor() {
    var peso = document.getElementById("idpesoadd").value;
    var valorInputFalso = document.getElementById("idvaloraddfalso");
    var valorInput = document.getElementById("idvaloradd");
    var novoValor;

    if (peso < 1000) {
        novoValor = 3;
    } else if (peso < 3000) {
        novoValor = 5;
    } else if (peso < 8000) {
        novoValor = 9;
    } else {
        novoValor = 12;
    }

    valorInput.value = novoValor;
    valorInputFalso.value = novoValor;
}

const modaladdentrega = document.getElementById('modaladdentrega');
const idceporigemadd = document.getElementById('idceporigemadd');
const btnadicionarentrega = document.getElementById("btnadicionarentrega");

const modaladdcarro = document.getElementById('modaladdcarro');
const idmodeloadd = document.getElementById('idmodeloadd');
const btnadicionarcarro = document.getElementById("btnadicionarcarro");

const modaladdcliente = document.getElementById('modaladdcliente');
const idclienteadd = document.getElementById('idclienteadd');
const btnadicionarcliente = document.getElementById("btnadicionarcliente");

function adicionarTabela(modaladd, btnAdicionar, IdAdd, tipoAdd, formTipo, controle, foto, fotoinput) {

    modaladd.addEventListener('shown.bs.modal', () => {
        IdAdd.focus();
        const submitHandler = function (event) {
            event.preventDefault();
            btnAdicionar.disabled = true;
            var form = event.target;
            var formData = new FormData(form);
            formData.append('controle', tipoAdd);
            if (foto) {

                var fileinput = document.getElementById(fotoinput);
                console.log(fileinput.files[0]);
                formData.append('foto', fileinput.files[0]);
            }

            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alert(data.message);
                        carregarConteudo(controle);
                    } else {
                        alert(data.message);
                    }

                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        };
        formTipo.addEventListener('submit', submitHandler)
    })
};

function modaladd(nomemodal1, nome_formulario1, btnAdicionar1, idAdd1, controle1, controle2, foto1, fotoinput1) {
    if (nomemodal1) {
        const form1 = document.getElementById(nome_formulario1);
        adicionarTabela(nomemodal1, btnAdicionar1, idAdd1, controle1, form1, controle2, foto1, fotoinput1);
    }
}

modaladd(modaladdentrega, "formulario_adicionar_entrega", btnadicionarentrega, idceporigemadd, "entregaadd", '', false, "");
modaladd(modaladdcarro, "formulario_adicionar_carro", btnadicionarcarro, idmodeloadd, "carroadd", 'listarcarro', true, "idfotoadd");
modaladd(modaladdcliente, "formulario_adicionar_cliente", btnadicionarcliente, idclienteadd, "clienteadd", 'listarcliente', false, "");


function deletarAlgo(controle, id, controle2) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&id=' + encodeURIComponent(id),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success = "true") {
                alert(data.message);
                carregarConteudo(controle2);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
};


function abrirFecharModal(nomeModal, abrirOuFechar) {
    var modal = new bootstrap.Modal(document.getElementById(nomeModal));

    if (abrirOuFechar === 'A') {
        modal.show();
    } else {
        modal.hide();
    }
}

function abrirModalEdicaoCarro(idcarro, modelo, grupo) {

    var carromodelo = document.getElementById('idmodeloedit');
    var carrogrupo = document.getElementById('idgrupoedit');
    if (carromodelo) {
        carromodelo.focus();
    }
    carromodelo.value = modelo;
    carrogrupo.value = grupo;
    document.getElementById('idcarroedit').value = idcarro;

    abrirFecharModal('modaleditcarro', 'A');
}

function abrirModalComprarCarro(idcarro) {

    var idclientecomprar = document.getElementById('idclientecomprar');

    if (idclientecomprar) {
        idclientecomprar.focus();
    }


    document.getElementById('incarrocomprarid').value = idcarro;
    document.getElementById('idvalorcomprar').value = "";
    abrirFecharModal('modalcomprarcarro', 'A');

}
function editarFormulario(formularioEditar, elementoEdit, listarElemento, foto, fotoinput) {
    document.getElementById(formularioEditar).addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('controle', elementoEdit);
        if (foto) {

            var fileinput = document.getElementById(fotoinput);
            console.log(fileinput.files[0]);
            formData.append('foto', fileinput.files[0]);
        }
        fetch('controle.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    alert(data.message);
                    carregarConteudo(listarElemento);
                } else {
                    alert(data.message);
                }

            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });
    })
}

editarFormulario('formulario_editar_carro', 'editcarro', 'listarcarro', true, "idfotoedit");



document.getElementById("formulario_comprar_carro").addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('controle', 'comprarcarro');

    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success) {
                alert(data.message);
                carregarConteudo('listarcarro');
            } else {
                alert(data.message);
            }

        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
})

function barraDePesquisa() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[0];

        modelo = tr[i].getElementsByTagName("span")[2];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}
function barraDePesquisaCliente() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[0];

        modelo = tr[i].getElementsByTagName("span")[1];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}
function barraDePesquisaVendas() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[1];

        modelo = tr[i].getElementsByTagName("span")[2];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}