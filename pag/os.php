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
	<div>
		 Olá, <b><?php echo $_SESSION['usu_nome']; ?></b> - Parauapebas-PA, <?php echo date(" <b> d-m-Y </b>") ?>
	</div>
</div>

<br><h2 class="text-center">Ordens de Serviço</h2><br>

<!-- TABELA DE ORDEM DE SERVIÇO -->
<div class="container">
	<table class="table">
	<tr>
		<th>Nº OS</th>
		<th>EVENTO</th>
		<th>TIPO</th>
	</tr>
	
	<?php

		$sql_os = "SELECT * FROM os ORDER BY id_os DESC limit 10" or die(mysqli_error());
		$res = mysqli_query($conexao,$sql_os);
		
		while($query = mysqli_fetch_array($res)){
	?>

	<tr>
		<td><?php echo $query['n_os']; ?></td>
		<td>
			<a href="ordem.php?os=<?php echo $query['id_os'];?>#link_nome" target="_blank" title="Abrir Área pessoal">
				<span class="text-center"><?php echo $query['evento']; ?></span>
			</a>
		</td>	
		<td><?php echo $query['tipo_os']; ?> </td>
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