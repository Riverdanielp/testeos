<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Método Francés</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        
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
                            <label for="cantidad">Ingresa la cantidad de las cuotas:</label>
                        </td>
                        <td>
                            <input name="cantidad" required="required" type="number" value="<?php echo (isset($_POST['cantidad'])) ? $_POST['cantidad'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tasa_int">Tasa de Interés:</label>
                        </td>
                        <td>
                            <input name="tasa_int" required="required" step="0.0000001" type="number" value="<?php echo (isset($_POST['tasa_int'])) ? $_POST['tasa_int'] : ''; ?>" />
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

    function calcular_cuota_frances($valor,$cantidad,$tasa_int){
        /////////////// C = V * ( ((1+i)^N) * i ) / ( ((1+i)^N) - 1 )

        $V = floatval($valor);
        $n = intval($cantidad);
        $i = floatval($tasa_int) / 100;
        // $i = floatval($i) ;

        $sub_calculo = sub_calculo_frances($i,$n); // ----> ((1+i)^N)
        $dividendo_1 = floatval($sub_calculo) * $i; // ----> ( ((1+i)^N) * i )
        $dividendo_2 = floatval($sub_calculo) - 1;  // ----> ( ((1+i)^N) - 1 )
        $multiplo = floatval($dividendo_1) / floatval($dividendo_2); // ----> ( ((1+i)^N) * i) / ( ((1+i)^N) - 1 )
        $cuota = floatval($V) * floatval($multiplo);
        
        return floatval($cuota);
    }

    function sub_calculo_frances($tasa_int,$cantidad){
        // ((1+i)^N)

        $i = floatval($tasa_int);
        $n = intval($cantidad);

        $sub_cal_1 = 1 + $i; // (1+i) ---> ((1+i)^N)
        $resultado = pow(floatval($sub_cal_1),$n); // ^N ---> ((1+i)^N)

        return $resultado;
    }

    function simular_cuotas_frances($valor,$cantidad,$tasa_int){

        $Capital = floatval($valor);
        $Capital_saldo = floatval($valor);
        $Cantidad = intval($cantidad);
        $cuota = calcular_cuota_frances($Capital,$Cantidad,$tasa_int);
        $TasaInt = floatval($tasa_int) / 100;

        ?>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <thead>
                <tr>
                    <th>Nro. Cuota</th>
                    <th>Total Cuota</th>
                    <th>Interés Cuota</th>
                    <th>Capital Cuota</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>

        <?php
        $interes_real_total = 0;
        $capital_real_total = 0;

        for ($i=1; $i <= $Cantidad ; $i++) { 
            
            $interes_cuota = $TasaInt * floatval($Capital_saldo);
            $capital_cuota = floatval($cuota) - floatval($interes_cuota);
            $Capital_saldo = floatval($Capital_saldo) - floatval($capital_cuota);
            
            $interes_real_total = floatval($interes_real_total) + floatval($interes_cuota);
            $capital_real_total = floatval($capital_real_total) + floatval($capital_cuota);
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo number_format($cuota,2,",", ".") ?></td>
                    <td><?php echo number_format($interes_cuota,2,",", ".") ?></td>
                    <td><?php echo number_format($capital_cuota,2,",", ".") ?></td>
                    <td><?php echo number_format($Capital_saldo,2,",", ".") ?></td>
                </tr>
            <?php
        }
        
        ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo $i ?></th>
                    <th></th>
                    <th><?php echo number_format($interes_real_total,2,",", ".") ?></th>
                    <th><?php echo number_format($capital_real_total,2,",", ".") ?></th>
                    <th></th>
                </tr>
            </tfoot>

        </table>
        <?php
    }

    $valor = floatval ($_POST['valor']);
    $cantidad = floatval ($_POST['cantidad']);
    $tasa_int = floatval ($_POST['tasa_int']);
    
    echo '<p style="text-align: center; margin-left: auto; margin-right: auto;">';
    echo 'Valor de Préstamo: ' . $valor . "<br/>\n";
    echo 'En Cuotas: ' . $cantidad . "<br/>\n";
    echo 'Tasa de Interes: ' . $tasa_int . "<br/>\n";
    //echo '<br>';

    echo '</p>';
    echo '<p style="text-align: center; margin-left: auto; margin-right: auto;">';
    echo 'La cuota definida es: ';
    $monto_cuota = calcular_cuota_frances($valor,$cantidad,$tasa_int);
    echo ($monto_cuota);
    //echo number_format($monto_cuota,2,",", ".");
    echo '</p>';
    echo simular_cuotas_frances($valor,$cantidad,$tasa_int);

}
 
?>
    </body>
</html>