<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjetas y Pestañas Dinámicas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <div id="cards-container" class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">Contenido de la Tarjeta 1 ohhhh</div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">Contenido de la Tarjeta 2 Aaaaaah</div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs d-none" id="tabs-container">
        <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Tarjeta 1</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Tarjeta 2</a></li>
    </ul>

    <div class="tab-content d-none" id="tabs-content">
        <div class="tab-pane fade show active" id="tab1"></div>
        <div class="tab-pane fade" id="tab2"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function adjustLayout() {
        let width = window.innerWidth;
        let cardsContainer = document.getElementById('cards-container');
        let tabsContainer = document.getElementById('tabs-container');
        let tabsContent = document.getElementById('tabs-content');

        if (width < 768) { // Pantallas pequeñas: usar pestañas
            cardsContainer.classList.add('d-none');
            tabsContainer.classList.remove('d-none');
            tabsContent.classList.remove('d-none');

            document.querySelectorAll('#cards-container .card').forEach((card, index) => {
                document.querySelector('#tab' + (index + 1)).innerHTML = card.outerHTML;
            });
        } else { // Pantallas grandes: usar tarjetas
            cardsContainer.classList.remove('d-none');
            tabsContainer.classList.add('d-none');
            tabsContent.classList.add('d-none');
        }
    }

    // Ejecutar al cargar y al cambiar el tamaño de la ventana
    window.addEventListener('load', adjustLayout);
    window.addEventListener('resize', adjustLayout);
</script>


</body>
</html>
