<?php

$registros_totales = 182;
$boletas_por_ciclo = 18;

$ciclos_totales = intdiv($registros_totales, $boletas_por_ciclo);

if ($registros_totales % $boletas_por_ciclo != 0) {
    $ciclos_totales++; 
}

$espacios_ultimo_ciclo = $registros_totales % $boletas_por_ciclo;

$resultados = array(); 
$allNumbers = range(1, $registros_totales);

for ($ciclo = 1; $ciclo <= $ciclos_totales; $ciclo++) {
    if ($espacios_ultimo_ciclo != 0 && $ciclo == $ciclos_totales ){
        $boletas_en_este_ciclo = $boletas_por_ciclo;
        $boletas_en_este_ciclo = $espacios_ultimo_ciclo;
    } else {
        $boletas_en_este_ciclo = $boletas_por_ciclo;
    }
    $descontar_index = 1;
    for ($espacio = 1; $espacio <= $boletas_en_este_ciclo; $espacio++) {
        $espacio_i = ($espacio - 1);
        if ($espacios_ultimo_ciclo > 0 && ($espacios_ultimo_ciclo + 1) < $espacio){
            $descontar_index++;
        }
        $numero_index = $espacio_i * $ciclos_totales + $ciclo  - $descontar_index;
        $resultados[] = $allNumbers[$numero_index];
    }
}


$j = 0;
$num = 0;
foreach ($resultados as $item){
    $j++;
    echo $item . " ";
    if ($j == $boletas_por_ciclo){
        echo '<br>-------------------------------------------------<br>';
        $j = 0;
    }
    $num++;
}

echo '<br><br>';
echo 'num: ' . $num . '<br>';