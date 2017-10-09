<?php 

include '../conexao.php';

if (isset($_POST['salvar'])) {

	$plantao = strtoupper($_POST['plantao']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$inspetor = mysqli_real_escape_string( $conexao, strtoupper($_POST['inspetor']));
	$operador = mysqli_real_escape_string( $conexao, strtoupper($_POST['operador']));
	$agentes_p = mysqli_real_escape_string( $conexao, strtoupper($_POST['agentes_p']));
	$agentes_he = mysqli_real_escape_string( $conexao, strtoupper($_POST['agentes_he']));
	$radios = mysqli_real_escape_string( $conexao, strtoupper($_POST['radios']));
	$vtri = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtri']));
	$vtrii = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtrii']));
	$vtriii = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtriii']));
	$vtriv = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtriv']));
	$vtrv = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtrv']));
	$vtrvi = mysqli_real_escape_string( $conexao, strtoupper($_POST['vtrvi']));
	$obs = mysqli_real_escape_string( $conexao, strtoupper($_POST['obs']));
	
	echo $plantao . "<br>";
	echo $data . "<br>";
	echo $hora . "<br>";
	echo $inspetor . "<br>";
	echo $operador . "<br>";
	echo $agentes_p . "<br>";
	echo $agentes_he . "<br>";
	echo $radios . "<br>";
	echo $vtri . "<br>";
	echo $vtrii . "<br>";
	echo $vtriii . "<br>";
	echo $vtriv . "<br>";
	echo $vtrv . "<br>";
	echo $vtrvi . "<br>";
	echo $obs . "<br>";
	
}else{
	echo "erro";
}



 ?>