<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texto Enriquecido</title>
</head>
<body>

   <!-- Incluir CSS de Quill -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Incluir JavaScript de Quill -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
 
<form method="post" action="tu_archivo_php.php">
    <div id="editor"></div>
    <button type="button" id="btnNombreCliente">Agregar Nombre Cliente</button>
    <!-- Agrega más botones según sea necesario -->
    <input type="submit" value="Enviar">
</form>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Función para insertar marcadores
    function insertarMarcador(marcador) {
        var range = quill.getSelection();
        if (range) {
            quill.insertText(range.index, marcador);
        }
    }

    // Evento para el botón 'Agregar Nombre Cliente'
    document.getElementById('btnNombreCliente').addEventListener('click', function() {
        insertarMarcador('{NOMBRE_CLIENTE}');
    });

    // Agrega más eventos para otros botones si es necesario
</script>
<script>
    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Crear un input oculto que contenga el contenido del editor
        var contenido = document.createElement('input');
        contenido.setAttribute('type', 'hidden');
        contenido.setAttribute('name', 'contenido');
        contenido.value = quill.root.innerHTML;

        // Añadir el input oculto al formulario y enviar
        form.appendChild(contenido);
    };
</script>



</body>
</html>