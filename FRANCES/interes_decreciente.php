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

    function calcular_interes($valor,$cuota,$cantidad){
        $dividendo = 150;
        $interes_simple = 100 / intval($cantidad);
        $total = floatval($cuota) * intval($cantidad);
        $interes_total = floatval($total) - floatval($valor);
        $porcenta_real_total = 0;
        $interes_real_total = 0;
        $capital_real_total = 0;
        $cuota_cero =  ((((intval($cantidad)*$dividendo)/intval($cantidad))-(($dividendo)/2) )/intval($cantidad));
        ?>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <thead>
                <tr>
                    <th>Nro. Cuota</th>
                    <th>Porcentaje Interés</th>
                    <th>Interés Cuota</th>
                    <th>Capital Cuota</th>
                    <th>Total Cuota</th>
                </tr>
            </thead>
            <tbody>

        <?php
        for ($i=1; $i <= $cantidad ; $i++) { 
            //$dividendo = ($i == 1) ? 0 : 150;
            $porcentaje = ((((intval($cantidad)-$i)*$dividendo)/intval($cantidad)) - (($dividendo)/2)) + floatval($cuota_cero);

            $porcenta_real = floatval($interes_simple) + ((floatval($interes_simple) * floatval($porcentaje))/100);
            $porcenta_real_total = floatval($porcenta_real_total) + floatval($porcenta_real);

            $interes_real = (floatval($porcenta_real)*floatval($interes_total))/100;
            $interes_real_total = floatval($interes_real_total) + floatval($interes_real);

            $capital_real = ( floatval($cuota) - floatval($interes_real) );
            $capital_real_total = floatval($capital_real_total) + floatval($capital_real);

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $porcenta_real ?></td>
                    <td><?php echo $interes_real ?></td>
                    <td><?php echo $capital_real ?></td>
                    <td><?php echo $cuota ?></td>
                </tr>
            <?php
            //echo 'Nro cuota: ' . $i . " - porcentaje simple = " . $interes_simple . " - porcentaje interes = " . $porcenta_real . " - Interes Cuota = " . $interes_real . "<br/>\n";
        }
        ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo $i ?></th>
                    <th><?php echo $porcenta_real_total ?></th>
                    <th><?php echo $interes_real_total ?></th>
                    <th><?php echo $capital_real_total ?></th>
                    <th><?php echo $total ?></th>
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
    echo 'Valor de Préstamo: ' . $valor . "<br/>\n";
    echo 'En Cuotas: ' . $cantidad . "<br/>\n";
    echo 'Valor de: ' . $cuota . "<br/>\n";
    //echo '<br>';

    echo '</p>';

    echo calcular_interes($valor,$cuota,$cantidad);
}
 
?>
    </body>
</html>