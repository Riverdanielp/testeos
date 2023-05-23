<!DOCTYPE html>
<html>
<head>
	<title>Inputs dinámicos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-5">
		<h2>Inputs dinámicos</h2>
		<div class="form-group mt-3">
			<button type="button" class="btn btn-primary" id="agregarInput">Agregar input</button>
		</div>
		<div id="inputsDinamicos">
			<!-- Aquí se agregarán los inputs dinámicos -->
		</div>
	</div>

	<script>
		$(document).ready(function(){
			var contador = 0;

			$("#agregarInput").click(function(){
				contador++;
				var nuevoInput = '<div class="form-group" id="inputDinamico'+contador+'"><label for="nombreInput'+contador+'">Nombre:</label><input type="text" class="form-control" name="nombreInput'+contador+'" id="nombreInput'+contador+'" required><label for="valorInput'+contador+'" class="mt-3">Valor:</label><input type="text" class="form-control" name="valorInput'+contador+'" id="valorInput'+contador+'" required><button type="button" class="btn btn-danger mt-3 eliminarInput" data-id="'+contador+'">Eliminar</button></div><hr>';
				$("#inputsDinamicos").append(nuevoInput);
			});

			$(document).on("click", ".eliminarInput", function(){
				var id = $(this).data("id");
				$("#inputDinamico"+id).remove();
				Swal.fire({
					icon: 'success',
					title: 'Input eliminado',
					showConfirmButton: false,
					timer: 1500
				})
			});
		});
	</script>
</body>
</html>
