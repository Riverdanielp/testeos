<?php

// Definir los datos iniciales
// $clientes_totales = 830;
// echo 'clientes_totales ' . $clientes_totales . '<br>';
// $premios_totales = 94;
// echo 'premios_totales ' . $premios_totales . '<br>';
// $vendedores = [
//     ['id' => 8, 'clientes' => 40],
//     ['id' => 0, 'clientes' => 590],
//     ['id' => 5, 'clientes' => 20],
//     ['id' => 6, 'clientes' => 30],
//     ['id' => 7, 'clientes' => 30],
//     ['id' => 9, 'clientes' => 30],
//     ['id' => 10, 'clientes' => 30],
//     ['id' => 11, 'clientes' => 30],
//     ['id' => 12, 'clientes' => 30]
// ];

// // Calcular la proporción de premios para cada vendedor
// $proporciones = [];
// foreach ($vendedores as $vendedor) {
//     if (isset($vendedor['clientes'])) {
//         $proporciones[] = ['id' => $vendedor['id'], 'premios' => round($vendedor['clientes'] * $premios_totales / $clientes_totales)];
//     }
// }

// // Asegurarse de que la suma de premios sea igual a la cantidad total de premios
// $suma_premios = array_sum(array_column($proporciones, 'premios'));
// echo 'suma_premios ' . $suma_premios . '<br>';
// if ($suma_premios !== $premios_totales) {
//     $diferencia = $premios_totales - $suma_premios;
//     $proporciones = array_map(function ($vendedor) use ($diferencia, $clientes_totales, $premios_totales, $suma_premios) {
//         if (isset($vendedor['clientes'])) {
//             $ajuste = $vendedor['clientes'] / $clientes_totales * $diferencia;
//             return ['id' => $vendedor['id'], 'premios' => round($vendedor['premios'] + $ajuste)];
//         }
//         return $vendedor;
//     }, $proporciones);
// }

// $suma_premios = array_sum(array_column($proporciones, 'premios'));
// echo 'suma_premios ' . $suma_premios . '<br>';
// // Imprimir los resultados
// foreach ($proporciones as $proporcion) {
//     echo "ID Vendedor: " . $proporcion['id'] . ", Premios: " . $proporcion['premios'] . "<br>";
// }


?>

<?php

// Definir los datos iniciales
$clientes_totales = 830;
$premios_totales = 94;
$vendedores = [
    ['id' => 8, 'clientes' => 40],
    ['id' => 0, 'clientes' => 590],
    ['id' => 5, 'clientes' => 20],
    ['id' => 6, 'clientes' => 30],
    ['id' => 7, 'clientes' => 30],
    ['id' => 9, 'clientes' => 30],
    ['id' => 10, 'clientes' => 30],
    ['id' => 11, 'clientes' => 30],
    ['id' => 12, 'clientes' => 30]
];

// Calcular la proporción de premios para cada vendedor
$proporciones = [];
$suma_proporciones = 0;
foreach ($vendedores as $vendedor) {
    if (isset($vendedor['clientes'])) {
        $proporcion = $vendedor['clientes'] / $clientes_totales;
        $premios_asignados = floor($proporcion * $premios_totales);
        $suma_proporciones += $premios_asignados;
        $proporciones[] = ['id' => $vendedor['id'], 'premios' => $premios_asignados, 'numeros' => $vendedor['clientes']];
    }
}

// Ajustar la asignación de premios si la suma difiere de la cantidad total de premios
$diferencia_premios = $premios_totales - $suma_proporciones;
if ($diferencia_premios > 0) {
    usort($proporciones, function ($a, $b) {
        return $a['clientes'] - $b['clientes'];
    });
    for ($i = 0; $i < $diferencia_premios; $i++) {
        $proporciones[$i % count($proporciones)]['premios'] += 1;
    }
}

// Imprimir los resultados
foreach ($proporciones as $proporcion) {
    echo "ID Vendedor: " . $proporcion['id'] . ", Numeros: " . $proporcion['numeros'] . ", Premios: " . $proporcion['premios'] . "<br>";
}
?>

<?php


$suma_premios = array_sum(array_column($proporciones, 'premios'));
echo 'suma_premios ' . $suma_premios . '<br>';

?>


