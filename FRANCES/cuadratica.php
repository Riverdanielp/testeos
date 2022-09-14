<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ecuación cuadrática</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $a = floatval ($_POST['a']);
    $b = floatval ($_POST['b']);
    $c = floatval ($_POST['c']);
    $discriminante=$b*$b-4.0*$a*$c;
    if($discriminante<0)
    {
        $discriminante=-$discriminante;
        echo 'Soluciones imaginarias<br>';
    }
    else
        echo 'Soluciones reales<br>';
    if($a!=0)
    {
        $x1=(-$b+sqrt($discriminante))/2.0/$a;
        $x2=(-$b-sqrt($discriminante))/2.0/$a;
    }
    else
    {
        $x1=0;
        $x2=0;
        echo 'No es una ecuación cuadrática<br>';
    }
    echo 'Valor de discriminante: ' . $discriminante . "<br/>\n";
    echo 'Valor de x1: ' . $x1 . "<br/>\n";
    echo 'Valor de x2: ' . $x2 . "<br/>\n";
}
 
?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="a">Ingresa el valor de a:</label>
                        </td>
                        <td>
                            <input name="a" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="b">Ingresa el valor de b:</label>
                        </td>
                        <td>
                            <input name="b" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="c">Ingresa el valor de c:</label>
                        </td>
                        <td>
                            <input name="c" required="required" step="0.000001" type="number" />
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