<?php
$username = $_POST["username"];
$password = $_POST["password"];

if($username=="Dany" AND $password=="12345")
   {
   echo "Bienvenido al área interna " . $username . "!";
   }
else
   {
   echo "Acceso denegado";
   }
?>