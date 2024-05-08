<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (!empty($dados) && isset($dados)) {

    $ceporigem = $dados['addceporigem'];
    $cepdestino = $dados['addcepdestino'];
    $valor = $dados['addvalor'];
    $idusuario = $dados['addusuario'];
    $ceporigem = str_replace($ceporigem[4], $ceporigem[4] . '-', $ceporigem);
    $cepdestino = str_replace($cepdestino[4], $cepdestino[4] . '-', $cepdestino);

    $api_key = "AIzaSyC6HRMxrOyyglTRSmJpuKy303PrYR5JMqU";

    function coordenadas($cep, $api_key)
    {
        $cep_formatted = urlencode($cep);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$cep_formatted}&key={$api_key}";

        $response = file_get_contents($url);

        $result = json_decode($response, true);
        if ($result['status'] == "OK") {

            $latitude = $result['results'][0]['geometry']['location']['lat'];
            $longitude = $result['results'][0]['geometry']['location']['lng'];

            return "$latitude,$longitude";
        } else {

            return "Erro: " . $result['status'];
        }
    }

    $localorigem = coordenadas($ceporigem, $api_key);
    $localdestino = coordenadas($cepdestino, $api_key);

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins={$localorigem}&destinations={$localdestino}&key={$api_key}";

    $response = file_get_contents($url);

    $result = json_decode($response, true);
    if ($result['status'] == "OK") {

        $distance = intval($result['rows'][0]['elements'][0]['distance']['value']);
        $duration = intval($result['rows'][0]['elements'][0]['duration']['value']);
        $valor = intval($valor);
        $valor = $valor + (intval($distance / 1000)) + (intval($duration / 60));

        $retornoinsert = InsertCincoId('idusuario, idmotoboy, inicio, previsao, valor', 'pedido', $idusuario, 1, date('H:i:s'), gmdate("H:i:s", time() - strtotime("today") + $duration), $valor);

        if ($retornoinsert != "Vazio"){
            echo json_encode(["sucesss" => true, 'message' => "Pedido feito com sucesso"]);
        }
    } else {

        echo json_encode(["sucesss" => false, 'message' => "Erro: " . $result['status']]);
    }


}