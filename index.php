<?php 
	include('conexao.php');
	session_start();

	if (!isset($_SESSION ['usu_nome'])) {

		echo "<script>alert('Voce precisa estar logado!');location.href='login.php' </script>";
	}
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DMTT - Departamento Municipal de Transito e Transporte</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">

	
</head>
<body>

<div class="jumbotron bg-success text-white text-center">
  <h1 class="display-3">DMTT</h1>
  <p class="lead">Departamento Municipal de Transito e Transporte</p>
</div>

<div class="container col-offset-1 col-10">
	<div class="text-right">
		 <small class="text-success">Olá, <b><?php echo $_SESSION['usu_nome']; ?></b> - Parauapebas-PA, <?php echo date(" <b> d-m-Y </b>") ?></small>
	</div>
</div>

<div class="container mt-5">
	<nav class="nav justify-content-around nav-pills flex-column flex-md-row"> 
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/lista_plantoes.php">Plantões</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/inventarios.php">Inventários</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/os.php">Ordem de Serviço</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/agentes.php">Agentes</a>
	</nav>
	<nav class="nav justify-content-around nav-pills flex-column flex-md-row"> 
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/convocacoes.php">Convocações</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/escala.php">Escala</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/he.php">Horas Extras</a>
		<a class="nav-link btn btn-success mx-1 my-2" href="pag/rel.php">Relatórios</a>
	</nav>
</div>
		



<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/app.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>