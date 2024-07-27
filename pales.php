<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Lotería</title>
    <style>
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Sistema de Lotería</h1>
    <form method="POST" action="">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero" required>
        <br>
        <label for="monto">Monto de la apuesta:</label>
        <input type="number" id="monto" name="monto" required>
        <br><br>
        <input type="submit" name="agregar" value="Agregar Quiniela">
    </form>
    
    <form method="POST" action="">
        <input type="submit" name="generar" value="Generar Pales">
    </form>

    <?php
    session_start();

    if (!isset($_SESSION['quinielas'])) {
        $_SESSION['quinielas'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['agregar'])) {
            $numero = $_POST['numero'];
            $monto = $_POST['monto'];
            $_SESSION['quinielas'][] = ['numero' => $numero, 'monto' => $monto];
        }
    }

    // Mostrar quinielas ingresadas
    if (!empty($_SESSION['quinielas'])) {
        echo "<div class='result'><h2>Quinielas ingresadas:</h2>";
        foreach ($_SESSION['quinielas'] as $quiniela) {
            echo "Número: " . $quiniela['numero'] . " - Monto: $" . $quiniela['monto'] . "<br>";
        }
        echo "</div>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['generar'])) {
            $quinielas = $_SESSION['quinielas'];
            $ligar = true;

            echo "<div class='result'><h2>Quinielas ingresadas:</h2>";
            $montoTotalQuinielas = 0;
            foreach ($quinielas as $quiniela) {
                echo "Número: " . $quiniela['numero'] . " - Monto: $" . $quiniela['monto'] . "<br>";
                $montoTotalQuinielas += $quiniela['monto'];
            }
            echo "Monto total de las quinielas: $" . $montoTotalQuinielas . "<br>";

            if ($ligar) {
                $numeros = array_column($quinielas, 'numero');
                $montoPale = $quinielas[0]['monto'];
                $pales = generarPales($numeros);
                echo "<h2>Resultados de los pales:</h2>";
                $montoTotalPales = 0;
                foreach ($pales as $pale) {
                    echo "Pale: " . $pale[0] . " con " . $pale[1] . " - Monto: $" . $montoPale . "<br>";
                    $montoTotalPales += $montoPale;
                }
                echo "Monto total de los pales: $" . $montoTotalPales . "<br>";
                echo "Monto total de las quinielas y los pales: $" . ($montoTotalQuinielas + $montoTotalPales) . "<br>";
            }
            echo "</div>";
            // Reiniciar las quinielas después de generar los pales
            $_SESSION['quinielas'] = [];
        }
    }

    function generarPales($numeros) {
        $pales = [];
        for ($i = 0; $i < count($numeros); $i++) {
            for ($j = $i + 1; $j < count($numeros); $j++) {
                $pales[] = [trim($numeros[$i]), trim($numeros[$j])];
            }
        }
        return $pales;
    }
    ?>
</body>
</html>