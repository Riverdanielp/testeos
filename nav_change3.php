<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjetas con Gráficos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <div id="cards-container" class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="chart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="chart2"></canvas>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
        //     function generateRandomChart(chartId) {
        //     const ctx = document.getElementById(chartId).getContext('2d');
        //     new Chart(ctx, {
        //         type: 'bar', // Puedes cambiar el tipo de gráfico aquí (bar, line, pie, etc.)
        //         data: {
        //             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //             datasets: [{
        //                 label: '# of Votes',
        //                 data: [12, 19, 3, 5, 2, 3], // Datos aleatorios
        //                 backgroundColor: [
        //                     'rgba(255, 99, 132, 0.2)',
        //                     'rgba(54, 162, 235, 0.2)',
        //                     'rgba(255, 206, 86, 0.2)',
        //                     'rgba(75, 192, 192, 0.2)',
        //                     'rgba(153, 102, 255, 0.2)',
        //                     'rgba(255, 159, 64, 0.2)'
        //                 ],
        //                 borderColor: [
        //                     'rgba(255, 99, 132, 1)',
        //                     'rgba(54, 162, 235, 1)',
        //                     'rgba(255, 206, 86, 1)',
        //                     'rgba(75, 192, 192, 1)',
        //                     'rgba(153, 102, 255, 1)',
        //                     'rgba(255, 159, 64, 1)'
        //                 ],
        //                 borderWidth: 1
        //             }]
        //         },
        //         options: {
        //             scales: {
        //                 y: {
        //                     beginAtZero: true
        //                 }
        //             }
        //         }
        //     });
        // }

        // function adjustLayout() {
        //     let width = window.innerWidth;
        //     let cardsContainer = document.getElementById('cards-container');
        //     let tabsContainer = document.getElementById('tabs-container');
        //     let tabsContent = document.getElementById('tabs-content');

        //     if (width < 768) { // Pantallas pequeñas: usar pestañas
        //         cardsContainer.classList.add('d-none');
        //         tabsContainer.classList.remove('d-none');
        //         tabsContent.classList.remove('d-none');

        //         document.querySelectorAll('#cards-container .card').forEach((card, index) => {
        //             document.querySelector('#tab' + (index + 1)).innerHTML = card.outerHTML;
        //         });
        //     } else { // Pantallas grandes: usar tarjetas
        //         cardsContainer.classList.remove('d-none');
        //         tabsContainer.classList.add('d-none');
        //         tabsContent.classList.add('d-none');
        //     }
        // }

        // window.addEventListener('load', function() {
        //     adjustLayout();
        //     generateRandomChart('chart1');
        //     generateRandomChart('chart2');
        // });

        // window.addEventListener('resize', adjustLayout);


</script>


<script>
    function generateRandomChart(chartId) {
    const ctx = document.getElementById(chartId).getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [
                {
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: '# of Votes',
                    data: [6, 9, 8, 9, 5, 10],
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        // 'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
            ]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart - Stacked'
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    });
}

function adjustLayout() {
    let width = window.innerWidth;
    let cardsContainer = document.getElementById('cards-container');
    let tabsContainer = document.getElementById('tabs-container');
    let tabsContent = document.getElementById('tabs-content');

    if (width < 768) { // Pantallas pequeñas: usar pestañas
        cardsContainer.classList.add('d-none');
        tabsContainer.classList.remove('d-none');
        tabsContent.classList.remove('d-none');

        for (let i = 1; i <= 2; i++) {
            let tabPane = document.getElementById('tab' + i);
            let chartCanvas = document.getElementById('chart' + i);
            if (chartCanvas) {
                tabPane.appendChild(chartCanvas);
            }
        }
    } else { // Pantallas grandes: usar tarjetas
        cardsContainer.classList.remove('d-none');
        tabsContainer.classList.add('d-none');
        tabsContent.classList.add('d-none');

        for (let i = 1; i <= 2; i++) {
            let cardBody = cardsContainer.querySelector('.col-md-6:nth-child(' + i + ') .card-body');
            let chartCanvas = document.getElementById('chart' + i);
            if (chartCanvas) {
                cardBody.appendChild(chartCanvas);
            }
        }
    }
}

window.addEventListener('load', function() {
    adjustLayout();
    generateRandomChart('chart1');
    generateRandomChart('chart2');
});

window.addEventListener('resize', adjustLayout);

</script>

</body>
</html>
