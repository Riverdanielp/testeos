<?php
function tasa($capital, $cuota, $cuotas)
{
    return (($cuota * $cuotas) - $capital) / $capital / $cuotas * 12;
}

// echo tasa(1000, 105, 12);

function genera_pago($monto, $cuotas, $pago){
    $pagado = 0;
    for($i = 0 ; $i < $cuotas ; $i++){
        $pagado += $pago;
        $cuotas_restantes = $cuotas - $i;
        $pago_restante = $monto - $pagado;
        if($pagado >= $monto){
            $cuotas_restantes = 0;
            $pago_restante = 0;
        }
        $orden = $i + 1;
        echo "<p>Cuota: {$orden} pago: {$pago} pagado: {$pagado} cuotas restantes: {$cuotas_restantes} monto restante: {$pago_restante} </p>";
    }
}

echo genera_pago(105000, 12, 145000);