<?php //php 7.2.24
    echo "\n" ;
    echo "Generador de Cuotas! \n" ;
    echo date("d/m/Y"); 
    echo "\n" ;
    echo "\n" ;
      
    echo "\n" ;
    echo "\n" ;
    $plan=1;
    $ccuota=44;
    $monto=500000;
    $mcuota=16000;
    $fvencc=date("d/m/Y");
    for ($i=1;$i<=$ccuota;$i++) {
        $fvencc=date("d/m/Y",strtotime($fvencc."+ 1 days")); 
        Echo "Plan $plan, cuota $i, monto $mcuota, venc. $fvencc\n" ;
    };
?>