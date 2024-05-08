<?php

// Chave da API do Google
$api_key = "AIzaSyC6HRMxrOyyglTRSmJpuKy303PrYR5JMqU";


// CEP para converter em coordenadas
$cep = "35057-510";

// Formatar o CEP para a URL
$cep_formatted = urlencode($cep);

// Montar a URL da solicitação
$url = "https://maps.googleapis.com/maps/api/geocode/json?address={$cep_formatted}&key={$api_key}";

// Fazer a solicitação e obter a resposta
$response = file_get_contents($url);

// Decodificar a resposta JSON
$result = json_decode($response, true);

// Verificar se a solicitação foi bem-sucedida
if ($result['status'] == "OK") {
    // Extrair as coordenadas geográficas (latitude e longitude)
    $latitude = $result['results'][0]['geometry']['location']['lat'];
    $longitude = $result['results'][0]['geometry']['location']['lng'];

    $origins_latlng = "$latitude,$longitude";
} else {
    // Exibir mensagem de erro se a solicitação falhar
    echo "Erro: " . $result['status'];
}




// Montar a URL da solicitação
$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins={$origins_latlng}&destinations={$destinations_latlng}&key={$api_key}";

// Fazer a solicitação e obter a resposta
$response = file_get_contents($url);

// Decodificar a resposta JSON
$result = json_decode($response, true);

// Verificar se a solicitação foi bem-sucedida
if ($result['status'] == "OK") {
    // Extrair informações de distância e duração
    $distance = $result['rows'][0]['elements'][0]['distance']['text'];
    $duration = $result['rows'][0]['elements'][0]['duration']['text'];

    // Exibir os resultados
    echo "Distância: " . $distance . "<br>";
    echo "Duração: " . $duration;
} else {
    // Exibir mensagem de erro se a solicitação falhar
    echo "Erro: " . $result['status'];
}

?>