<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Pagina de Pruebas - Numeros</title>
  </head>
  <body>
  <h1>Hola Mundo</h1>
  <p>Que horas son?</p>
  <p>El tiempo y hora actual es: 
  <?php echo date("d.m.Y H:i:s");?>.</p>

  <input type="phone" onkeyup="SepDeMiles(this)" placeholder="Ingrese Numero" id="monto" name="monto" />
  <p id="resultado"></p>




<script>
  let monto = document.getElementById('monto');
  let input = document.querySelector('input');
  let resultado = document.getElementById('resultado');

  //input.addEventListener('keyup', updateValue);

  function updateValue(e) {
    var monto_key = e;
    resultado.textContent = AsKGs(monto_key.target.value);
    monto.value = AsKs(monto_key.target.value);
  }

  function SepDeMiles(valor) {
    //console.log(valor.value)
    valor.value = AsKs(valor.value);
  }

  function AsKGs(value) {
      // Convert the number to a string and splite the string every 3 charaters from the end
            value = value.replace(/\D/g, '')
      value = Number(value);
      if (value < 1000000){
            value = value.toString();
            value = value.split(/(?=(?:...)*$)/);
            value = value.join('.');
          return '₲' + value;
      } else if (value >= 1000000) {
            var value = (value / 1000000);
            value = value.toFixed();
            value = value.toString();
            value = value.split(/(?=(?:...)*$)/);
            value = value.join('.');
        return '₲' + value + 'M'; 

      }
  };

  function AsKs(value) {
      // Convert the number to a string and splite the string every 3 charaters from the end
            value = value.replace(/\D/g, '')
            value = Number(value);
            value = value.toString();
            value = value.split(/(?=(?:...)*$)/);
            value = value.join('.');
            //console.log(value);
          return value;
  };

  function AsCero(value) {
      // Convert the number to a string and splite the string every 3 charaters from the end
            value.replace(/\./g, '')
            value = value.toString();
            value = value.split(/(?=(?:...)*$)/);
            value = value.join('.');
          return value;
  };

  function AsGs(value) {
      // Convert the number to a string and splite the string every 3 charaters from the end
      value = value.replace(/\./g, '')
      value = value.toString();
      value = value.split(/(?=(?:...)*$)/);

      // Convert the array to a string and format the output
      value = value.join('.');
      return '₲' + value;
  };
</script>
<script>
  
</script>



  </body>
</html>