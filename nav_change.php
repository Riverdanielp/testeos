<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjetas Responsivas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <!-- Contenedor de pestañas para móviles -->
    <ul class="nav nav-tabs d-block d-md-none" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tarjeta 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tarjeta 2</a>
        </li>
    </ul>

    <!-- Contenido de las pestañas/tarjetas -->
    <div class="tab-content d-block d-md-none" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Contenido de la Tarjeta 1</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Contenido de la Tarjeta 2</div>
    </div>

    <!-- Tarjetas para pantallas grandes -->
    <div class="row d-none d-md-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">Contenido de la Tarjeta 1
                    ohhhhhhhhhhhhhhhhhhhh
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">Contenido de la Tarjeta 2</div>
                Seeeeeeeeeeeeeeeeeee
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
