<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Calcular Interes Frances</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    function calcular_interes($indice,$cantidad,$posible_interes){
        // ((K14*((1+K14)^K15))     /       (((1+K14)^K15)-1))
        //(floatval($posible_interes)*( pow(1+floatval($posible_interes),intval($cantidad)) )); 
        //((pow(1+floatval($posible_interes),intval($cantidad)))-1);

        $primer_dividendo = pow(( 1 + floatval($posible_interes) ),intval($cantidad)) - 1;
        $segundo_dividendo =  ( floatval($posible_interes) * pow(( 1 + floatval($posible_interes) ),intval($cantidad)) );
  
        $division = floatval($primer_dividendo) / floatval($segundo_dividendo);
        
        //return floatval($division);
        //if (floatval($division) == floatval($indice)){
        if (bccomp($division,$indice,5) == 0){
            echo $posible_interes;
            return $posible_interes;
        } else {
            //echo 'Interes probado es: ' . $posible_interes . " y dió " . $division . "<br/>\n";
            calcular_interes(floatval($indice),intval($cantidad),(floatval($posible_interes) + floatval(0.0001)));
        };
    };
    $valor = floatval ($_POST['valor']);
    $cuota = floatval ($_POST['cuota']);
    $cantidad = floatval ($_POST['cantidad']);
    
    echo 'Valor de Préstamo: ' . $valor . "<br/>\n";
    echo 'En Cuotas: ' . $cantidad . "<br/>\n";
    echo 'Valor de: ' . $cuota . "<br/>\n";
    echo '<br>';

    $indice = $valor / $cuota;
    echo 'Indice a trabajar: ' . $indice . "<br/>\n";
    echo '<br>';

    echo calcular_interes($indice,$cantidad,0.01);
}
 
?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="valor">Ingresa el valor del Préstamo:</label>
                        </td>
                        <td>
                            <input name="valor" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['valor'])) ? $_POST['valor'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cuota">Ingresa el valor de la cuota:</label>
                        </td>
                        <td>
                            <input name="cuota" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['cuota'])) ? $_POST['cuota'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cantidad">Ingresa la cantidad de las cuotas:</label>
                        </td>
                        <td>
                            <input name="cantidad" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['cantidad'])) ? $_POST['cantidad'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" rowspan="1">
                            <input value="Procesar" type="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>