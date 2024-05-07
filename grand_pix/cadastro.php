<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {

    $nome = $dados['usuario'];
    $pass = $dados['senha'];
    $option = [
        'cost' => 12
    ];
    $senhahash = password_hash($pass, PASSWORD_BCRYPT, $option);
    if (listarPorAlgo('idusuario', 'usuario', 'nome', $nome) == "Vazio") {
        $retornoinsert = InsertDoisId('nome, senha', 'usuario', $nome, $senhahash);
        if ($retornoinsert != 'Vazio') {

            echo json_encode(['success' => true, 'message' => "Cadastrado com sucesso"]);



        } else {
            echo json_encode(['success' => false, 'message' => 'Usuário ou senha errado']);
        }
    } else {
        echo json_encode(['sucess' => false, 'message' => 'Usuario já existe']);
    }

}