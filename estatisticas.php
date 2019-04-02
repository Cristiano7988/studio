<!DOCTYPE html>
<html>
<head>
	<title>Estatísticas - Studio Harmonia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo3.css">
	<link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">	
	<?php
		//Cria a conexao com o banco de dados, localhost: Servidor do banco de dados, root: Usuário que acessa o banco de dados, e "" senha que esta vazia no momento, bd_agenda = nome do banco de dados
		$link = mysqli_connect("localhost:3306", "harmon53_root", "cr1st1ano2019", "harmon53_bd_agenda");

		if (!$link) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	   		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    		exit;
		}
	?>
	<script type="text/javascript" src="../index/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function buscahora(h){
			//alert(h);
			$.ajax({
				type    : "GET",            
				async   : true, // Essa linha determina se a requisição vai ser sincrona ou assincrona
				url     : "buscahora.php?chave2="+h+"", // Essa linha vai ser a URL para qual os dados serão enviados
				success : function(data) { // Essa função vai ser executada após o retorno
					//console.log(data);
					//alert(data);
					var div = data.split("##");
//					alert(div[0]);
//					alert(div[1]);
					var separa1 = div[0].split('=');
					var separa2 = div[1].split('=');
					
					var resultadoh = separa1[1];
					var resultadoc = separa2[1];

					document.getElementById('campo').innerHTML =
					"<table id='tabelapesquisa'>"+
						"<tr>"+
							"<td> Horário </td>"+
							"<td> Colaborador </td>"+
						"</tr>"+
						"<tr>"+
							"<td>"+resultadoh+":00 </td>"+
							"<td>"+resultadoc+"</td>"+
						"</tr>"+
					"</table>"
							;
				}

			});

			$('#mostrah').html(""); //Exibe o resultado na tela
			var div_r3 = "div[2].split('=')";
			var div_r4 = "div[3].split('=')";
			$('#mostrac').html("");


		}
	</script>
</head>
<body>
	<article id="estatisticas">
		<h1>Estatísticas</h1>
		<br>
		<br>
		<h3>Total por Colaboradores</h3>
		<br/>
		<h3>Sonia</h3>
		<p>Carga Horária: <span id="ctSonia"></span> hora(s)</p><hr id="b1" class="barra">
		<p>Aluguel da sala: R$ <span id="ctSonia2"></span>,00</p><hr id="b2" class="barra">
		<br><br>

		<h3>Elizabeth</h3>
		<p>Carga Horária: <span id="ctElizabeth"></span>hora(s)</p><hr id="b3" class="barra">
		<p>Aluguel da sala: R$ <span id="ctElizabeth2"></span>,00</p><hr id="b4" class="barra">
		<br><br>

		<h3>Cristina</h3>
		<p>Carga Horária: <span id="ctCristina"></span>&nbsp hora(s)</p><hr id="b5" class="barra">
		<p>Aluguel da sala: R$ <span id="ctCristina2"></span>,00</p><hr id="b6" class="barra">
		<br><br>

		<h3>Camila</h3>
		<p>Carga Horária: <span id="ctCamila"></span>&nbsp hora(s)</p><hr id="b7" class="barra">
		<p>Aluguel da sala: R$ <span id="ctCamila2"></span>,00</p><hr id="b8" class="barra">
		<br><br>

		<h3>Kelly</h3>
		<p>Carga Horária: <span id="ctKelly"></span>&nbsp hora(s)</p><hr id="b9" class="barra">
		<p>Aluguel da sala: R$ <span id="ctKelly2"></span>,00</p><hr id="b10" class="barra">
		<br><br>

		<h3>Camila</h3>
		<p>Carga Horária: <span id="ctClaudia"></span>&nbsp hora(s)</p><hr id="b11" class="barra">
		<p>Aluguel da sala: R$ <span id="ctClaudia2"></span>,00</p><hr id="b12" class="barra">
		<br><br>		
	</article>
<!--
	<article id="campopesquisa">
	
		<br/>
		<button onclick="buscahora('8')">Pesquisar agendamentos feitos às 8:00</button>
		<br/>
		<br/>
		<div id="campo"></div>

	</article>
	-->
<script type="text/javascript">




	<?php
		//RETORNA DADOS DO BANCO
		//HORA		
		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'SONIA'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_sonia = $resultado_hora[0] ;

		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_elizabeth = $resultado_hora[0] ;

		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'CRISTINA'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_cristina = $resultado_hora[0] ;

		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'CAMILA'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_camila = $resultado_hora[0] ;

		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'KELLY'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_kelly = $resultado_hora[0] ;

		$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'CLAUDIA'");
		$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
		$total_hora_claudia = $resultado_hora[0] ;						

		//ALUGUEL//
		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'SONIA'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_sonia = $resultado_aluguel[0] ;

		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_elizabeth = $resultado_aluguel[0] ;

		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'CRISTINA'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_cristina = $resultado_aluguel[0] ;

		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'CAMILA'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_camila = $resultado_aluguel[0] ;

		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'KELLY'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_kelly = $resultado_aluguel[0] ;

		$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'CLAUDIA'");
		$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
		$total_aluguel_claudia = $resultado_aluguel[0] ;

		//BARRA
		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'SONIA'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_sonia = $resultado_barra[0] ;

		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_elizabeth = $resultado_barra[0] ;

		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'CRISTINA'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_cristina = $resultado_barra[0] ;

		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'CAMILA'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_camila = $resultado_barra[0] ;

		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'KELLY'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_kelly = $resultado_barra[0] ;

		$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'CLAUDIA'");
		$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
		$total_barra_claudia = $resultado_barra[0] ;		


		//BARRA2
		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'SONIA'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_sonia = $resultado_barra2[0] ;

		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_elizabeth = $resultado_barra2[0] ;

		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'CRISTINA'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_cristina = $resultado_barra2[0] ;		

		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'CAMILA'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_camila = $resultado_barra2[0] ;

		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'KELLY'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_kelly = $resultado_barra2[0] ;		

		$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'CLAUDIA'");
		$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
		$total_barra2_claudia = $resultado_barra2[0] ;


		//Traz as informações e carrega na tela
		$result = mysqli_query($link,"Select * from agenda2");
		$resultado = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$total_linhas = 0;

		//CASO NÃO HÁ O QUE RETORNAR:

		/* HORA */
		if(empty($total_hora_sonia)){$total_hora_sonia=0;}
		if(empty($total_hora_elizabeth)){$total_hora_elizabeth=0;}
		if(empty($total_hora_cristina)){$total_hora_cristina=0;}
		if(empty($total_hora_camila)){$total_hora_camila=0;}
		if(empty($total_hora_kelly)){$total_hora_kelly=0;}
		if(empty($total_hora_claudia)){$total_hora_claudia=0;}
		/* ALUGUEL */
		if(empty($total_aluguel_sonia)){$total_aluguel_sonia=0;}
		if(empty($total_aluguel_elizabeth)){$total_aluguel_elizabeth=0;}
		if(empty($total_aluguel_cristina)){$total_aluguel_cristina=0;}
		if(empty($total_aluguel_camila)){$total_aluguel_camila=0;}
		if(empty($total_aluguel_kelly)){$total_aluguel_kelly=0;}
		if(empty($total_aluguel_claudia)){$total_aluguel_claudia=0;}
		/* BARRA */
		if(empty($total_barra_sonia)){$total_barra_sonia=0;}
		if(empty($total_barra_elizabeth)){$total_barra_elizabeth=0;}
		if(empty($total_barra_cristina)){$total_barra_cristina=0;}
		if(empty($total_barra_camila)){$total_barra_camila=0;}
		if(empty($total_barra_kelly)){$total_barra_kelly=0;}
		if(empty($total_barra_claudia)){$total_barra_claudia=0;}
		/* BARRA DOIS */
		if(empty($total_barra2_sonia)){$total_barra2_sonia=0;}	
		if(empty($total_barra2_elizabeth)){$total_barra2_elizabeth=0;}
		if(empty($total_barra2_cristina)){$total_barra2_cristina=0;}
		if(empty($total_barra2_camila)){$total_barra2_camila=0;}
		if(empty($total_barra2_kelly)){$total_barra2_kelly=0;}
		if(empty($total_barra2_claudia)){$total_barra2_claudia=0;}		
	?>

	//HORA
	var totalhoraelizabeth = 	<?php echo $total_hora_elizabeth; 		?>;
	var totalhorasonia = 		<?php echo $total_hora_sonia; 			?>;
	var totalhoracristina = 	<?php echo $total_hora_cristina; 		?>;
	var totalhoracamila = 		<?php echo $total_hora_camila; 			?>;
	var totalhorakelly = 		<?php echo $total_hora_kelly; 			?>;	
	var totalhoraclaudia = 		<?php echo $total_hora_claudia;			?>;	
	//ALUGUEL
	var totalaluguelelizabeth = <?php echo $total_aluguel_elizabeth;	?>;
	var totalaluguelsonia = 	<?php echo $total_aluguel_sonia; 		?>;
	var totalaluguelcristina =	<?php echo $total_aluguel_cristina; 	?>;
	var totalaluguelcamila = 	<?php echo $total_aluguel_camila; 		?>;
	var totalaluguelkelly = 	<?php echo $total_aluguel_kelly; 		?>;
	var totalaluguelclaudia = 	<?php echo $total_aluguel_claudia; 		?>;		
	//BARRA UM
	var totalbarraelizabeth = 	<?php echo $total_barra_elizabeth; 		?>;
	var totalbarrasonia = 		<?php echo $total_barra_sonia; 			?>;
	var totalbarracristina = 	<?php echo $total_barra_cristina;	 	?>;
	var totalbarracamila = 		<?php echo $total_barra_camila; 		?>;
	var totalbarrakelly = 		<?php echo $total_barra_kelly; 			?>;
	var totalbarraclaudia = 	<?php echo $total_barra_claudia; 		?>;		
	//BARRA DOIS
	var totalbarra2elizabeth = 	<?php echo $total_barra2_elizabeth; 	?>;
	var totalbarra2sonia = 		<?php echo $total_barra2_sonia; 		?>;
	var totalbarra2cristina = 	<?php echo $total_barra2_cristina; 		?>;
	var totalbarra2camila = 	<?php echo $total_barra2_camila; 		?>;
	var totalbarra2kelly = 		<?php echo $total_barra2_kelly; 		?>;
	var totalbarra2claudia = 	<?php echo $total_barra2_claudia; 		?>;		
	//ATRIBUI À CELULA O VALOR RETORNADO DO BANCO DE DADOS

	//HORA						
	document.getElementById("ctSonia").innerHTML = 			totalhorasonia;
	document.getElementById("ctElizabeth").innerHTML = 		totalhoraelizabeth;
	document.getElementById("ctCristina").innerHTML = 		totalhoracristina;		
	document.getElementById("ctCamila").innerHTML = 		totalhoracamila;
	document.getElementById("ctKelly").innerHTML = 			totalhorakelly;
	document.getElementById("ctClaudia").innerHTML = 		totalhoraclaudia;	
	//Aluguel//
	document.getElementById("ctSonia2").innerHTML = 		totalaluguelsonia;
	document.getElementById("ctElizabeth2").innerHTML = 	totalaluguelelizabeth;
	document.getElementById("ctCristina2").innerHTML = 		totalaluguelcristina;
	document.getElementById("ctCamila2").innerHTML = 		totalaluguelcamila;
	document.getElementById("ctKelly2").innerHTML = 		totalaluguelkelly;
	document.getElementById("ctClaudia2").innerHTML = 		totalaluguelclaudia;	
	//BARRA//
	var b1 = <?php echo $total_barra_sonia; 		?>;
	var b2 = <?php echo $total_barra2_sonia; 		?>;
	var b3 = <?php echo $total_barra_elizabeth; 	?>;
	var b4 = <?php echo $total_barra2_elizabeth; 	?>;
	var b5 = <?php echo $total_barra_cristina; 		?>;
	var b6 = <?php echo $total_barra2_cristina; 	?>;
	var b7 = <?php echo $total_barra_camila; 		?>;
	var b8 = <?php echo $total_barra2_camila; 		?>;
	var b9 = <?php echo $total_barra_kelly; 		?>;
	var b10 = <?php echo $total_barra2_kelly; 		?>;
	var b11 = <?php echo $total_barra_claudia; 		?>;
	var b12 = <?php echo $total_barra2_claudia; 	?>;	

	document.getElementsByClassName("barra")[0].style.width = b1 + "px";
	document.getElementsByClassName("barra")[1].style.width = b2 + "px";
	document.getElementsByClassName("barra")[2].style.width = b3 + "px";
	document.getElementsByClassName("barra")[3].style.width = b4 + "px";
	document.getElementsByClassName("barra")[4].style.width = b5 + "px";
	document.getElementsByClassName("barra")[5].style.width = b6 + "px";
	document.getElementsByClassName("barra")[6].style.width = b7 + "px";
	document.getElementsByClassName("barra")[7].style.width = b8 + "px";
	document.getElementsByClassName("barra")[8].style.width = b9 + "px";
	document.getElementsByClassName("barra")[9].style.width = b10 + "px";
	document.getElementsByClassName("barra")[10].style.width = b11 + "px";
	document.getElementsByClassName("barra")[11].style.width = b12 + "px";			

</script>
</body>
</html>