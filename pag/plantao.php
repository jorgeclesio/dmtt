<?php
	include('../conexao.php');
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
<body style="background: #FAFAD2">
	<?php include '../cabecalho.php'; ?>
<?php
	if ($_GET !=null){ 

	$id_p=$_GET['plantao'];
	$sql = "SELECT * FROM plantoes WHERE id_p=$id_p" or die(mysqli_error());
	$res = mysqli_query($conexao,$sql);
	
	$n_plantao = mysqli_num_rows ($res); 

	if ($n_plantao==0){
			echo "<script>alert('PLANTÃO não existe!'); window.close();</script>";
	}

while($query = mysqli_fetch_array($res)) { ?>


<div class="container">
	<div class="row">
		<div class="col-md-3 col-xs-6"> 
			<span>
				<strong>
						PLANTÃO:
						<?php 
							echo strtoupper ($query['p_nome']);
							$nome_plantao=$query['p_nome']; ?> 
				</strong>
			</span>
		</div>
		<div class="col-md-3 col-xs-6">
			<span>
				<span>
						<?php echo ($query['horario']) ?> hrs   
				</span> 
		</span>
	</div>
		<div class="col-md-3 col-xs-6">
			<span>
				<span>
						<?php echo ($query['data_p']);
				 		$data_plantao=$query['data_p']; ?>
				</span>  
			</span>
		</div>
		<div class="col-md-3 col-xs-6">
			<span>
				<span>
					<strong>
					OPERADOR: 
						<?php
							$operador =  $query['id_op'];

							$op = "SELECT op_nome FROM operadores WHERE id_op = '$operador'";
							$res_op = mysqli_query($conexao, $op);
							$lista_op = mysqli_fetch_array($res_op);

							$operador = $lista_op['op_nome'];
							$operador=strtoupper($operador); 

							echo $operador;
						?>
					</strong>
				</span>
			</span><BR>
		</div>
	</div>
		<hr>
	<div class="container bg-white rounded">
		<div class="mb-2 py-1 row d-flex flex-row-reverse">
			<div class="adm">
				<button class="btn">Editar Plantão</button>
			</div>
		</div>
	</div>
		<!-- INSPETOR E AGENTES -->
	<div class="px-1 bg-white border rounded">
		<div class="row">
			<div class="col-3">
				<strong>INSPETOR:</strong>
			</div>
			<div class="col-8">
				<span> 
					

				</span>
			</div>
		</div>

			<br>

		<div class="row">
			<div class="col-12">
				<strong>AGENTES DE PLANTÃO:</strong>
			</div>
			<div class="col-12">
						<?php

				$sql_ap = "select ag_nguerra from agentes a 
				join agentes_plantao ap
				on a.id_agente = ap.id_agente and ap.id_plantao=$id_p and ap.status='PLANTAO'";
				$res_ap = mysqli_query($conexao, $sql_ap);
				$ap = mysqli_num_rows($res_ap);
				$i = 1;
				if ($ap != 0) {
					while ($consulta_ap = mysqli_fetch_array($res_ap)) {
						
					echo "<span> ".$i++." - ".$consulta_ap['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}?>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-12">
				<strong>AGENTES DE HE:</strong>
			</div>
			<div class="col-12">
						<?php
				$i_he=1;
				$sql_ap = "select ag_nguerra from agentes a 
				join agentes_plantao ap
				on a.id_agente = ap.id_agente and ap.id_plantao=$id_p and ap.status='HE'";
				$res_ap = mysqli_query($conexao, $sql_ap);
				$ap = mysqli_num_rows($res_ap);

				if ($ap != 0) {
					while ($consulta_ap = mysqli_fetch_array($res_ap)) {
					echo "<span> ".$i_he++." - ".$consulta_ap['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo "Nenhum agente de hora extra";
				}?>
			</div>
		</div>
	</div>
	<br>

	<!-- DISTRIBUICAO DOS RADIOS -->
	<div class="px-1 bg-white border rounded">
		<div class="row">
			<div class="col-12">
				<strong>RADIOS:</strong>
			</div>
			<div class="col-12">
						<?php 
							$radios = $query['radios'];
							if (!empty($radios)) {
								echo $radios;
							}else{
								echo "Nenhum radio registrado...";
							}
						?>
			</div>
		</div>
	</div>	

	<br>

	<!-- DISTRIBUICAO NAS VIATURAS -->
	<div class="px-1 bg-white border rounded">
		<strong>VIATURAS</strong>
		<div class="row">
			<div class="col-3 ">VTR 1</div>
			<div class="col-9">
				<?php

				$sql_vtr1 = "select ag_nguerra from agentes a join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=1";
				$res_vtr1 = mysqli_query($conexao, $sql_vtr1);
				$vtr1 = mysqli_num_rows($res_vtr1);

				if ($vtr1 != 0) {
					while ($consulta_vtr1 = mysqli_fetch_array($res_vtr1)) {
					echo "<span> ".$consulta_vtr1['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			 	
			 </div>
			<div class="col-3">VTR 2</div>
			<div class="col-9">
			<?php

				$sql_vtr2 = "select ag_nguerra from agentes a 
				join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=2";
				$res_vtr2 = mysqli_query($conexao, $sql_vtr2);
				$vtr2 = mysqli_num_rows($res_vtr2);

				if ($vtr2 != 0) {
					while ($consulta_vtr2 = mysqli_fetch_array($res_vtr2)) {
					echo "<span> ".$consulta_vtr2['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			</div>
			<div class="col-3">VTR 3</div>
			<div class="col-9">
				<?php

				$sql_vtr3 = "select ag_nguerra from agentes a join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=3";
				$res_vtr3 = mysqli_query($conexao, $sql_vtr3);
				$vtr3 = mysqli_num_rows($res_vtr3);

				if ($vtr3 != 0) {
					while ($consulta_vtr3 = mysqli_fetch_array($res_vtr3)) {
					echo "<span> ".$consulta_vtr3['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			</div>
			<div class="col-3">VTR 4</div>
			<div class="col-9">
				<?php

				$sql_vtr4 = "select ag_nguerra from agentes a join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=4";
				$res_vtr4 = mysqli_query($conexao, $sql_vtr4);
				$vtr4 = mysqli_num_rows($res_vtr4);

				if ($vtr4 != 0) {
					while ($consulta_vtr4 = mysqli_fetch_array($res_vtr4)) {
					echo "<span> ".$consulta_vtr4['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			</div>
			<div class="col-3">VTR 5</div>
			<div class="col-9">
				<?php

				$sql_vtr5 = "select ag_nguerra from agentes a join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=5";
				$res_vtr5 = mysqli_query($conexao, $sql_vtr5);
				$vtr5 = mysqli_num_rows($res_vtr5);

				if ($vtr5 != 0) {
					while ($consulta_vtr5 = mysqli_fetch_array($res_vtr5)) {
					echo "<span> ".$consulta_vtr5['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			</div>
			<div class="col-3">VTR 6</div>
			<div class="col-9">
				<?php

				$sql_vtr6 = "select ag_nguerra from agentes a join vtr_plantao vp
				on a.id_agente = vp.id_agente and vp.id_plantao=$id_p and vp.id_vtr=6";
				$res_vtr6 = mysqli_query($conexao, $sql_vtr6);
				$vtr6 = mysqli_num_rows($res_vtr6);

				if ($vtr6 != 0) {
					while ($consulta_vtr6 = mysqli_fetch_array($res_vtr6)) {
					echo "<span> ".$consulta_vtr6['ag_nguerra']."</span>". " &nbsp  &nbsp ";
				}

				}else {
					echo " ";
				}

			 ?>
			</div>
		</div>
	</div>
	<br>
	
	<br>

	<!-- OBSERVAÇÕES ACERCA DO PLANTAO -->
	<div class="px-1 bg-white border rounded">
		<div class="row">
			<div class="col-12">
				<strong>OBSERVAÇÕES:</strong>
			</div>
			<div class="col-12">
				<?php 
					$obs = $query['obs'];
					if (!empty($obs)) {
						echo $obs;
					}else{
						echo "Sem Observações...";
					}
				

				?>
			</div>
		</div>
	</div>	<br>
</div>

	<?php } ?> 
 


<!-- LISTAGEM DAS OCORRENCIAS DO PLANTÃO -->
<div class="container">
	<div class="mb-3 px-1 bg-white border rounded">
		<p>
		<strong>OCORRÊNCIAS</strong>
		</p>
		<table class="table">
			<tr>
				<th>Horário</th>
				<th>Ocorrências</th>
				<th>VTR´s</th>
			</tr>

			<?php 
			
			
			$sql_oco = "SELECT * FROM ocorencias WHERE id_p=$id_p order by id_o DESC" or die(mysqli_error());
			$consulta = mysqli_query($conexao,$sql_oco);
		
			while($linha = mysqli_fetch_array($consulta)) { ?>

			<tr>
				<td>
					<?php echo $linha['hora_oco']; ?> 
				</td>

				<td>
					<?php echo ucfirst ( nl2br ( strip_tags ($linha['ocorrencia']))) ?><br>
					<?php echo $linha['endereco'];?> 
					<?php echo $linha['bairro'];?>
					<BR>
					<?php $acidente=$linha['acidente']; 
					if ($acidente=='checked') {
						echo "<small>"."BOAT: $linha[n_boat]" . " | " . "Severidade: $linha[severidade]" . " | " . "Agente: $linha[mat_agente]" . "</small>" ;}
					?>
				</td>

				<td>
					<?php echo nl2br  ( strip_tags ($linha['vtr'])) ?>
				</td>


	 			<td width="15px" align="center"><a title="Editar" href="javascript:abrir('lib/editar_ocorrencia.php?id_oco=<?php echo $linha ['id_o'];?>');" target="_blank"> <img src="img/editar2.png" width="10"> </a>
	 			</td> 
			</tr>
			<?php } ?>
		</table>
	</div>
</div>

 
 <?php } ?>


<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>