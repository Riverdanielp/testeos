<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Calcular Capital Decreciente</title>
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
                            <label for="entrega">Ingresa el valor de la entrega:</label>
                        </td>
                        <td>
                            <input name="entrega" required="required" step="0.000001" type="number" value="<?php echo (isset($_POST['entrega'])) ? $_POST['entrega'] : ''; ?>" />
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

    $valor = 0;
    $cuota = 0;
    $entrega = 0;
    $cantidad = 0;
    $saldo = 0;
    $valor_total = 0;
    $interes_total = 0;
    $porcentaje_interes = 0;
    $porcentaje_capital = 0;
    $porcentaje_promedio = 0;
    $indice_balanceo = 0;
    $array_cuotas = array();

    function asNum($num){
        return number_format($num);
    }

    function porcentajeDecreciente($n) {
        // Definir las constantes de la función exponencial inversa
        $a = 100;
        $b = 1;
        $c = 1;
      
        // Calcular los valores de la función para cada x
        $partes = array();
        for ($x = 0; $x < $n; $x++) {
          $valor = $a / ($b*$x + $c);
          array_push($partes, $valor);
        }
      
        // Ordenar las partes de mayor a menor
        arsort($partes);
      
        // Ajustar los valores para que sumen exactamente 100
        $factor = array_sum($partes) / 100;
        foreach ($partes as $key => $valor) {
          $partes[$key] = $valor / $factor;
        }
      
        // Devolver las partes
        return $partes;
    }

    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $valor = floatval ($_POST['valor']);
        $entrega = floatval ($_POST['entrega']);
        $cuota = floatval ($_POST['cuota']);
        $cantidad = floatval ($_POST['cantidad']);

        // echo '<pre>';
        // var_dump(porcentajeDecreciente($cantidad));
        // echo '</pre>';
         

        $saldo = 0;
        $valor_total = floatval($cuota) * intval($cantidad) + floatval($entrega);
        $interes_total = floatval($valor_total) - floatval($valor);
        if ($interes_total < 0){
            $interes_total = 0;
        }
        $porcentaje_interes = 100 * floatval($interes_total) / floatval($valor_total);
        $porcentaje_capital = 100 * floatval($valor) / floatval($valor_total);
        $porcentaje_promedio = 0;
        $indice_balanceo = 0;
        
        function array_cuotas($valor,$entrega,$cuota,$cantidad){
            $cantidad_cuotas = intval ($cantidad);
            $array_cuotas = [];
            $valor_total = floatval($cuota) * intval($cantidad) + floatval($entrega);
            $saldo = $valor_total;
            $interes_total = floatval($valor_total) - floatval($valor);
            if ($interes_total < 0){
                $interes_total = 0;
            }
            $porcentaje_interes = 100 * floatval($interes_total) / floatval($valor_total);
            $porcentaje_capital = 100 - $porcentaje_interes;

            // for ($i = 1; $i <= $cantidad; $i++) { 
            //     // $total_capital = $cuota * $porcentaje_capital / 100;
            //     // $total_interes = $cuota * $porcentaje_interes / 100;
            //     $saldo = $saldo - $cuota;
            //     $porcentaje_cuota = 100 * floatval($cuota) / floatval($valor_total);
            //     $total_interes = $interes_total * $porcentaje_cuota / 100;
            //     $total_capital = $cuota - $total_interes;
            //     $porcentaje_interes_cuota = 100 * floatval($total_interes) / floatval($interes_total);
            //     $porcentaje_capital_cuota = 100 * floatval($total_capital) / floatval($valor);
            //     $sub_cuota = array(
            //         'orden' => $i,
            //         'cuota' => $cuota,
            //         'porcentaje_capital' => $porcentaje_capital_cuota,
            //         'porcentaje_interes' => $porcentaje_interes_cuota,
            //         'total_capital' => $total_capital,
            //         'total_interes' => $total_interes,
            //         'saldo' => $saldo,
            //     );
        
            //     $array_cuotas[] = $sub_cuota;
            // }
            
            if ($entrega > 0){
                $cantidad_cuotas += 1;
                $porcentajeDecreciente = porcentajeDecreciente($cantidad_cuotas);
                $i = 0;
            } else {
                $porcentajeDecreciente = porcentajeDecreciente($cantidad_cuotas);
                $i = 1;
            }
            foreach ($porcentajeDecreciente as $item) { 
                if ($i == 0){
                    // $total_interes = $entrega * $porcentaje_interes / 100;
                    // $total_capital = $entrega - $total_interes;
                    $saldo = $saldo - $entrega;
                    $porcentaje_cuota = 100 * floatval($entrega) / floatval($valor_total);
                    $porcentaje_interes_decreciente = (($item + $porcentaje_cuota) / 2);

                    //seguimos los calculos normales
                    //$total_interes = $interes_total * $porcentaje_interes_decreciente / 100;
                    $total_interes = $entrega * $porcentaje_interes / 100;
                    $total_capital = $entrega - $total_interes;
                    $porcentaje_interes_cuota = ($interes_total > 0) ? 100 * floatval($total_interes) / floatval($interes_total) : 0;
                    $porcentaje_capital_cuota = ($valor > 0) ? 100 * floatval($total_capital) / floatval($valor) : 0;
    
                    $sub_cuota = array(
                        'orden' => 0,
                        'cuota' => $entrega,
                        'porcentaje_cuota' => $porcentaje_cuota,
                        'porcentaje_decreciente' => $item,
                        'porcentaje_capital' => $porcentaje_capital_cuota,
                        'porcentaje_interes' => $porcentaje_interes_cuota,
                        'total_capital' => $total_capital,
                        'total_interes' => $total_interes,
                        'saldo' => $saldo,
                    );
            
                    $array_cuotas[] = $sub_cuota;
                } else {
                    // $total_capital = $cuota * $porcentaje_capital / 100;
                    // $total_interes = $cuota * $porcentaje_interes / 100;
                    $saldo = $saldo - $cuota;
                    $porcentaje_cuota = 100 * floatval($cuota) / floatval($valor_total);
                    //iniciamos a calcular el interes decreciente con el % del array
                    $porcentaje_interes_decreciente = (($item + $porcentaje_cuota) / 2);

                    //seguimos los calculos normales
                    //$total_interes = $interes_total * $porcentaje_interes_decreciente / 100;
                    $total_interes = $cuota * $porcentaje_interes / 100;
                    $total_capital = $cuota - $total_interes;
                    $porcentaje_interes_cuota = ($interes_total > 0) ? 100 * floatval($total_interes) / floatval($interes_total) : 0;
                    $porcentaje_capital_cuota = ($valor > 0) ? 100 * floatval($total_capital) / floatval($valor) : 0;
                    $sub_cuota = array(
                        'orden' => $i,
                        'cuota' => $cuota,
                        'porcentaje_cuota' => $porcentaje_cuota,
                        'porcentaje_decreciente' => $item,
                        'porcentaje_capital' => $porcentaje_capital_cuota,
                        'porcentaje_interes' => $porcentaje_interes_cuota,
                        'total_capital' => $total_capital,
                        'total_interes' => $total_interes,
                        'saldo' => $saldo,
                    );
            
                    $array_cuotas[] = $sub_cuota;
                }
                $i++;
            }
            return $array_cuotas;
        }
        $array_cuotas = array_cuotas($valor,$entrega,$cuota,$cantidad);
    }

?>
        <p style="text-align: center; margin-left: auto; margin-right: auto;">
            Valor del Capital: <?php echo asNum($valor) ?><br>
            Valor Total de la Entrega: <?php echo asNum($entrega) ?><br>
            Valor de Cuota: <?php echo asNum($cuota) ?><br>
            En Cuotas: <?php echo asNum($cantidad) ?><br>
            Valor Total del Crédito: <?php echo asNum($valor_total) ?><br>
            Interés Total del Crédito: <?php echo asNum($interes_total) ?><br>
            Porcentaje de Interés: <?php echo asNum($porcentaje_interes) ?>%<br>
            Porcentaje de Capital: <?php echo asNum($porcentaje_capital) ?>%<br>
            Porcentaje Prom. de Capital: <?php echo asNum($porcentaje_promedio) ?>%<br>
            Indice de balanceo: <?php echo asNum($indice_balanceo) ?><br>
        </p>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <thead>
                <tr>
                    <th>Nro. Cuota</th>
                    <th>Total Cuota</th>
                    <th>Porcentaje Cuota</th>
                    <th>Porcentaje Decreciente</th>
                    <th>Porcentaje Capital</th>
                    <th>Capital Cuota</th>
                    <th>Porcentaje Interés</th>
                    <th>Interés Cuota</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total_porcentaje_capital = 0;
                    $total_porcentaje_interes = 0;
                    $total_capital = 0;
                    $total_interes = 0;
                    $porcentaje_cuota = 0;
                    $porcentaje_decreciente = 0;
                ?>
                <?php foreach ($array_cuotas as $item) : ?>
                    <tr>
                        <td><?php echo $item['orden'] ?></td>
                        <td><?php echo asNum($item['cuota']) ?></td>
                        <td><?php echo $item['porcentaje_cuota'] ?></td>
                        <td><?php echo $item['porcentaje_decreciente'] ?></td>
                        <td><?php echo $item['porcentaje_capital'] ?></td>
                        <td><?php echo asNum($item['total_capital']) ?></td>
                        <td><?php echo $item['porcentaje_interes'] ?></td>
                        <td><?php echo asNum($item['total_interes']) ?></td>
                        <td><?php echo asNum($item['saldo']) ?></td>
                        <?php 
                            $total_porcentaje_capital += floatval($item['porcentaje_capital']);
                            $total_porcentaje_interes += floatval($item['porcentaje_interes']);
                            $total_capital += floatval($item['total_capital']);
                            $total_interes += floatval($item['total_interes']);
                            $porcentaje_cuota += floatval($item['porcentaje_cuota']);
                            $porcentaje_decreciente += floatval($item['porcentaje_decreciente']);
                        ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo asNum($cantidad) ?></th>
                    <th><?php echo asNum($valor_total) ?></th>
                    <th><?php echo asNum($porcentaje_cuota) ?></th>
                    <th><?php echo asNum($porcentaje_decreciente) ?></th>
                    <th><?php echo asNum($total_porcentaje_capital) ?></th>
                    <th><?php echo asNum($total_capital) ?></th>
                    <!-- <th>100</th> -->
                    <th><?php echo asNum($total_porcentaje_interes) ?></th>
                    <th><?php echo asNum($total_interes) ?></th>
                    <th><?php echo asNum($saldo) ?></th>
                </tr>
            </tfoot>

        </table>
    </body>
</html>