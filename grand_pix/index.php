<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="brown">

    <div class="page text-center">

        <form method="POST" action="principal.php" class="formLogin" id="loginform">

            <h1>Login</h1>
            <p class="subtitle">Digite os seus dados de acesso no campo abaixo.</p>
            <label for="inusuario">Usuario</label>
            <input type="text" placeholder="Digite seu usuario" autofocus="true" name='usuario' id="inusuario">
            <label for="insenha">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="insenha">
            <div class="alert alert-danger" role="alert" id="erromsg" style="display: none;">
            </div>
            <input type="button" value="Acessar" class="btn" name="login" id="inbotao" onclick="fazerlogin()">
            <h6>Não é cadastrado? clique <span><a href="cadastrar.php">Aqui</a></span></h6>
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