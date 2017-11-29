<?php 
	include_once ('conexao.php');
	session_start();
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

<div style="box-shadow:0px 2px 20px; padding:7px;  width:810px; margin:0 auto; margin-top:5px;background-color:#fff;"> CONTROLE DE INVENTÁRIOS
<div style="box-shadow:0px 2px 10px; padding:7px;  width:790px; margin:0 auto; margin-top:5px;background-color:#fff;">
<?php if ($tipo==2){?>
<form method="GET" action="cadas_invent.php">
<HR noshade>
	<?php	$res = mysql_query("SELECT n_invent FROM c_invent ORDER BY n_invent DESC limit 1") or die ("Err");
	while($query = mysql_fetch_array($res)){ $n_invent=$query['n_invent'];$novo_invet=$n_invent+1;?>
	<input type="text" value="<?php echo "$novo_invet";?>" size="5" name="n_invent">
	<?php }?>
 <input name="data" value="<?php echo date ("d/m/Y");?>" size="7">
 <input name="placa" id="placa"  type="text" placeholder="aaa-9999" size="7" maxlength="8" required>
S/P:<input type="checkbox" name="chassi" id="chassi" value="checked" title="CHASSI (Caso não aja placa)" onclick="document.getElementById('placa').value='S/PLACA'">
	<input name="chassi" size="15" id="chassi_input"  style="display:none;" placeholder="CHASSI" title="Chassi Obrigatório">


      <select name="estado_placa">
	  <option></option>
		<?php echo estados( 'PA' ); ?>
      </select>
 <!-- <input name="marca" placeholder="Marca" size="12"> -->
       <select name="marca">
	  <optgroup label="CARRO">
	  <OPTION>VOLKSWAGEN</OPTION>
	  <OPTION>FORD</OPTION>
	  <OPTION>CHEVROLET</OPTION>
	  <OPTION>PEUGEOT</OPTION>
	  <OPTION>FIAT</OPTION>
	  <OPTION>MERCEDES BENZ</OPTION>
	   <OPTION>HONDA</OPTION>
	   <OPTION>MITSUBISHI</OPTION>
	   <OPTION>CHERY</OPTION>
      <OPTION>NISSAN</OPTION>
	  <OPTION>VOLVO</OPTION>
	  <OPTION>CHERRY</OPTION>
	  <OPTION>HYUNDAI</OPTION>
	  <OPTION>TOYOTA</OPTION>
	  <OPTION>GM</OPTION>
	  <OPTION>RENAULT</OPTION>
	  <OPTION>OUTROS</OPTION>
	  <OPTION>N/E</OPTION>
	  </optgroup>
	  <optgroup label="MOTO">
	  <OPTION>SUZUKI</OPTION>
	  <OPTION>HONDA</OPTION>
	  <OPTION>RENAULT</OPTION>
	  <OPTION>YAMAHA</OPTION>
      <OPTION>TRAXX</OPTION>
	  <OPTION>SOUNDOWN</OPTION>
	  <OPTION>KASINSKI</OPTION>
	  <OPTION>OUTROS</OPTION>
	  <OPTION>N/E</OPTION>
	  </optgroup>
      </select>
 <input name="modelo" placeholder="MODELO">

       <select name="cor_veiculo">
	   	<?php echo cores(); ?>
      </select>
 
 
 <input name="local" placeholder="ENDEREÇO..." size="35"> TRANS<input type="radio" name="lei" value="TRANS" required checked>TRANSP<input type="radio" name="lei" value="TRANSP">
 <input  name="cod_agente" id="cod_agente"  placeholder="Motivo. Ex: 181 * XIII" size="22" required title="Ex: 181 * XIII"> <font size="1" color="#999">Acidente:</font><input type="checkbox" name="acidente" value="checked">
  <input name="mat_agente" placeholder="MAT. AGENTE" size="8"> <a href="javascript:abrir('agentes.php');" title="Relação de Agentes"> <strong> ? </strong> </a>
				<!-- <span class="carregando">Algo errado...</span> -->
				<!-- <select name="nome_agente" id="nome_agente"style="border:0px solid;">
					<option value=""></option>
				</select> -->
				<div id="nome_agente" style="font-size:12px;"> </div>
				<HR noshade>
<input value=" CADASTRAR " type="submit"><?php } ?>
		<ul style="">	
	 <li> <a href="javascript:abrir('lib/gtransp_detran.php?n=1');" title="VEÍCULO: INFRAÇÃO RESUMIDA"><img src="img/deunx.png" width="10">Resumida</a>
	 <li> <a href="javascript:abrir('lib/gtransp_detran.php?n=2');" title="VEÍCULO: INFRAÇÃO DETALHADA"><img src="img/deunx.png" width="10">Detalhada</a>
 	 <li> <a href="javascript:abrir('https://sinespcidadao.sinesp.gov.br/sinesp-cidadao/?');" title="VEÍCULO: BASE NACIONAL"><img src="img/deunx.png" width="10">Sinesp</a>
	 <li> <a href="javascript:abrir('lib/gtransp_detran.php?n=4');" title="VEÍCULO: INFRAÇÃO DETALHADA"><img src="img/deunx.png" width="10">Chassi</a>
		</ul>	
</forM> 
</div>
							<script type="text/javascript">
							$(function(){
								$('#cod_agente').change(function(){
									if( $(this).val() ) {
										$('#nome_agente').hide();
										$('.carregando').show();
										$.getJSON('cidades.ajax.php?search=',{cod_agente: $(this).val(), ajax: 'true'}, function(j){
											var options = '';	
											for (var i = 0; i < j.length; i++) {
												options += '<a  href="#" onclick="document.getElementById(\'cod_agente\').value=\''+ j[i].artigo + j[i].espaco +  j[i].descricao + '\'">'+ j[i].artigo + j[i].espaco +  j[i].descricao + '</a><BR>';
											}	
											
											$('#nome_agente').html(options).show('slow');
											
											$('.carregando').hide();
											
										});
									} else {
										$('#nome_agente').html('<option value="" ></option>');
									}
								});
							});
							</script>
<BR>

<center>
BUSCAR: <input  name="n_invent" id="n_invent"  placeholder="Nº INVENTÁRIO ou PLACA" size="22"><button title="Buscar Inventario">BUSCAR</button>
<table border="1" id="inventarios"  class="tabela" max-width="795"><BR><span class="carregando">Buscando...</span> </table><BR>
							<script type="text/javascript">
							$(function(){
								$('#n_invent').change(function(){
									if( $(this).val() ) {
										$('#inventarios').hide();
										$('.carregando').show();
										$.getJSON('invent.ajax.php?search=',{n_invent: $(this).val(), ajax: 'true'}, function(j){
											var options = '';	
											for (var i = 0; i < j.length; i++) {
												options += '<TR><td>'+ j[i].n_invent+'</td><td>'+ j[i].data+'</td><td>'+ j[i].marca+'/'+j[i].modelo+ '</td><td>'+ j[i].placa+'-'+ j[i].uf+ '</td><td>'+ j[i].endereco +'</td><td>'+ j[i].motivo +'<td><a  href="javascript:abrir(\'lib/editar_inventario.php?id_invent='+ j[i].id_invent +'\');"><img src="img/editar2.png" width="10"></a></td>';
											}	
											
											$('#inventarios').html(options).show('slow');
											$('.carregando').hide();
											if (j.length == 0) {$('#inventarios').html('<font color="#999">&nbsp;Inventario não encontrado...</font>');}
											
										});
									} else {
										$('#inventarios').html('<font color="#999">&nbsp;Digite o nº do Invetário...</font>');
									}
								});
							});
							</script>

			<table border="1" style="" class="tabela" align="center" width="795">
			<tr>
			<th>Nº</th><th>DATA</th><th>MARCA/MODELO</th><th>COR</th><th>PLACA</th><th>UF</th><th>ENDEREÇO</th><th>MOTIVO</th><th>AGENTE</th>
			</tr>
				<?php
				$res = mysql_query("SELECT * FROM c_invent ORDER BY id_invent DESC limit 10") or die ("Err");
				while($query = mysql_fetch_array($res)){
				?>
			<tr>
				<td><?php echo $query['n_invent']; ?>/<?php echo $query['ano_atual']; ?></td>
				<td><?php echo $query['data']; ?></td>
				<td><?php echo strtoupper ($query['marca']); ?>/<?php echo strtoupper ($query['modelo']); ?></td>
				<td><?php echo $query['cor']; ?></td>
				<td><?php echo strtoupper ($query['placa']); ?></td>
				<td><?php echo $query['uf']; ?></td>
				<td><?php echo strtoupper ($query['endereco']); ?></td>
				<td><?php echo strtoupper  ($query['motivo']); ?></td>
				<td><?php echo strtoupper  ($query['mat_agente']); ?></td>
				<?php if ($tipo==2){?> <td><a title="Editar" href="javascript:abrir('lib/editar_inventario.php?id_invent=<?php echo $query['id_invent'];?>');" target="_blank"> <img src="img/editar2.png" width="10"> </a></td> <?php } ?>
			
			</tr>	
				<?php }?>

			</table>
</div>


<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/app.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
