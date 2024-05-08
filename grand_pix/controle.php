<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
$acaoid = filter_input(INPUT_POST, 'acaoid', FILTER_SANITIZE_NUMBER_INT);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

switch ($acao) {
}

switch ($controle) {
    default:
?>
        <h1>ERROR 404</h1>
<?php
        break;
    case 'entregaadd':
        include_once 'entregaadd.php';
        break;
}

?>