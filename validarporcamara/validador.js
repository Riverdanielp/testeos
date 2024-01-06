var videoStream; // Variable para almacenar la transmisión de video de la cámara
var productoIdActual; // Variable para almacenar el ítem actual
function tomarFoto() {
    // Obtener elementos del modal
    const video = document.querySelector('#camaraProducto');
    const canvas = document.querySelector('#canvasProducto');
    const foto = document.querySelector(`#fotoProducto${productoIdActual}`); // Asegúrate de ajustar el ID del elemento de imagen adecuadamente

    // Detener el video
    video.pause();

    // Capturar una instantánea de la cámara y mostrarla en el elemento de imagen
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

    // Mostrar la foto en el elemento de imagen
    foto.src = canvas.toDataURL('image/jpeg');

    // Cerrar el modal y apagar la cámara
    cerrarModalYApagarCamara();
}
// Verifica si todas las fotos han sido tomadas
function todasLasFotosTomadas() {
    const productos = document.querySelectorAll('#listaProductos img');
    for (const producto of productos) {
        if (producto.getAttribute('src') === 'placeholder.jpg') {
            return false;
        }
    }
    return true;
}

// Función para abrir el modal y encender la cámara
function abrirModalYEncenderCamara(productoId) {
    productoIdActual = productoId; // Almacenar el ítem actual
    // Obtener elementos del modal y la cámara
    const modal = document.querySelector(`#modalProducto`);
    const video = document.querySelector(`#camaraProducto`);

    $(modal).off('shown.bs.modal');
    // Escuchar el evento 'shown.bs.modal' del modal antes de abrirlo
    $(modal).on('shown.bs.modal', function() {
        // Solicitar acceso a la cámara
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                videoStream = stream;
                video.srcObject = stream;
                video.play();
            })
            .catch((error) => {
                console.error('Error al acceder a la cámara:', error);
            });
    });

    // Escuchar el evento 'hidden.bs.modal' para cerrar la cámara cuando se oculta el modal
    $(modal).on('hidden.bs.modal', function() {
        cerrarModalYApagarCamara();
    });

    // Abrir el modal
    $(modal).modal('show');
}

// Función para cerrar el modal y apagar la cámara
function cerrarModalYApagarCamara() {
    // Obtener el modal actual
    const modal = document.querySelector(`#modalProducto`);

    // Cerrar el modal
    $(modal).modal('hide');

    // Detener la transmisión de video y liberar la cámara
    if (videoStream) {
        const tracks = videoStream.getTracks();
        tracks.forEach(track => track.stop());
    }

    // Restablecer los parámetros del elemento de video
    const video = document.querySelector(`#camaraProducto`);
    video.srcObject = null; // Elimina el objeto de origen de la cámara
    video.pause(); // Pausa el video
}

// Asignar las funciones a los botones de abrir y cerrar el modal
document.addEventListener('DOMContentLoaded', () => {
    const botonesAbrirModal = document.querySelectorAll('.btn-abrir-modal');
    const botonesCerrarModal = document.querySelectorAll('.btn-cerrar-modal');

    botonesAbrirModal.forEach((boton) => {
        boton.addEventListener('click', () => {
            const productoId = boton.getAttribute('data-producto-id');
            abrirModalYEncenderCamara(productoId);
        });
    });

    botonesCerrarModal.forEach((boton) => {
        boton.addEventListener('click', cerrarModalYApagarCamara);
    });
});