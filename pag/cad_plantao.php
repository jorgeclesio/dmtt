<?php 
	include('../conexao.php');
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
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estilo.css">

	
</head>
<body>

<?php include '../cabecalho.php'; ?>

<div class="container">
		<!-- INSPETOR E AGENTES -->
		<h2>Cadastro Plantão</h2>
	<form method="post" action="save_plantao.php">
		<div class="row">
			<div class="col-3">
				<label>Plantão: </label>
				<select class="form-control" name="plantao">
					<option value="bravo">BRAVO</option>
					<option value="alfa">ALFA</option>
				</select>
			</div>
			<div class="col-3">
				<label>Data: </label>
				<input class="form-control" type="date" name="data">
			</div>
			<div class="col-3">
				<label>Horário: </label>
				<input class="form-control" type="time" name="hora">
			</div>
			<div class="col-3">
				<label>Inspetor: </label>
				<input class="form-control text-uppercase" type="text" name="inspetor">
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<label>Operador: </label>
				<select class="form-control text-uppercase" name="operador">
					<option>Selecione o Operador</option>
					<?php 
						$sql_op = "SELECT * FROM operadores  order by op_nome DESC" or die(mysqli_error());
						$consulta = mysqli_query($conexao,$sql_op);
		
					while($linha = mysqli_fetch_array($consulta)) { ?>
						<option value="<?php echo $linha['op_nome'] ?>"><?php echo $linha['op_nome'] ?></option>
					 ?>
			 <?php } ?>
				</select>
			</div>

			<div class="col-6">
				<label>Radios: </label>
				<input class="form-control text-uppercase" type="text" name="radios">
			</div>	
		</div>

		<div class="row">
			<div class="col-6">
				<label>Agentes de Plantão: </label>
				<textarea name="agentes_p" class="form-control text-uppercase"></textarea>
			</div>

			<div class="col-6">
				<label>Agentes de HE: </label>
				<textarea name="agentes_he" class="form-control text-uppercase"></textarea>
			</div>	
		</div>

		<div class="row">
			<div class="col-6">
				<label>VTR 1: </label>
				<input class="form-control text-uppercase" type="text" name="vtri">
			</div>

			<div class="col-6">
				<label>VTR 2: </label>
				<input class="form-control text-uppercase" type="text" name="vtrii">
			</div>	
		</div>

		<div class="row">
			<div class="col-6">
				<label>VTR 3: </label>
				<input class="form-control text-uppercase" type="text" name="vtriii">
			</div>

			<div class="col-6">
				<label>VTR 4: </label>
				<input class="form-control text-uppercase" type="text" name="vtriv">
			</div>	
		</div>

		<div class="row">
			<div class="col-6">
				<label>VTR 5: </label>
				<input class="form-control text-uppercase" type="text" name="vtrv">
			</div>

			<div class="col-6">
				<label>VTR 6: </label>
				<input class="form-control text-uppercase" type="text" name="vtrvi">
			</div>	
		</div>

		<div class="row">
			<div class="col-12">
				<label>Observações: </label>
				<textarea name="obs" class="form-control text-uppercase"></textarea>
			</div>
		</div>

		<input class="btn btn-success mt-2 col-6" type="submit" name="salvar" value="Abrir Plantão">
	</form>

</div>
		



<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>