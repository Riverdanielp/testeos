<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Pagina de Pruebas - Múltiples Inputs</title>
</head>

<body>
    <h1>Hola Mundo</h1>
    <p>Que horas son?</p>
    <p>El tiempo y hora actual es:
        <?php echo date("d.m.Y H:i:s");?>.</p>
    <hr>
    <br>
    <!-- <form action="multi_input_var_ses.php" method="post"> -->
    <h1><b> Cantidad:</b> <span id="span_cant">0</span></h1>  
    
    Ingrese el IMEI (Luego ENTER): <input type="number" name="imei[]" id="input_add">
    <form method="post" id="form_imei">
        <div id="agregar_items">
            <input type="hidden" name="id_prod" value="1">
            <input type="hidden" name="cantid" id="cantid" value="0">
            <div><br>
            </div>
        </div>
        <!-- <br><br> -->
        <!-- <input type="submit" value="Enviar" /> -->
    </form>



    <script>
        document.addEventListener('keypress', function (evt) {

            // Si el evento NO es una tecla Enter
            if (evt.key !== 'Enter') {
                return;
            }

            insertar_input()

            // let element = evt.target;

            // // Si el evento NO fue lanzado por un elemento con class "focusNext"
            // if (!element.classList.contains('focusNext')) {
            //     return;
            // }

            // // AQUI logica para encontrar el siguiente
            // let tabIndex = element.tabIndex + 1;
            // var next = document.querySelector('[tabindex="' + tabIndex + '"]');

            // // Si encontramos un elemento
            // if (next) {
            //     next.focus();
            //     event.preventDefault();
            // }
        });

        function insertar_input() {
            let cantidad = document.getElementById('cantid').value;
            let span_cant = document.getElementById('span_cant').text;
            let div_agregar = document.getElementById('agregar_items');
            let form_imei = document.getElementById('form_imei'); 
            let input_add = document.getElementById('input_add').value;
            let siguiente = Number(cantidad) + 1;
            //console.log(siguiente);
            // let input = `
            // ${siguiente} - <input type="text" name="imei[]" tabindex="${siguiente}" class="focusNext" value=""><br>
            // `
            // document.getElementById('agregar_items').innerHTML += input;
            document.getElementById('cantid').value = siguiente;
            document.getElementById('span_cant').innerHTML = siguiente;

            // let input = form_imei.createElement('input');
            // input.type = 'text';
            // input.id = "input"+contador;
            // input.name = 'imei[]';
            // input.tabindex = siguiente;
            // input.class = 'focusNext';
    
            var div = document.createElement('div');
            div.innerHTML =  `
            <input type="hidden" name="imei[]" value="${input_add}">
            ${siguiente} - ${input_add} <br>`;
            document.getElementById('form_imei').appendChild(div);
            document.getElementById('input_add').value = '';
            // document.getElementById('canciones').appendChild(div);
        }

        
    </script>



</body>

</html>