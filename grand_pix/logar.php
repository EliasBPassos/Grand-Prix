<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)){
    
    $nome = $dados['usuario'];
    $pass = $dados['senha'];

    $validar = ValidarSenhaCriptografada('idusuario, nome, senha', 'usuario', 'senha', 'nome', $pass, $nome);
    if ($validar != null) {
        if ($validar == 'nome'){
            echo json_encode(['success' => false, 'message' => "Usuario ou senha errado"]);
        }else if ($validar == 'senha'){
            echo json_encode(['success' => false, 'message' => "Usuario ou senha errado"]);
        } else {
           
            $_SESSION['idusuario'] = $validar -> idusuario;
            $_SESSION['nome'] = $validar -> nome;
            echo json_encode(['success' => true, 'message' => "Logado com sucesso"]);
        }
        
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário ou senha errado']);
    }
}
