<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>My first PHP page</title>
  </head>
  <body>
  <h1>Hello World</h1>
  <p>Que horas son?</p>
  <p>El tiempo y hora actual es: 
  <?php 
  echo date("d.m.Y H:i:s");
  ?>.</p>
  <br>
  <br>
  <br>
  <?php
  $hoy = date("Y-m-d");
  //$d = new DateTime( $hoy ); 
  $d = new datetime( $hoy ); 
  $d->modify('-1 month');
  $d->modify( 'last day of this month' ); 
  echo $d->format( 'Y-m-d' ), "\n";

  ?>
  <br>
  <br>
  <br>
  <hr>
  
  <?php 
			$data  = array(
				'id' => '1',
				'cliente_id' => '1',
				'Nombre_id' => 'Nombre',
				'RCN_id' => '12345',
				'numeracion' => '1',
			);
   ?>

  <a href="function.php/<?php $data; ?>">Enviar</a>












  </body>
</html>