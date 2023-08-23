<?php 
$estilo = './estilo.css';
$tareas = './tareas.js';
$logo = './usac.png';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Requisitos de Cursos</title>
	<link rel="stylesheet" href="<?php echo $estilo; ?>" />
</head>

<body>
	<header class="ecenter bborder">
		<img class="logo" src="<?php echo $logo ?>" alt="logo">
		<h1 class="tcenter titulo">Requisitos de Curso</h1>
	</header>
	<main>
		<h2 class="">Instrucciones</h2>
		<p>
			El objetivo de esta pagina es facilitar la busqueda de los cursos requeridos
			para poder asignarse un curso de la carrera de Ingenieria en Sistemas del CUNOC.
			En la siguiente entrada de texto debera ingresar el codigo de un curso.
			Luego, si dicho curso existe, se listara los cursos requeridos. 
			El pensum de Ingenieria en Sistemas se encuentra <a href="./pensum.pdf">aqui</a>.
		</p>

		<div class="caja tcenter">
			<label for="cod">Codigo del curso: </label>
			<input type="text" name="cod" id="cod" placeholder="codigo" />
			<input type="button" id="reqs" value="REQUISITOS"></button>
		</div>

		<h2 class="" id="resultado">Resultados</h2>

		<div id="cursos" class=""></div>
	</main>

	<script src="<?php echo $tareas; ?>"></script>
</body>

</html>