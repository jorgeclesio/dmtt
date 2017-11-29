<?php 
session_start();

	include('conexao.php');


	$usuario = addslashes ($_POST['usuario']);
	$senha   = addslashes ($_POST['senha']);


	$sql = "SELECT * from usuarios WHERE codigo_usuario = '$usuario' and senha_usuario='$senha' " or die (mysqli_error());
	$query = mysqli_query($conexao,$sql);

	$cont = mysqli_num_rows($query);

			while ($usuario = mysqli_fetch_object($query)) {
				$usu_id     = $usuario->id_usuario;
				$usu_nome   = $usuario->nome_usuario;
				$usu_codigo = $usuario->codigo_usuario;
				$usu_senha  = $usuario->senha_usuario;
				$usu_tipo   = $usuario->tipo_usuario;
			
				$_SESSION ['usu_id']     = $usu_id;
				$_SESSION ['usu_nome']   = $usu_nome;
				$_SESSION ['usu_codigo'] = $usu_codigo;
				$_SESSION ['usu_tipo']   = $usu_tipo;
		}

			if ($cont == 1) {
				echo "<script>location.href='index.php' </script>";
			}else {
 				echo "<script>alert('Usuário ou senhas não conferem!'); location.href='login.php' </script>"; 
			}
 ?>


