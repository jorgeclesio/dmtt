<?php 
	include('../conexao.php');
	session_start();
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DMTT - Departamento Municipal de Transito e Transporte</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estilo.css">

</head>
<body>

<?php include '../cabecalho.php'; ?>
<div class="container col-offset-1 col-10">
	<div class="text-right">
		<small class="text-success">Olá, <b><?php echo $_SESSION['usu_nome']; ?></b> - Parauapebas-PA, <?php echo date(" <b> d-m-Y </b>") ?></small>
	</div>
</div>




<!-- TABELA DE PLANTOES -->
<div class="container">
	<br><h2 class="text-center">Lista dos Últimos Plantões</h2><br>
	<table class="table table-responsive text-center">
		<tr>
			<th  class="text-center">DATA</th>
			<th  class="text-center">PLANTÃO</th>
			<th  class="text-center">TURNO</th>
		</tr>

		<?php

			$sql = "SELECT * FROM plantoes ORDER BY id_p DESC limit 10" or die(mysqli_error());
			$res = mysqli_query($conexao,$sql);

			while($query = mysqli_fetch_array($res)){
		?>

		<tr>
			<td><?php echo $query['data_p']; ?></td>
			<td>
				<a href="plantao.php?plantao=<?php echo $query['id_p'];?>" target="_blank" >
					<?php echo $query['p_nome']; ?>
				</a>
			</td>	
			<td><?php echo $query['3']; ?> </td>
		</tr>

		<?php }?>  

	</table>
</div>




<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>