<?php 
$array = array();

echo '<pre>';
var_dump($array);
echo '</pre>';
echo '<br><br><br>';

$array['1'][] = '10';
$array['1'][] = '20';
$array['1'][] = '30';


$array['2'][] = '10';
$array['2'][] = '20';
$array['2'][] = '30';

// $array[] = '2';


// $array[] = '3';


// $array[] = '4';


// $array[] = '5';

echo '<pre>';
var_dump($array);
echo '</pre>';
echo '<br><br><br>';

?>