<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Calcular Interes Frances</title>
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
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{

    function calcular_capital($valor,$cuota,$cantidad){
        $interes_simple = 100 / intval($cantidad);
        $saldo = floatval($valor);
        $total = floatval($cuota) * intval($cantidad);
        $interes_total = floatval($total) - floatval($valor);
        if ($interes_total < 0){
            $interes_total = 0;
        }
        $porcenta_real_total = 0;
        $interes_real_total = 0;
        $capital_real_total = 0;

        //$dividendo = 150;
        
        $porc_cap = 100 * floatval($valor) / floatval($total);
        $porc_cap_p = floatval($porc_cap) / floatval($cantidad);
        $dividendo = floatval($porc_cap_p) * floatval($cantidad);

        $cuota_cero = ((((intval($cantidad)*$dividendo)/intval($cantidad))-(($dividendo)/2) )/intval($cantidad));
        ?>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <thead>
                <tr>
                    <th>Nro. Cuota</th>
                    <th>Total Cuota</th>
                    <th>Porcentaje Capital</th>
                    <th>Interés Cuota</th>
                    <th>Capital Cuota</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>

        <?php
        for ($i=1; $i <= $cantidad ; $i++) { 
            //$dividendo = ($i == 1) ? 0 : 150;
            $porcentaje = ((((intval($cantidad)-$i)*$dividendo)/intval($cantidad)) - (($dividendo)/2)) + floatval($cuota_cero);

            $porcenta_real = 0;
            $porcenta_real = floatval($interes_simple) + ((floatval($interes_simple) * floatval($porcentaje))/100);
            $porcenta_real_total = floatval($porcenta_real_total) + floatval($porcenta_real);

            $interes_real = 0;
            $interes_real = (floatval($porcenta_real)*floatval($interes_total))/100;
            $interes_real_total = floatval($interes_real_total) + floatval($interes_real);

            $capital_real = 0;
            $capital_real = ( floatval($cuota) - floatval($interes_real) );
            $capital_real_total = floatval($capital_real_total) + floatval($capital_real);

            $saldo = floatval($saldo) - floatval($capital_real);

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo number_format($cuota,2,',','.') ?></td>
                    <td><?php echo $porcenta_real ?></td>
                    <td><?php echo number_format($interes_real,2,',','.') ?></td>
                    <td><?php echo number_format($capital_real,2,',','.') ?></td>
                    <td><?php echo number_format($saldo,2,',','.') ?></td>
                </tr>
            <?php
            //echo 'Nro cuota: ' . $i . " - porcentaje simple = " . $interes_simple . " - porcentaje interes = " . $porcenta_real . " - Interes Cuota = " . $interes_real . "<br/>\n";
        }
        ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo $i ?></th>
                    <th><?php echo number_format($total,2,',','.') ?></th>
                    <th><?php echo $porcenta_real_total ?></th>
                    <th><?php echo number_format($interes_real_total,2,',','.') ?></th>
                    <th><?php echo number_format($capital_real_total,2,',','.') ?></th>
                    <th><?php echo number_format($saldo,2,',','.') ?></th>
                </tr>
            </tfoot>

        </table>
        <?php
        //echo "-------------------------------------------------------------------------------------------------------- <br>";
        //echo 'Total Cuotas: ' . $i . " - porcentaje simple total = " . $interes_total . " - porcentaje interes total = " . $porcenta_real_total . " - Interes Cuota = " . $interes_real_total . "<br/>\n";

    }

    $valor = floatval ($_POST['valor']);
    $cuota = floatval ($_POST['cuota']);
    $cantidad = floatval ($_POST['cantidad']);
    
    echo '<p style="text-align: center; margin-left: auto; margin-right: auto;">';
    echo 'Valor de Préstamo: ' . number_format($valor) . "<br/>\n";
    echo 'En Cuotas: ' . number_format($cantidad) . "<br/>\n";
    echo 'Valor de Cuota: ' . number_format($cuota) . "<br/>\n";
    //echo '<br>';
    $valor_total = floatval($cuota) * floatval($cantidad);
    echo 'Valor Total del Crédito: ' . number_format($valor_total) . "<br/>\n";
    $int_total = floatval($valor_total) - floatval($valor);
    echo 'Interés Total del Crédito: ' . number_format($int_total) . "<br/>\n";
    $porc_int = 100 * floatval($int_total) / floatval($valor);
    echo 'Porcentaje de Interés: ' . number_format($porc_int,2) . "%<br/>\n";
    $porc_cap = 100 * floatval($valor) / floatval($valor_total);
    $porc_cap_p = floatval($porc_cap) / floatval($cantidad);
    echo 'Porcentaje de Capital: ' . number_format($porc_cap,2) . "%<br/>\n";
    echo 'Porcentaje Prom. de Capital: ' . number_format($porc_cap_p,2) . "%<br/>\n";

    //$indice = 100 * floatval($int_total) / floatval($valor);
    $indice = 10 * floatval($porc_cap_p); // / floatval($valor);
    echo 'Indice de balanceo: ' . floatval($indice) . "<br/>\n";

    echo '</p>';

    echo calcular_capital($valor,$cuota,$cantidad);
}
 
?>
    </body>
</html>