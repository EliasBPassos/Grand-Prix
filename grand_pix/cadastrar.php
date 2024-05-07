<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body style="background-color: #252525;">

    <div class="page text-center">

        <form method="POST" action="index.php" class="formCadastro" id="cadastroform">

            <h1>Cadastro</h1>
            <p class="subtitle">Digite os seus dados de acesso no campo abaixo.</p>
            <label for="inusuario">Usuario</label>
            <input type="text" placeholder="Digite seu usuario" autofocus="true" name='usuario' id="inusuariocad">
            <label for="insenha">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="insenhacad">
            <div class="alert alert-danger" role="alert" id="erromsg" style="display: none;">
            </div>
            <input type="button" value="Acessar" class="btn" name="cadastro" id="inbotao" onclick="fazercadastro()">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script src="js/func.js"></script>
</body>

</html>