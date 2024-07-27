<?php

$bingo = array();

for ($i=0; $i<5; $i++) {
	$numbers = range($i*15+1, $i*15+15);
	shuffle($numbers);
	$bingo[$i] = array_slice($numbers, 0, 5);
}

$s = "";

for ($j=0; $j<5; $j++){
	$s .= "<tr>";
	for ($k=0; $k<5; $k++){
		$s .= ($j==2 && $k==2)? "<td></td>": sprintf("<td>%s</td>",$bingo[$k][$j]);
	}
	$s .= "</tr>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>BINGO</title>
</head>
<style>
	td, th {
		width: 50px;
		border: 1px solid #ccc;
		text-align: center;
	}
</style>
<body>
	<!-- <p><input type="button" id="getResult" value="次のボール"></p>
	<p id="result"></p> -->
	<button>Start</button>
	<div id="number"></div>
	<h1>Result</h1>
	<div id="result"></div>

	<table>
		<div id="sheet">
			<?php echo $s;
			$eachData = print_r(array_chunk($bingo,1));
			var_dump($eachData);
			// print_r(array_chunk($bingo,1));
			// var_dump(array[0,0,2]):
			?>
		</div>
	</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
		// $(function(){
		// 	$("#getResult").click(function(){
		// 		var num = Math.floor(Math.random()*75);
		// 		var result = num;
		// 		$("#result").text(result);
		// 		$("#sheet").css("color","red");
		// 		$("td").find().css("color","red");
		// 	});
		// });

$(function(){

	max = 50;
	bingo = new Array();
	for(i = 1; i <= max; i++) {
		bingo.push(i);
	}
	status = 0;

	$("button").click(function(){
		if(status == 0) {
			status = 1;
			$("button").text("Stop");
			roulette = setInterval(function(){
				random = Math.floor(Math.random() * bingo.length);
				number = bingo[random];
				$("#number").text(number);
			}, 75);
		} else {
			status = 0;
			$("button").text("Start");
			clearInterval(roulette);
			random = Math.floor(Math.random() * bingo.length);
			result = bingo[random];
			bingo.splice(random, 1);

			$("#number").text(result);
			$("#result").append(result + ", ");
		}
	});
});
</script>


</body>
</html>