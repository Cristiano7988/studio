<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Studio Harmonia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilo2.css">

<?php
//Cria a conexao com o banco de dados, localhost: Servidor do banco de dados, root: Usuário que acessa o banco de dados, e "" senha que esta vazia no momento, bd_agenda = nome do banco de dados
$link = mysqli_connect("localhost", "root", "", "bd_agenda");

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$dia = 0;

$ds_dia = 'Agenda de Cristiano';
$mes = null;
$ano = 2018;
$usuario = null;
$dthr_cria = date('Y/m/d');
$ds_dia = 'Bom';
$fl_ativo = 1;
$dia_util = 1;
$id_dia = null;
$hora = 0;
$aluguel = 0;
$barra = 0;
$barra2 = 0;

		$result = mysqli_query($link,"Select * from agenda2");


?>







	<script type="text/javascript" src="jquery-3.3.1.min.js">
		
	</script>
	<script type="text/javascript" src="java.js">
var variaveljs = 13;

<?php 
	
	if (!empty($_POST["posicao"])){
		$id_dia = $_POST["dia"];
		$barra = 10;
		$barra2 = 30;
		$hora = 1;
		$aluguel = 30;
		$posicao  = $_POST["posicao"];
		$mes = $_POST["mes"];		
		
		$result = mysqli_query($link,"Select max(id_agenda) + 1 from agenda2");
		$id_agenda = $result->fetch_array(MYSQLI_NUM);
		$id_agenda = $id_agenda[0] ;
		if (empty($id_agenda)){
			$id_agenda = 1;
		}

		$del =	"delete from agenda2 where id_dia = ".$id_dia." and id_mes = ".$id_mes." and id_ano = ".$id_ano." ";
		mysqli_query($link,$del);
		//Mostra na inspenção do navegador
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		foreach ($posicao as $key => $value) {

			$usuario_fim = $_POST["usuario"][$key];
			$dia_insere = $_POST["dia"][$key];
			$mes_insere = $_POST["mes"][$key];

			$execute =

			"insert into agenda2 	(id_agenda,		posicao,	hora,	aluguel,	barra,	barra2,		id_dia,			id_mes, 		id_ano,		nome,		colaborador,	dthr_criacao)
			values 					($id_agenda, 	$value,		$hora,	$aluguel,	$barra,	$barra2, 	$dia_insere,	$mes_insere,	$ano,		'$ds_dia',	'$usuario_fim',	'$dthr_cria')"; 
			mysqli_query($link,$execute);

			$id_agenda = $id_agenda + 1;
			# code...

		}

		
	}else{	

		//Quando foi enviado nenhum colaboradorr
		$result = mysqli_query($link,"Select count(*) from agenda2");
		$resultado = $result->fetch_array(MYSQLI_NUM);
		$existe = $resultado[0];

		if(!empty($existe)){
			$del = "delete from agenda2";
			mysqli_query($link, $del);
		}

/*
		if (!empty($_POST["posicao"])){
			if (!empty($existe)){
				$del ="delete from agenda2";
				mysqli_query($link,$del);
			}
		}else{





			/*
			if($totalhorasonia < $existe){
				if (!empty($existe)){
					$del ="delete from agenda2";
					mysqli_query($link,$del);
				}
			}




		}*/
		
	}
?>


	</script>
	 
</head>
<body onload="geracalendario(2)">
<?php /*echo $execute; */?>
		<article id="agenda">
		<form action="agenda.php" name='agenda' url method="post">

			<div class="delimitador">
				<h3>Colaboradores:</h3>
				<br>
				<table>
					<tr>
						<td id="t1" class='t' onclick="trocar('t1')">Elizabeth</td>
						<td id="ti" class="t"></td>
						<td id="t2" class='t' onclick="trocar('t2')">Sonia</td>
						<td id="tii" class="t"></td>
						<td id="t3" class='t' onclick="trocar('t3')">Júlia</td>
						<td id="tiii" class="t"></td>			
					</tr>
				</table>
				<br/>
				</br>

				<span onclick="geracalendario(1)">Janeiro</span>
				<span onclick="geracalendario(2)">Fevereiro</span>
				<span onclick="geracalendario(3)">Março</span>
				<span onclick="geracalendario(4)">Abril</span>
				<span onclick="geracalendario(5)">Maio</span>
				<span onclick="geracalendario(6)">Junho</span>
				<span onclick="geracalendario(7)">Julho</span>
				<span onclick="geracalendario(8)">Agosto</span>
				<span onclick="geracalendario(9)">Setembro</span>
				<span onclick="geracalendario(10)">Outubro</span>
				<span onclick="geracalendario(11)">Novembro</span>
				<span onclick="geracalendario(12)">Dezembro</span>												
				<input type="submit" style="margin-bottom: 20px">
				<br>
				<div id="calendario">

				</div>
				<div id="campo">

				</div>

				<article id="estatisticas">
					<h3>TOTAL POR COLABORADORES</h3>
					<br/>
					<h3>Sonia</h3>
					<p>Carga Horária: <span id="ctSonia"></span> hora(s)</p><hr id="b1" class="barra">
					<p>Aluguel da sala: R$ <span id="ctSonia2"></span>,00</p><hr id="b2" class="barra">
					<br><br>

					<h3>Elizabeth</h3>
					<p>Carga Horária: <span id="ctElizabeth"></span>hora(s)</p><hr id="b3" class="barra">
					<p>Aluguel da sala: R$ <span id="ctElizabeth2"></span>,00</p><hr id="b4" class="barra">
					<br><br>

					<h3>Júlia</h3>
					<p>Carga Horária: <span id="ctJulia"></span>&nbsp hora(s)</p><hr id="b5" class="barra">
					<p>Aluguel da sala: R$ <span id="ctJulia2"></span>,00</p><hr id="b6" class="barra">
					<br><br>

				</article>
			</div>	
		</article>
	</form>
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


			$result_hora = mysqli_query($link,"SELECT SUM(hora) total_hora FROM agenda2 WHERE COLABORADOR = 'JULIA'");
			$resultado_hora = $result_hora->fetch_array(MYSQLI_NUM);
			$total_hora_julia = $resultado_hora[0] ;



			//ALUGUEL//
			$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'SONIA'");
			$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
			$total_aluguel_sonia = $resultado_aluguel[0] ;

			$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
			$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
			$total_aluguel_elizabeth = $resultado_aluguel[0] ;

			$result_aluguel = mysqli_query($link,"SELECT SUM(aluguel) total_aluguel FROM agenda2 WHERE COLABORADOR = 'JULIA'");
			$resultado_aluguel = $result_aluguel->fetch_array(MYSQLI_NUM);
			$total_aluguel_julia = $resultado_aluguel[0] ;


		

			//BARRA
			$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'SONIA'");
			$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
			$total_barra_sonia = $resultado_barra[0] ;

			$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
			$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
			$total_barra_elizabeth = $resultado_barra[0] ;

			$result_barra = mysqli_query($link,"SELECT SUM(barra) total_barra FROM agenda2 WHERE COLABORADOR = 'JULIA'");
			$resultado_barra = $result_barra->fetch_array(MYSQLI_NUM);
			$total_barra_julia = $resultado_barra[0] ;




			//BARRA2
			$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'SONIA'");
			$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
			$total_barra2_sonia = $resultado_barra2[0] ;

			$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'ELIZABETH'");
			$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
			$total_barra2_elizabeth = $resultado_barra2[0] ;

			$result_barra2 = mysqli_query($link,"SELECT SUM(barra2) total_barra2 FROM agenda2 WHERE COLABORADOR = 'JULIA'");
			$resultado_barra2 = $result_barra2->fetch_array(MYSQLI_NUM);
			$total_barra2_julia = $resultado_barra2[0] ;		



			//TRaz as informações e carrega na tela
			$result = mysqli_query($link,"Select * from agenda2");
			$resultado = mysqli_fetch_all($result,MYSQLI_ASSOC);
			$total_linhas = 0;

			//CASO NÃO HÁ O QUE RETORNAR:

			/* HORA */
			if(empty($total_hora_sonia)){
				$total_hora_sonia=0;
			}
			if(empty($total_hora_elizabeth)){
				$total_hora_elizabeth=0;
			}
			if(empty($total_hora_julia)){
				$total_hora_julia=0;
			}

			/* ALUGUEL */
			if(empty($total_aluguel_sonia)){
				$total_aluguel_sonia=0;
			}
			if(empty($total_aluguel_elizabeth)){
				$total_aluguel_elizabeth=0;
			}
			if(empty($total_aluguel_julia)){
				$total_aluguel_julia=0;
			}

			/* BARRA */
			if(empty($total_barra_sonia)){
				$total_barra_sonia=0;
			}
			if(empty($total_barra_elizabeth)){
				$total_barra_elizabeth=0;
			}
			if(empty($total_barra_julia)){
				$total_barra_julia=0;
			}


			/* BARRA DOIS */
			if(empty($total_barra2_sonia)){
				$total_barra2_sonia=0;
			}	
			if(empty($total_barra2_elizabeth)){
				$total_barra2_elizabeth=0;
			}
			if(empty($total_barra2_julia)){
				$total_barra2_julia=0;
			}
		?>

		function trocames(t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, t31, t32, t33, t34, t35, m, mes, t36){
			alert(parmes(t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, t31, t32, t33, t34, t35, m, "Janeiro", t36));
		}
		var t36 = "";
	function parmes(t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, t31, t32, t33, t34, t35, m, mes, t36){

		if((m==6)||(m==3)){linha7 = 
				"<tr id='l7'>"
					+"<td id='d"+t36+"' onclick='geratabela("+t36+","+m+")'>"+t36+"</td>"
					+"<td></td>"
					+"<td></td>"
					+"<td></td>"
					+"<td></td>"
					+"<td></td>"
					+"<td></td>"
				+"</tr>";}
		else{linha7="";}

	var linha= 	document.getElementById('calendario').innerHTML = "<span id='volta' onclick='trocames(0,0,0,0,0,"+t6+","+t7+","+t8+","+t9+","+t10+","+t11+","+t12+","+t13+","+t14+","+t15+","+t16+","+t17+","+t18+","+t19+","+t20+","+t21+","+t22+","+t23+","+t24+","+t25+","+t26+","+t27+","+t28+","+t29+","+t30+","+t31+","+t32+","+t33+",0,0,"+m+","+mes+")'><</span>"+"<h3>"+mes+"</h3>"+"<span id='avanca'>></span>"
				+"<table id='"+mes+"'>"
					+"<tr id='dias'>"
						+"<td>D</td>"
						+"<td>S</td>"
						+"<td>T</td>"
						+"<td>Q</td>"
						+"<td>Q</td>"
						+"<td>S</td>"
						+"<td>S</td>"
					+"</tr>"
				+"<tr id='l2'>"
					+"<td id='d"+t1+"' onclick='geratabela("+t1+","+m+")'>"+t1+"</td>"
					+"<td id='d"+t2+"' onclick='geratabela("+t2+","+m+")'>"+t2+"</td>"
					+"<td id='d"+t3+"' onclick='geratabela("+t3+","+m+")'>"+t3+"</td>"
					+"<td id='d"+t4+"' onclick='geratabela("+t4+","+m+")'>"+t4+"</td>"
					+"<td id='d"+t5+"' onclick='geratabela("+t5+","+m+")'>"+t5+"</td>"
					+"<td id='d"+t6+"' onclick='geratabela("+t6+","+m+")'>"+t6+"</td>"
					+"<td id='d"+t7+"' onclick='geratabela("+t7+","+m+")'>"+t7+"</td>"
				+"</tr>"
				+"<tr id='l3'>"
					+"<td id='d"+t8+"' onclick='geratabela("+t8+","+m+")'>"+t8+"</td>"
					+"<td id='d"+t9+"' onclick='geratabela("+t9+","+m+")'>"+t9+"</td>"
					+"<td id='d"+t10+"' onclick='geratabela("+t10+","+m+")'>"+t10+"</td>"
					+"<td id='d"+t11+"' onclick='geratabela("+t11+","+m+")'>"+t11+"</td>"
					+"<td id='d"+t12+"' onclick='geratabela("+t12+","+m+")'>"+t12+"</td>"
					+"<td id='d"+t13+"' onclick='geratabela("+t13+","+m+")'>"+t13+"</td>"
					+"<td id='d"+t14+"' onclick='geratabela("+t14+","+m+")'>"+t14+"</td>"
				+"</tr>"
				+"<tr id='l4'>"
					+"<td id='d"+t5+"' onclick='geratabela("+t15+","+m+")'>"+t15+"</td>"
					+"<td id='d"+t6+"' onclick='geratabela("+t16+","+m+")'>"+t16+"</td>"
					+"<td id='d"+t17+"' onclick='geratabela("+t17+","+m+")'>"+t17+"</td>"
					+"<td id='d"+t18+"' onclick='geratabela("+t18+","+m+")'>"+t18+"</td>"
					+"<td id='d"+t19+"' onclick='geratabela("+t19+","+m+")'>"+t19+"</td>"
					+"<td id='d"+t20+"' onclick='geratabela("+t20+","+m+")'>"+t20+"</td>"
					+"<td id='d"+t21+"' onclick='geratabela("+t21+","+m+")'>"+t21+"</td>"
				+"</tr>"
				+"<tr id='l5'>"
					+"<td id='d"+t22+"' onclick='geratabela("+t22+","+m+")'>"+t22+"</td>"
					+"<td id='d"+t23+"' onclick='geratabela("+t23+","+m+")'>"+t23+"</td>"
					+"<td id='d"+t24+"' onclick='geratabela("+t24+","+m+")'>"+t24+"</td>"
					+"<td id='d"+t25+"' onclick='geratabela("+t25+","+m+")'>"+t25+"</td>"
					+"<td id='d"+t26+"' onclick='geratabela("+t26+","+m+")'>"+t26+"</td>"
					+"<td id='d"+t27+"' onclick='geratabela("+t27+","+m+")'>"+t27+"</td>"
					+"<td id='d"+t28+"' onclick='geratabela("+t28+","+m+")'>"+t28+"</td>"
				+"</tr>"
				+"<tr id='l6'>"
					+"<td id='d"+t29+"' onclick='geratabela("+t29+","+m+")'>"+t29+"</td>"
					+"<td id='d"+t30+"' onclick='geratabela("+t30+","+m+")'>"+t30+"</td>"
					+"<td id='d"+t31+"' onclick='geratabela("+t31+","+m+")'>"+t31+"</td>"
					+"<td id='d"+t32+"' onclick='geratabela("+t32+","+m+")'>"+t32+"</td>"
					+"<td id='d"+t33+"' onclick='geratabela("+t33+","+m+")'>"+t33+"</td>"
					+"<td id='d"+t34+"' onclick='geratabela("+t34+","+m+")'>"+t34+"</td>"
					+"<td id='d"+t35+"' onclick='geratabela("+t35+","+m+")'>"+t35+"</td>"
				+"</tr>"+linha7;
				//template string VER
		}

	function geracalendario(m){
		if(m==1){
			parmes("", "", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, "", "", m, "Janeiro");
		}
		if(m==2){
			parmes('', '', '', '', '', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, '', '', m, 'Fevereiro');
		}
		if(m==3){
			parmes("", "","","","", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, m, "Março", 31);	
		}				
		if(m==4){
			parmes( "", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, "", "", "", "", m,"Abril");
		}
		if(m==5){
			parmes("", "", "", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, "", m, "Maio");
		}
		if(m==6){
			parmes("","","","","","", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, m, "Junho", 30);
		}
		if(m==7){
			parmes("", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30,31,"","","", m, "Julho");
		}
		if(m==8){
			parmes("","","","", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, m, "Agosto");
		}linha7
		if(m==9){
			parmes(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30,"","","","","", m, "Setembro");
		}
		if(m==10){
			parmes("", "", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, "", "","", m, "Outubro");
		}
		if(m==11){
			parmes("","","","","", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, m, "Novembro");
		}
		if(m==12){
			parmes(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30,"","","","","", m, "Dezembro");
		}																			

	}

	function busca(b, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28){
							//8:00
							if(div_r1[1]==b){
								$('#'+div_r1[1]).html(div_r2[1]); //Exibe o resultado na tela

								if(div[2].split("=")!=""){
									var div_r3 = div[2].split("=");
									var div_r4 = div[3].split("=");
									$('#'+div_r3[1]).html(div_r4[1]);
								
								//9:00	
								if(div[4].split("=")!=""){
									var div_r5 = div[4].split("=");
									var div_r6 = div[5].split("=");
									$('#'+div_r5[1]).html(div_r6[1]);
								
								//10:00
								if(div[6].split("=")!=""){
									var div_r7 = div[6].split("=");
									var div_r8 = div[7].split("=");
									$('#'+div_r7[1]).html(div_r8[1]);
								
								//11:00
								if(div[8].split("=")!=""){
									var div_r9 = div[8].split("=");
									var div_r10 = div[9].split("=");
									$('#'+div_r9[1]).html(div_r10[1]);
								
								//12:00
								if(div[10].split("=")!=""){
									var div_r11 = div[10].split("=");
									var div_r12 = div[11].split("=");
									$('#'+div_r11[1]).html(div_r12[1]);
								
								//13:00
								if(div[12].split("=")!=""){
									var div_r13 = div[12].split("=");
									var div_r14 = div[13].split("=");
									$('#'+div_r13[1]).html(div_r14[1]);
								
								//14:00
								if(div[14].split("=")!=""){
									var div_r15 = div[14].split("=");
									var div_r16 = div[15].split("=");
									$('#'+div_r15[1]).html(div_r16[1]);
													
								//15:00
								if(div[16].split("=")!=""){
									var div_r17 = div[16].split("=");
									var div_r18 = div[17].split("=");
									$('#'+div_r17[1]).html(div_r18[1]);
								
								//16:00
								if(div[18].split("=")!=""){
									var div_r19 = div[18].split("=");
									var div_r20 = div[19].split("=");
									$('#'+div_r19[1]).html(div_r20[1]);
								
								//17:00
								if(div[20].split("=")!=""){
									var div_r21 = div[20].split("=");
									var div_r22 = div[21].split("=");
									$('#'+div_r21[1]).html(div_r22[1]);
								
								//18:00
								if(div[22].split("=")!=""){
									var div_r23 = div[22].split("=");
									var div_r24 = div[23].split("=");
									$('#'+div_r23[1]).html(div_r24[1]);
								
								//19:00
								if(div[24].split("=")!=""){
									var div_r25 = div[24].split("=");
									var div_r26 = div[25].split("=");
									$('#'+div_r25[1]).html(div_r26[1]);
								
								//20:00
								if(div[26].split("=")!=""){
									var div_r27 = div[26].split("=");
									var div_r28 = div[27].split("=");
									$('#'+div_r27[1]).html(div_r28[1]);
								
								}}}}}}}}}}}}}																								
							}		
	}			
	
	function geratabela(d, m){
		var mes;
		if(m==1){mes="Janeiro";}
		if(m==2){mes="Fevereiro";}
		if(m==3){mes="Março";}
		if(m==4){mes="Abril";}
		if(m==5){mes="Maio";}
		if(m==6){mes="Junho";}
		if(m==7){mes="Julho";}
		if(m==8){mes="Agosto";}
		if(m==9){mes="Setembro";}
		if(m==10){mes="Outubro";}
		if(m==11){mes="Novembro";}
		if(m==12){mes="Dezembro";}												
		document.getElementById('campo').innerHTML = "<h3> "+d+" de "+mes+"</h3>"
		+"<table id='dia"+d+"'>"
			+"<tr>"
				+"<td class='hora'>8:00</td>"
				+"<td id='8"+d+m+"' class='insere' onclick='marcou(8,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>9:00</td>"
				+"<td id='9"+d+m+"' class='insere' onclick='marcou(9,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>10:00</td>"
				+"<td id='10"+d+m+"' class='insere' onclick='marcou(10,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>11:00</td>"
				+"<td id='11"+d+m+"' class='insere' onclick='marcou(11,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>12:00</td>"
				+"<td id='12"+d+m+"' class='insere' onclick='marcou(12,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>13:00</td>"
				+"<td id='13"+d+m+"' class='insere' onclick='marcou(13,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>14:00</td>"
				+"<td id='14"+d+m+"' class='insere' onclick='marcou(14,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>15:00</td>"
				+"<td id='15"+d+m+"' class='insere' onclick='marcou(15,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>16:00</td>"
				+"<td id='16"+d+m+"' class='insere' onclick='marcou(16,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>17:00</td>"
				+"<td id='17"+d+m+"' onclick='marcou(17,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>18:00</td>"
				+"<td id='18"+d+m+"' onclick='marcou(18,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>19:00</td>"
				+"<td id='19"+d+m+"' onclick='marcou(19,"+d+","+m+")'></td>"
			+"</tr>"
			+"<tr>"
				+"<td class='hora'>20:00</td>"
				+"<td id='20"+d+m+"' onclick='marcou(20,"+d+","+m+")'></td>"
			+"</tr>"
		+"</table>";
	var div_r3 = "",div_r4 = "",div_r5 = "",div_r6 = "",div_r7 = "",div_r8 = "",div_r9 = "",div_r10="",div_r11 = "",div_r12 = "",div_r13 = "",div_r14 = "",div_r15 = "",div_r16 = "",div_r17 = "",div_r18 = "",div_r19 = "",div_r20 = "",div_r21 = "",div_r22 = "",div_r23 ="",div_r24 = "",div_r25 = "",div_r26 = "",div_r27 = "",div_r28 = "";

		$.ajax({
				type    : "GET",            
				async   : true, // Essa linha determina se a requisição vai ser sincrona ou assincrona
				url     : "busca.php?chave=valor&chave2="+m+"&paramd="+d+"", // Essa linha vai ser a URL para qual os dados serão enviados
				success : function(data) { // Essa função vai ser executada após o retorno
					//console.log(data);
						//alert(data);

						var div = data.split("##");
						//alert(div[0]);

						if(div[0].split("=")!=""){
							var div_r1 = div[0].split("=");	//Separa o resultado de posição
							var div_r2 = div[1].split("=");	//Separa o resultado de colaborador

							busca("8"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);

							if(div_r1[1]=="9"+d+m){
							busca("9"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);								
							}

							if(div_r1[1]=="10"+d+m){
							busca("10"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="11"+d+m){
							busca("11"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="12"+d+m){
								busca("12"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="13"+d+m){
							busca("13"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="14"+d+m){
								busca("14"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="15"+d+m){							
								busca("15"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="16"+d+m){
							busca("16"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="17"+d+m){
							busca("17"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="18"+d+m){
							busca("19"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="19"+d+m){
							busca("19"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
							if(div_r1[1]=="20"+d+m){
							busca("20"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
							}
						}
				}
			});

	}

	function marcou(c, d, m){
		if(colaborador==" "){
			alert("Selecione um colaborador primeiro!")
		}
		if(colaborador!=" "){
			mostra = document.getElementById(c+""+d+""+m).innerHTML;
			if (mostra.length>1){
				subtrai(c, d, m);
			}
			else{
				soma(c, d, m);	
			}
		}
	}


			var totalhoraelizabeth = 	<?php echo $total_hora_elizabeth; 	?>;
			var totalhorasonia = 		<?php echo $total_hora_sonia; 	?>;
			var totalhorajulia = 		<?php echo $total_hora_julia; 		?>;

			//ALUGUEL
			var totalaluguelelizabeth = <?php echo $total_aluguel_elizabeth;?>;
			var totalaluguelsonia = 	<?php echo $total_aluguel_sonia; 	?>;
			var totalalugueljulia = 		<?php echo $total_aluguel_julia; 	?>;

			//BARRA UM
			var totalbarraelizabeth = 	<?php echo $total_barra_elizabeth; 	?>;
			var totalbarrasonia = 	<?php echo $total_barra_sonia; 	?>;
			var totalbarrajulia = 		<?php echo $total_barra_julia; 		?>;

			//BARRA DOIS
			var totalbarra2elizabeth = 	<?php echo $total_barra2_elizabeth; ?>;
			var totalbarra2sonia = 	<?php echo $total_barra2_sonia; 	?>;
			var totalbarra2julia = 		<?php echo $total_barra2_julia; 		?>;

			//ATRIBUI À CELULA O VALOR RETORNADO DO BANCO DE DADOS

			//HORA						
			document.getElementById("ctSonia").innerHTML = 	totalhorasonia;
			document.getElementById("ctElizabeth").innerHTML = 	totalhoraelizabeth;
			document.getElementById("ctJulia").innerHTML = 		totalhorajulia;		
			//Aluguel//
			document.getElementById("ctSonia2").innerHTML = 	totalaluguelsonia;
			document.getElementById("ctElizabeth2").innerHTML = 	totalaluguelelizabeth;
			document.getElementById("ctJulia2").innerHTML = 		totalalugueljulia;
			//BARRA//
			var b1 = <?php echo $total_barra_sonia; 	?>;
			var b2 = <?php echo $total_barra2_sonia; 	?>;
			var b3 = <?php echo $total_barra_elizabeth; 	?>;
			var b4 = <?php echo $total_barra2_elizabeth; 	?>;
			var b5 = <?php echo $total_barra_julia; 		?>;
			var b6 = <?php echo $total_barra2_julia; 	?>;

		
			document.getElementsByClassName("barra")[0].style.width = b1 + "px";
			document.getElementsByClassName("barra")[1].style.width = b2 + "px";
			document.getElementsByClassName("barra")[2].style.width = b3 + "px";
			document.getElementsByClassName("barra")[3].style.width = b4 + "px";
			document.getElementsByClassName("barra")[4].style.width = b5 + "px";
			document.getElementsByClassName("barra")[5].style.width = b6 + "px";

	function soma(c, d, m){
		//alert(c+""+d+""+m);
		if(colaborador=="Sonia"){		
		
			document.getElementById('ctSonia').innerHTML = (conta1[0] += 1) + totalhorasonia;
			document.getElementById('ctSonia2').innerHTML = ((conta1[1] += 30) + totalaluguelsonia);

			document.getElementsByClassName('barra')[0].style.width = ((cresce1[0] += 10) + totalbarrasonia)+ "px";
			document.getElementsByClassName('barra')[1].style.width = ((cresce1[1] += 30) + totalbarra2sonia )+ "px";
		}
		if(colaborador=="Elizabeth"){
			document.getElementById('ctElizabeth').innerHTML = (conta2[0] += 1) + totalhoraelizabeth;
			document.getElementById('ctElizabeth2').innerHTML = ((conta2[1] += 30) + totalaluguelelizabeth);

			document.getElementsByClassName('barra')[2].style.width = ((cresce2[0] += 10) + totalbarraelizabeth) + "px";
			document.getElementsByClassName('barra')[3].style.width = ((cresce2[1] += 30) + totalbarra2elizabeth)+ "px";
		}			
		if(colaborador=="Julia"){
			document.getElementById('ctJulia').innerHTML = (conta3[0] += 1) + totalhorajulia;
			document.getElementById('ctJulia2').innerHTML = ((conta3[1] += 30) + totalalugueljulia);

			document.getElementsByClassName('barra')[4].style.width = ((cresce3[0] += 10) + totalbarrajulia) + "px";
			document.getElementsByClassName('barra')[5].style.width = ((cresce3[1] += 30) + totalbarra2julia) + "px";
		}

		var idhora = c.toString() + d.toString();
		var strhora = parseInt(idhora);

		document.getElementById(c+""+d+""+m).innerHTML = colaborador
		+"<input type='hidden' name='posicao["+c+d+m+"]'	class='"+c+"'	value='"+c+d+m+"'	/>"
		+"<input type='hidden' name='usuario["+c+d+m+"]'	class='"+c+"'	value='"+colaborador+"'	/>"
		+"<input type='hidden' name='dia["+c+d+m+"]'	class='"+c+"'	value='"+d+"'	/>"
		+"<input type='hidden' name='mes["+c+d+m+"]'	class='"+c+"'	value='"+m+"'	/>";
	}

	</script>
	</body>
</html>