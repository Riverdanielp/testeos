<?php

echo '<pre>';
//var_dump($_POST);
echo '</pre>';
$data = array(
    'id_producto' => $_POST['id_prod'],
    'cantid' => $_POST['cantid'],
    'imei' => $_POST['imei'],
);

$jsos_imei = json_encode($data);
echo $jsos_imei;

?>