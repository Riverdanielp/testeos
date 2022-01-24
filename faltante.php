<?php

// $TestArray = array(1,2,3,5,9);

// $ArrayRange = range(1,max($TestArray));

// $MissingValues ​​= array_diff($arrayRange, $TestArray);

// echo $missingValues;

// sort(array, ordenarpor); 
// · 0 = Orden por defecto comparando los valores sin importar de su tipo de valor.
// · 1 = Orden numérico de los valores del array.
// · 2 = Orden comparando los valores como si fuesen cadenas de texto.
// · 3 = Orden por cadenas de texto usando la configuración regional del servidor.
// · 4 = Orden de los elementos como cadenas de texto usando el «orden natural», es decir,

//if (count($array) > 1) {
            // $Nro_siguiente = $desde;
            // foreach ($array as $item){
            //     if ($item == $Nro_siguiente) {
            //         $Nro_siguiente = $Nro_siguiente + $secuencia;
            //         continue; 
            //     } else {
            //         //$Nro_siguiente = $item + 1;
            //         return $Nro_siguiente;
            //         break;
            //     }
            // }
        //}

function NroFaltante($array,$desde,$secuencia){
    
    if (is_array($array)){
        sort($array, 1);
        
        $Nro_siguiente = $desde;
        for($i = 0; $i < count($array); $i++){
            $i_sig = $i + 1;
            if(array_key_exists ($i_sig,$array)){
                
                if ($array[$i] == $Nro_siguiente) {
                    $Nro_siguiente = $Nro_siguiente + $secuencia;
                    continue; 
                } else {
                    //$Nro_siguiente = $item + 1;
                    return $Nro_siguiente;
                    break;
                }
            } else {
                if ($array[$i] == $Nro_siguiente){
                    $Nro_siguiente = $Nro_siguiente + $secuencia;
                        return $Nro_siguiente;
                } else {
                    return $Nro_siguiente;
                }
            }

        }
    } else {
        $Nro_siguiente = $array + $secuencia;
        return $Nro_siguiente;
    }
}

$TestArray = array(2,1,5,8,3,5,9,0);

echo NroFaltante($TestArray,2201,10);
echo "<br>";
echo "<br>";
var_dump($TestArray);
echo "<br>";
echo "<br>";
echo "----------------------------------------------------------------------------------------------------------";
echo "<br>";
echo "<br>";

$TestArray2 = array(1000);
echo NroFaltante($TestArray2,1001,1);



echo "<br>";
echo "<br>";
echo "----------------------------------------------------------------------------------------------------------";
echo "<br>";
echo "<br>";


$mes_anterior = date('Y-m', strtotime('-11 month'));
$quincena_ini = date("$mes_anterior-15");
$quincena_fin = date("$mes_anterior-t");
echo $quincena_ini;
echo "<br>";
echo $quincena_fin;
?>