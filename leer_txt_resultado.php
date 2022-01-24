<?php
//Guarda el contenido del archivo en una variable
$file = "DGII_RNC.TXT";
//echo $file . '<br>';
//$archivo = file_get_contents("DGII_RNC.TXT");

//Busca la cadena 'nombre' en el contenido de la variable
//$nombre = "5401052351";
// echo $nombre . '<br>';
// $posicion = strpos($archivo, $nombre);


// var_dump($posicion);
//echo '<br><br><br>';

$nombre = $_POST['rnc'];
$lineas = file($file);//file in to an array 
if (strlen($nombre) >= 9 && strlen($nombre) <= 11 && is_numeric($nombre)){
    $posicion = 0;
    
    foreach ($lineas as $linea){
        if (strstr($linea,$nombre)){
     
            //echo "$linea";
            $datos_linea = $posicion;
        }
        $posicion++;
    }
    
    if (!isset($datos_linea)){
        //echo json_encode('CRN/Cedula no encontrado.');
        echo json_encode('No encontrado!');
    } else {
        $datos_cliente = $lineas[$datos_linea];
        $datos_cliente = utf8_encode($datos_cliente);
        echo json_encode($datos_cliente);
        //echo $datos_cliente;
    };
} else {
    echo json_encode('Solo 9 a 11 Caracteres');
};

//echo json_encode($nombre);
?>