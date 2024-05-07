<?php

include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';

if (!isset($_SESSION['idusuario'])) {

    header('location: index.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Capiboy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <div class="row vh-100" style="height: 100%">
        <div class="col-md-2">
            <br><br>
            <button type="button" class="list-group-item list-group-item-action"
                onclick="carregarConteudo('listarentrega')" id="btnlist">entregaS</button>

        </div>
        <div class="col-md-10" id="others">

            <div class="container-fluid text-white" id='conteudo'>
                <?php
                include_once "area.php";

                ?>
            </div>

        </div>
    </div>



    <!-- Modal Adicionar entrega -->

    <div class="modal fade" id="modaladdentrega" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <form name='formulario_adicionar_entrega' enctype="multipart/form-data"
                        id='formulario_adicionar_entrega' method="post" action="#">
                        <div class="mb-3">

                            <label for="idceporigemadd" class="form-label">Cep da origem</label>
                            <input type="text" class="form-control form-control-sm" required="required"
                                id="idceporigemadd" name="addceporigem" placeholder="Cep origem (numero apenas)"
                                aria-label=".form-control-sm addceporigem" minlength="8" maxlength="8" onkeyup="buscarcep()">

                            <label for="idcepdestinoadd" class="form-label">Cep do destino</label>
                            <input type="cep" class="form-control form-control-sm" required="required"
                                id="idcepdestinoadd" name="addcepdestino" placeholder="Cep destino (numero apenas)"
                                aria-label=".form-control-sm addcepdestino" minlength="8" maxlength="8">

                            <label for="idpesoadd" class="form-label">Peso (gramas)</label>
                            <input type="number" class="form-control form-control-sm" required="required" id="idpesoadd"
                                name="addpeso" placeholder="peso" aria-label=".form-control-sm addpeso" min='0' max='12000' onkeyup="escolhervalor()">
                            
                            <label for="idvaloradd" class="form-label">Valor</label>
                            <input type="number" class="form-control form-control-sm" required="required" id="idvaloradd"
                                name="addvalor" placeholder="(Digite um peso)" aria-label=".form-control-sm addvalor" disabled>
                        </div>
                        <center>
                            <button type="submit" class="btnadicionarentrega"
                                id="btnadicionarentrega">Adicionar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar entrega -->

    <div class="modal fade" id="modaleditentrega" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <form name='formulario_editar_entrega' enctype="multipart/form-data" id='formulario_editar_entrega'
                        method="post" action="#">
                        <div class="mb-3">
                            <input type="hidden" id="identregaedit" name="identrega">
                            <label for="idceporigemedit" class="form-label">ceporigem</label>
                            <input type="text" class="form-control form-control-sm" required="required"
                                id="idceporigemedit" name="editceporigem" placeholder="ceporigem"
                                aria-label=".form-control-sm editceporigem">

                            <label for="idcepdestinoedit" class="form-label">cepdestino</label>
                            <input type="text" class="form-control form-control-sm" required="required"
                                id="idcepdestinoedit" name="editcepdestino" placeholder="cepdestino"
                                aria-label=".form-control-sm editcepdestino">

                            <label for="idpesoedit" class="form-label">peso</label>
                            <input type="file" class="form-control form-control-sm" id="idpesoedit" name="editpeso"
                                placeholder="peso" aria-label=".form-control-sm editpeso">

                        </div>
                        <center>
                            <button type="submit" class="btneditarentrega" id='btneditarentrega'>Editar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
        <script src="js/func.js"></script>
    </body >
</html >