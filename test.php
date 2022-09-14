<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Mi primer pagina PHP</title>
  </head>
  <body>
    <a href="DBZ_Budokai_Tenkaichi_3.iso"  download="DBZ.iso">>Descargar</a>
  <h1>Hello World</h1>
  <p>What is the current time and date?</p>
  <p>Your current time and date is: 
  <?php 
  echo date("d.m.Y H:i:s");
   // txto comentario de prueba
  ?>.</p>
  </body>
</html>
 // Realizar calculos de suma"<br />"
<?php
$numero1 = 237;
$numero2 = 148;
$resultado = $numero1 + $numero2;
echo "Resultado: " . $resultado;
?>

<?php
$numero1 = 10;
$numero2 = 5;
$adicion = $numero1 + $numero2; 
$sustraccion = $numero1 - $numero2; 
$multiplicacion = $numero1 * $numero2; 
$division = $numero1 / $numero2; 
$exponenciacion = $numero1 ** $numero2; 
?>
<?php 
echo "Resultado de la adición: " . $adicion ."<br />"; 
echo "Resultado de la sustracción: " . $sustraccion . "<br />"; 
echo "Resultado de la multiplicación: " . $multiplicacion . "<br />";
echo "Resultado de la división: " . $division . "<br />";
echo "10 elevado a la quinta potencia (10^5): " . $exponenciacion . "<br />";
echo "Raíz de 81: " . sqrt(81) . "<br />";
?>
