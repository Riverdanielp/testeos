<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Leer Archivos TXT</title>
  </head>
  <body>
  <h1>Leer archivos .TXT</h1>
  <p>Que horas son?</p>
  <p>El tiempo y hora actual es: 
  <?php 
  echo date("d/m/Y H:i:s");
  ?>.</p>
  <br>
  <form onkeydown="return event.key != 'Enter';" id='form_rcn' type="POST">
      <input type="number" name="rnc" id="txt_rnc">
      <input type="button" onclick="buscarRNC()" value="Buscar JS" id="js_buscar">
      <!-- <button type="submit" id="php_buscar">Buscar PHP</button> -->
  </form>
  <br><br>
  <table class="table table-bordered table-striped" cellspacing="0" align="Center" rules="all" border="1" id="ctl00_cphMain_dvDatosContribuyentes" style="width:95%;border-collapse:collapse;">
		<tbody><tr>
			<td style="font-weight:bold;">Cédula/RNC</td><td id="rnc">asd</td>
		</tr><tr>
			<td style="font-weight:bold;">Nombre/Razón Social</td><td id="nombre"></td>
		</tr><tr>
			<td style="font-weight:bold;">Nombre Comercial</td><td id="compañia"></td>
		</tr><tr>
			<td style="font-weight:bold;">Categoría</td><td id="categoria">  </td>
		</tr><tr>
			<td style="font-weight:bold;">Régimen de pagos</td><td id="regimen"></td>
		</tr><tr>
			<td style="font-weight:bold;">Estado</td><td id="estado"></td>
		</tr><tr>
			<td style="font-weight:bold;">Actividad Economica</td><td id="actividad"></td>
		</tr><tr>
			<td style="font-weight:bold;">Administracion Local</td><td id="administracion"></td>
		</tr>
	</tbody></table>




<script>
    var enlaceBuscador = 'leer_txt_resultado.php' ;
    //document.getElementById('rnc').innerHTML
    
    const txt_rnc = document.getElementById("txt_rnc");

    txt_rnc.addEventListener("keydown", function (e) {
        if (e.key == 'Enter') {
            buscarRNC();
        };
    })

    async function buscarRNC()
    {
        let valor_rnc = document.getElementById('txt_rnc').value;
        let respuesta = await consultarRNC(valor_rnc);
        let arrayJson = respuesta.split('|');
        console.log(arrayJson);
        if (arrayJson[10]){
            arrayJson[10] = arrayJson[10].replace(/\r\n/g,'');

            document.getElementById('rnc').innerHTML = '';
            document.getElementById('rnc').innerHTML = arrayJson[0];
            document.getElementById('nombre').innerHTML = '';
            document.getElementById('nombre').innerHTML = arrayJson[1];
            document.getElementById('compañia').innerHTML = '';
            document.getElementById('compañia').innerHTML = arrayJson[2];
            document.getElementById('categoria').innerHTML = '';
            //document.getElementById('categoria').innerHTML = arrayJson[];
            document.getElementById('regimen').innerHTML = '';
            document.getElementById('regimen').innerHTML = arrayJson[10];
            document.getElementById('estado').innerHTML = '';
            document.getElementById('estado').innerHTML = arrayJson[9];
            document.getElementById('actividad').innerHTML = '';
            document.getElementById('actividad').innerHTML = arrayJson[3];
            document.getElementById('administracion').innerHTML = '';
            //document.getElementById('administracion').innerHTML = arrayJson[];
        }
    }

    async function consultarRNC(valor_rnc){

        const form_rnc = new FormData();
        form_rnc.append('rnc', valor_rnc);
        const init = {
            method: "post",
            body: form_rnc
        };

        let respuesta = await fetch(enlaceBuscador, init);
        if (respuesta.ok) {
            var respuestaJson = await respuesta.json();
            //let arrayJson = respuestaJson.split('|');
           // console.log(respuestaJson);
            respuesta = respuestaJson;
        } else {
            //console.log('Error al conectar al servidor');
            respuesta = 'Error al conectar al servidor';
        };

        return respuesta;
    }

</script>



  </body>
</html>