<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema ...</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">

</head>
<body>

<div class="container col-offset-4 col-4">
	<h1 class="text-center">DMTT</h1>
	<hr>
	<form method="post" action="login-verificar.php">
		<div class="form-group">
    		<label for="usuario">Usuario:</label>
    		<input type="text" name="usuario" class="form-control" id="usuario">
  		</div>

  		<div class="form-group">
    		<label for="senha">Senha:</label>
    		<input type="password" name="senha" class="form-control" id="senha">
  		</div>

  		<button type="submit" class="btn btn-block btn-success">Entrar</button>
	</form>
</div>



<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/app.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>