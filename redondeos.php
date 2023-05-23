<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redondeos - Novabox</title>
</head>
<body>
            
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="valor">Ingresa el valor a redondear:</label>
                        </td>
                        <td>
                            <input name="valor" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['valor'])) ? $_POST['valor'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="prec">Ingresa el valor de la precisión:</label>
                        </td>
                        <td>
                            <input name="prec" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['prec'])) ? $_POST['prec'] : ''; ?>" />
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
        
<?php


if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $valor = floatval($_POST['valor']);
    
    $precision = floatval($_POST['prec']);

    function redondear_enteros($valor,$prec) {
        if ($prec > 0){
            $prec = floatval($prec);
        } else {
            $prec = intval(1);
        }
        $float_redondeado=round($valor / $prec) * $prec;
        return $float_redondeado;
    }


    echo '<p style="text-align: center; margin-left: auto; margin-right: auto;">';
    echo 'Valor Ingresado: ' . ($valor) . "<br/>\n";


    echo '4 Decimales: ' . round($valor,4) . "<br/>\n";

    echo '3 Decimales: ' . round($valor,3) . "<br/>\n";

    echo '2 Decimales: ' . round($valor,2) . "<br/>\n";

    echo '1 Decimales: ' . round($valor,1) . "<br/>\n";

    echo '0 Decimales: ' . round($valor) . "<br/>\n";

    echo "-----------------------------------------------<br/>\n";

    echo 'Entero 1: ' . redondear_enteros($valor,1) . "<br/>\n";

    echo 'Entero 10: ' . redondear_enteros($valor,10) . "<br/>\n";

    echo 'Entero 100: ' . redondear_enteros($valor,100) . "<br/>\n";

    echo 'Entero 1000: ' . redondear_enteros($valor,1000) . "<br/>\n";

    echo "-----------------------------------------------<br/>\n";

    echo 'Entero 2: ' . redondear_enteros($valor,2) . "<br/>\n";

    echo 'Entero 20: ' . redondear_enteros($valor,20) . "<br/>\n";

    echo 'Entero 200: ' . redondear_enteros($valor,200) . "<br/>\n";

    echo 'Entero 2000: ' . redondear_enteros($valor,2000) . "<br/>\n";

    echo "-----------------------------------------------<br/>\n";

    echo 'Entero 5: ' . redondear_enteros($valor,5) . "<br/>\n";

    echo 'Entero 15: ' . redondear_enteros($valor,15) . "<br/>\n";

    echo 'Entero 500: ' . redondear_enteros($valor,500) . "<br/>\n";

    echo 'Entero 5000: ' . redondear_enteros($valor,5000) . "<br/>\n";

    echo "-----------------------------------------------<br/>\n";

    echo "-----------------------------------------------<br/>\n";


    echo '<b>Redondeo Especifico ' . $precision . ': </b>' . redondear_enteros($valor,$precision) . "<br/>\n";


    echo '</p>';

}

?>
</body>
</html>