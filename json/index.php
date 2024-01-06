<?php

// Lee el contenido del archivo JSON
$jsonData = file_get_contents('3.json');

// Decodifica el JSON en un array asociativo
$data = json_decode($jsonData, true);

// Accede al array "data" y extrae los IDs
// $data = array_column($data['data']['0']);

// Imprime los IDs
foreach ($data['data'] as $item) {
    echo $item['0'] . "\n";
}

?>
