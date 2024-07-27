<?php


function reordenarDiasSemana() {
    date_default_timezone_set('America/Lima'); // Establece la zona horaria
    $diasSemana = [
        1 => 'lunes',
        2 => 'martes',
        3 => 'miercoles',
        4 => 'jueves',
        5 => 'viernes',
        6 => 'sabado',
        7 => 'domingo'
    ];
    $diaActual = date('N'); // Obtiene el día de la semana actual (1 para lunes, 7 para domingo)
    $diasReordenados = [];

    // Reordena el array de días de la semana según el día actual
    for ($i = $diaActual; $i <= 7; $i++) {
        $diasReordenados[$i] = $diasSemana[$i];
    }
    for ($i = 1; $i < $diaActual; $i++) {
        $diasReordenados[$i] = $diasSemana[$i];
    }

    return $diasReordenados;
}

function obtenerProximoDiaYHora($arrayDiasHoras) {
    // date_default_timezone_set('America/Santo_Domingo'); // Establece la zona horaria Etc/GMT-4
    date_default_timezone_set('Etc/GMT-10');
    $diasReordenados = reordenarDiasSemana();
    
    $now = new DateTime('now', new DateTimeZone('America/Santo_Domingo'));
    $proximo = null;
    $fechaActual = $now->format('Y-m-d');
    $fechaHoraActual = $now->format('Y-m-d H:i:s');
    // $fechaActual = date('Y-m-d');
    // $fechaHoraActual = date('Y-m-d H:i:s');
    echo 'Fecha Actual: '.$fechaHoraActual.'<br>';

    $j = 0;
    foreach ($diasReordenados as $indice => $dia) {
        echo '<b>'.$dia.'</b><br>';
        $hora = $arrayDiasHoras[$indice];
        echo 'Hora sorteo: '.$hora.'<br>';
        echo 'Dias Agregados: '.$j.'<br>';
        // $nuevaFecha = date('Y-m-d', strtotime($fechaActual . ' +'.$j.' day'));
        $now = new DateTime('now', new DateTimeZone('America/Santo_Domingo'));
        $fechaActual = $now->format('Y-m-d');
        $nuevaFecha = $now->modify('+'.$j.' day')->format('Y-m-d');
        echo 'Fecha: '.$nuevaFecha.'<br>';
        if ($hora !== null) {
            if ($j > 0) {
                $proximo = $nuevaFecha.' ' . $hora;
                break;
            } else {
                $now = new DateTime('now', new DateTimeZone('America/Santo_Domingo'));
                $horaActual = $now->format('H:i');
                // $horaActual = date('H:i'); 
                echo 'Hora Actual: '.$horaActual.'<br>';
                if ($horaActual <= $hora) {
                    $proximo = $fechaActual.' ' . $hora;
                    break;
                }
            }
        }
        echo '<br>';
        $j++;
    }
    return $proximo;

}

$arrayDiasHoras = [
    1 => '10:00', // Lunes
    2 => '14:30', // Martes
    3 => '09:55', // Miércoles
    4 => '14:00', // Jueves
    5 => null,    // Viernes
    6 => '19:55', // Sábado
    7 => null     // Domingo
];

// Obtener el próximo día y hora
$proximo = obtenerProximoDiaYHora($arrayDiasHoras);
echo '<h1>Proximo: ' . $proximo . '</h1>'; // Fecha y hora del próximo evento


