<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ensayo con fechas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>

    
<?php
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $reg_tipo_periodo = ($_POST['reg_tipo_periodo']);
        $fecha_ini = ($_POST['fecha_ini']);
        $cantidad = intval($_POST['cantidad']);
    }
?>
    <form method="post">
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <tbody>
                <tr>
                    <td>
                        <label for="fecha_ini">Tipo de Periodo:</label>
                    </td>
                    <td>
                    <select class="form-control" name="reg_tipo_periodo">
                        <option value="diario" <?php echo (isset($reg_tipo_periodo) && $reg_tipo_periodo == "diario") ? 'selected' :'' ?>>Diario</option>
                        <option value="semanal" <?php echo (isset($reg_tipo_periodo) && $reg_tipo_periodo == "semanal") ? 'selected' :'' ?>>Semanal</option>
                        <option value="quincenal" <?php echo (isset($reg_tipo_periodo) && $reg_tipo_periodo == "quincenal") ? 'selected' :'' ?>>Quincenal</option>
                        <option value="mensual" <?php echo (isset($reg_tipo_periodo) && $reg_tipo_periodo == "mensual") ? 'selected' :'' ?>>Mensual</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fecha_ini">Ingresa Fecha de Inicio:</label>
                    </td>
                    <td>
                        <input name="fecha_ini" value="<?php echo (isset($fecha_ini)) ? $fecha_ini : date('Y-m-d') ?>" required="required" type="date" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cantidad">Cantidad:</label>
                    </td>
                    <td>
                        <input name="cantidad" value="<?php echo (isset($cantidad)) ? $cantidad :'' ?>"  required="required" step="1" type="number" />
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
    
<?php if ($_SERVER['REQUEST_METHOD']=='POST') : ?>
    <?php
        //$fecha_fin = date('Y-m-d');
        $total = 0;
        $fecha_f = new DateTime($fecha_ini);
        if ($reg_tipo_periodo == 'diario'){
            $tipo_periodo = '2';
            $intervalo = 'P' . $cantidad . 'D';
            $valor = 50.00;
        } elseif ($reg_tipo_periodo == 'semanal'){
            $tipo_periodo = '3';
            $intervalo = 'P' . $cantidad . 'W';
            $valor = 150.00;
        } elseif ($reg_tipo_periodo == 'quincenal'){
            $tipo_periodo = '4';
            $quincenal = 15 * ($cantidad);
            $intervalo = 'P' . $quincenal . 'D';
            $valor = 300.00;
        } elseif ($reg_tipo_periodo == 'mensual'){
            $tipo_periodo = '5';
            $intervalo = 'P' . $cantidad . 'M';
            $valor = 500.00;
        }
        $fecha_f->add(new DateInterval($intervalo));
        $fecha_fin = $fecha_f->format('Y-m-d');
        $total = floatval($valor * $cantidad);

        
        $fechaini = new DateTime($fecha_ini);
        $fechafin = new DateTime($fecha_fin);
        $interval = $fechaini->diff($fechafin);
        $dias_de_dif = $interval->format('%R%a días');  // $fechafin->diff($fechaini); -----------> -10 días // $fechaini->diff($fechafin);  -----------> +10 días 
        $dias_diff = $interval->format('%a'); //dias
    ?>
    <hr>
    <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
        <tbody>
            <tr>
                <td>
                    <label for="fecha_fin">Fecha Fin:</label>
                </td>
                <td>
                    <input name="fecha_fin" value="<?php echo $fecha_fin ?>" required="required" type="date" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="total">Total $:</label>
                </td>
                <td>
                    <input name="total" value="<?php echo number_format($total,2) ?>"  required="required" type="text"  readonly />
                </td>
            </tr>
        </tbody>
    </table>

        <?php 
        function diasArray($fecha_ini,$fecha_fin){
            $array_cuotas = array();
            
            $fechaini = new DateTime($fecha_ini);
            $fecha_fin = new DateTime($fecha_fin);
            $interval = $fechaini->diff($fecha_fin);
            $dias_diff = $interval->format('%a'); //dias

            $fecha_f = new DateTime($fecha_ini);

            $j = 0;
            for ($i = 1; $i <= $dias_diff; $i++) { 
                $intervalo = 'P1D';
                $fecha_f->add(new DateInterval($intervalo));
                $j++;

                $fecha_fin_dia = $fecha_f->format('Y-m-d'); //date('Y-m-d', $fecha_f);

                $sub_cuota = array(
                    'orden' => $j,
                    'fecha' => $fecha_fin_dia,
                );

                $array_cuotas[$fecha_fin_dia] = $sub_cuota;
            }
            
            return $array_cuotas;
        }
        ?>

        <hr>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <tbody>
                <tr>
                    <td>
                        <label for="dias_diferencia">Dias de diferencia:</label>
                    </td>
                    <td>
                        <input name="dias_diferencia" value="<?php echo $dias_de_dif ?>"  required="required" type="text"  readonly />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dias">Dias total:</label>
                    </td>
                    <td>
                        <input name="dias" value="<?php echo $dias_diff ?>"  required="required" type="text"  readonly />
                    </td>
                </tr>
            </tbody>
        </table>

    <?php $array_dias = diasArray($fecha_ini,$fecha_fin); ?>
     
        <br>
        <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
            <tbody>
                <?php foreach ($array_dias as $dia) : ?>
                    <tr>
                        <td>
                            <label><?php echo $dia['orden'] ?></label>
                        </td>
                        <td>
                            <label><?php echo $dia['fecha'] ?></label>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php endif; ?>

    </body>
</html>