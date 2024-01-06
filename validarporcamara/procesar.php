<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rutaImagenes = "uploads/";
    if (!file_exists($rutaImagenes)) {
        mkdir($rutaImagenes, 0777, true);
    }
    foreach ($_POST as $key => $base64Data) {
        $data = explode(',', $base64Data, 2);

        if (count($data) === 2) {
            list($tipo, $datos) = $data;
            $extension = str_replace('data:image/', '', explode(';', $tipo)[0]);
            $nombreArchivo = uniqid() . '.' . $extension;
            $rutaDestino = $rutaImagenes . $nombreArchivo;
            $imagenDecodificada = base64_decode($datos);

            if (file_put_contents($rutaDestino, $imagenDecodificada)) {
                echo "Imagen '$nombreArchivo' guardada con éxito.<br>";
            } else {
                echo "Error al guardar la imagen '$nombreArchivo'.<br>";
            }
        }
    }
     
} else {
    // Respuesta para solicitudes GET u otras
    echo "Solicitud no válida.";
}
?>
