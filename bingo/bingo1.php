<?php

if (empty($_POST)) {

    $players = array('computer', 'opponent');
    $picks = array();

    for ($i = 1; $i < 16; $i++) 
    {
        $numbers['B'][] = $i;
        $numbers['I'][] = $i+15;
        $numbers['N'][] = $i+30;
        $numbers['G'][] = $i+45;
        $numbers['O'][] = $i+60;
    }

    $letters = array ('B','I','N','G','O');
    foreach ($letters as $letter) {

        foreach($players as $player)
        {
            shuffle($numbers[$letter]);

            $chunks = array_chunk($numbers[$letter], 5);
            $cards[$player][$letter] = $chunks[0];

            if ($letter == 'N') {
                $cards[$player][$letter][2] = ' * '; // *
            }
        } 
    }

    $cardsstr = serialize($cards);
    $picksstr = serialize($picks);

}
else
{

}

?>


Getrokken nummers : <?php echo implode(',', $picks) ?>


<form method='post'>
<input type='hidden' name='cardsstr' value='<?php echo $cardsstr ?>' />
<input type='hidden' name='ballsstr' value='<?php echo $ballsstr ?>' />
<input type='hidden' name='picksstr' value='<?php echo $picksstr ?>' />
<input type='submit' name='cards' value='next number' />
</form>
<a href="bingo2_niels.php">Start Over</a>

<?php

foreach ($cards as $key => $value) 
{
    // Show player
    echo "<h2>" . $key . "</h2>";

    // Start table
    echo "<table border='1'>";

    echo "<tr><td>B</td><td>I</td><td>N</td><td>G</td><td>O</td></tr>";

    for ($i = 0; $i < 5; $i++) {
        echo "<tr>
                <td>" . $value['B'][$i] . "</td>
                <td>" . $value['I'][$i] . "</td>
                <td>" . $value['N'][$i] . "</td>
                <td>" . $value['G'][$i] . "</td>
                <td>" . $value['O'][$i] . "</td>
            </tr>";
    }

    echo "</table>";
}

?>

</body>
</html>