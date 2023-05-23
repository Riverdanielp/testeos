<?php

$numero = 3;
$multiplo = 12;

    
    if(( $numero % $multiplo ) == 0){
    
    	echo $numero . ' es multiplo de ' . $multiplo;
        
    }else{
    
    	echo $numero . ' no es multiplo de ' . $multiplo;
    
    }

    echo '<br> Resultado = ' . ( $numero % $multiplo );