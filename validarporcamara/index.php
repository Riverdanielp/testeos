<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Fotos</title>
    <!-- Agrega las referencias a Bootstrap CSS y JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Validador de Fotos</h1>
        <!-- <form id="pedidoForm" action="procesar.php" method="post" enctype="multipart/form-data"> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Foto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Repite este bloque para cada producto -->
                    <tr>
                        <td>Producto 1</td>
                        <td>
                            <img id="fotoProducto1" class="img-fluid imagen-producto" data-producto-id="1" src="placeholder.jpg" alt="Foto">
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-abrir-modal" data-toggle="modal" data-target="#modalProducto" data-producto-id="1">
                                Tomar Foto
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Producto 2</td>
                        <td>
                            <img id="fotoProducto2" class="img-fluid imagen-producto" data-producto-id="2" src="placeholder.jpg" alt="Foto">
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-abrir-modal" data-toggle="modal" data-target="#modalProducto" data-producto-id="2">
                                Tomar Foto
                            </button>
                        </td>
                    </tr>
                    <!-- Repite este bloque para cada producto -->
                </tbody>
            </table>
            <!-- <input type="submit" class="btn btn-success" value="Enviar Pedido" disabled> -->
            <button id="btnEnviar" class="btn btn-success" onclick="enviarImagenesAlServidor()">Enviar Imágenes</button>

        <!-- </form> -->
    </div>

    <!-- Modal para la cámara -->
    <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="modalProductoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductoLabel">Tomar Foto de Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenedor para la cámara -->
                    <div id="camaraContainer">
                        <video id="camaraProducto" autoplay></video>
                        <canvas id="canvasProducto" style="display: none;"></canvas>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-cerrar-modal" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="tomarFoto()">Tomar Foto</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Repite este bloque para cada producto -->
    <!-- También debes actualizar el atributo data-producto-id para cada botón "Tomar Foto" -->
    
    <script src="validador.js"></script>
    <script>
        function enviarImagenesAlServidor() {
            // Verificar si todas las imágenes están completas
            const imagenesCompletas = verificarImagenesCompletas();

            if (imagenesCompletas) {
                console.log('imagenes completas');
                // Obtener todas las imágenes
                const imagenes = document.querySelectorAll('.imagen-producto');

                // Crear un objeto FormData para enviar las imágenes al servidor
                const formData = new FormData();

                // Recorrer todas las imágenes y agregarlas al formData con su respectivo ID de producto
                imagenes.forEach((imagen) => {
                    const productoId = imagen.getAttribute('data-producto-id');
                    console.log(productoId);
                    formData.append(`imagen_${productoId}`, imagen.src);
                });

                // Enviar el formData al servidor, por ejemplo, utilizando fetch
                fetch('procesar.php', {
                    method: 'POST',
                    body: formData
                })
                .then((response) => {
                    // Procesar la respuesta del servidor si es necesario
                })
                .catch((error) => {
                    console.error('Error al enviar las imágenes:', error);
                });
            } else {
                alert('Asegúrate de completar todas las imágenes antes de enviar.');
            }
        }

        function verificarImagenesCompletas() {
            const imagenes = document.querySelectorAll('.imagen-producto');

            for (const imagen of imagenes) {
                if (!imagen.src || imagen.src === 'data:,' || imagen.src.endsWith('placeholder.jpg')) {
                    return false; // Al menos una imagen no está completa
                }
            }

            return true; // Todas las imágenes están completas
        }

    </script>
</body>
</html>
