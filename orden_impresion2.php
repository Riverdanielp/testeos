<?php

$registros_totales = 180; // Número total de registros
$boletas_por_ciclo = 18; // Número de boletas por ciclo

$ciclos_totales = intdiv($registros_totales, $boletas_por_ciclo);

if ($registros_totales % $boletas_por_ciclo != 0) {
    $ciclos_totales++; // Añadir un ciclo adicional si hay registros extras que no llenan completamente un ciclo
}

$espacios_ultimo_ciclo = $registros_totales % $boletas_por_ciclo;

echo 'registros_totales: ' . $registros_totales . '<br>';
echo 'boletas_por_ciclo: ' . $boletas_por_ciclo . '<br>';
echo 'ciclos_totales: ' . $ciclos_totales . '<br>';
echo 'espacios_ultimo_ciclo: ' . $espacios_ultimo_ciclo . '<br>';
$resultados = array(); // Array donde almacenaremos los resultados

// for ($ciclo = 1; $ciclo <= $ciclos_totales; $ciclo++) {
//     for ($espacio = 1; $espacio <= $boletas_por_ciclo; $espacio++) {
//         $numero_boleta = ($espacio - 1) * $ciclos_totales + $ciclo;
//         $resultados[] = $numero_boleta; // Agregar el número de boleta al array de resultados
//     }
// }

$allNumbers = range(1, $registros_totales);

// for ($ciclo = 1; $ciclo <= $ciclos_totales; $ciclo++) {
//     for ($espacio = 1; $espacio <= $boletas_por_ciclo; $espacio++) {
//         $numero_index = ($espacio - 1) * $ciclos_totales + $ciclo;
//         $resultados[] = $allNumbers[$numero_index - 1];
//     }
// }


for ($ciclo = 1; $ciclo <= $ciclos_totales; $ciclo++) {
    if ($espacios_ultimo_ciclo != 0 && $ciclo == $ciclos_totales ){
        $boletas_en_este_ciclo = $boletas_por_ciclo;
        $boletas_en_este_ciclo = $espacios_ultimo_ciclo;
        echo '<b>ULTIMO CICLO: '  . $ciclo . ' ('. $espacios_ultimo_ciclo . ' espacios)</b><br>';
    } else {
        $boletas_en_este_ciclo = $boletas_por_ciclo;
        echo '<b>CICLO: ' . $ciclo . '</b><br>';
    }
    $descontar_index = 1;
    for ($espacio = 1; $espacio <= $boletas_en_este_ciclo; $espacio++) {
        if ($espacios_ultimo_ciclo > 0 && $espacios_ultimo_ciclo < $espacio){
            $descontar_index++;
        }
        $numero_index = ($espacio - 1) * $ciclos_totales + $ciclo  - $descontar_index;
        echo 'espacio: ' . $espacio . ' = index ' . $numero_index . ' = descontar ' . $descontar_index . '<br>';
        $resultados[] = $allNumbers[$numero_index];
    }
    echo '<br>-------------------------------------------------<br>';
}

// for ($espacio = 1; $espacio <= $boletas_por_ciclo; $espacio++) {
//     for ($ciclo = 0; $ciclo < $ciclos_totales; $ciclo++) {
//         $indice = $ciclo * $boletas_por_ciclo + ($espacio - 1);
//         if (isset($allNumbers[$indice])) {
//             $resultados[] = $allNumbers[$indice]; // Agregar el número al array de resultados
//         }
//     }
// }



// $j = 0;
// $num = 0;
// for ($i = 0; $i < $registros_totales; $i++) {
//     $j++;
//     if ($num == $i){
//         echo $resultados[$i] . " ";
//     } else{
//         echo '<b>' . $resultados[$i] . '</b>'. " ";
//     }
//     if ($j == $boletas_por_ciclo){
//         echo '<br>-------------------------------------------------<br>';
//         $j = 0;
//     }
//     $num++;
// }

$j = 0;
$num = 0;
foreach ($resultados as $item){
    $j++;
    // if ($num == $i){
    //     echo $item . " ";
    // } else{
    //     echo '<b>' . $item . '</b>'. " ";
    // }
    echo $item . " ";
    if ($j == $boletas_por_ciclo){
        echo '<br>-------------------------------------------------<br>';
        $j = 0;
    }
    $num++;
}

echo '<br><br>';
echo 'num: ' . $num . '<br>';
