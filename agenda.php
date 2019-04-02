<?php
session_start();
include('verifica.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agenda - Studio Harmonia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo2.css">
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

$dia = 0;
$ds_dia = 'Agenda de Cristiano';
$mes = null;
$ano = 2019;
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

	<script type="text/javascript" src="../index/jquery-3.3.1.min.js">
	</script>
	<script type="text/javascript" src="java.js">


<?php 
		echo "<pre>Antes do if";
		print_r($_POST);
		echo "</pre>"; 
	if (!empty($_POST["posicao"])){
		$id_dia = $_POST["dia"];
		$barra = 1;
		$barra2 = 3;
		$hora = 1;
		$aluguel = 30;
		$posicao  = $_POST["posicao"];
		$mes = $_POST["mes"][$posicao];
		$id_hora = $_POST["hora"][$posicao];
		

		$result = mysqli_query($link,"Select max(id_agenda) + 1 from agenda2");
		$id_agenda = $result->fetch_array(MYSQLI_NUM);
		$id_agenda = $id_agenda[0] ;
		if (empty($id_agenda)){
			$id_agenda = 1;
		}

		foreach ($posicao as $key => $value) {

			$usuario_fim = $_POST["usuario"][$key];
			$dia_insere = $_POST["dia"][$key];
			$mes_insere = $_POST["mes"][$key];
			$hora_insere = $_POST["hora"][$key];

			$del =	"delete from agenda2 where posicao = ".$value." ";
			mysqli_query($link,$del);
			//Mostra na inspenção do navegador
			echo "<br/><br/>dentro do insert ".$del."<br/><br/>";


			$execute =

			"insert into agenda2 	(id_agenda,		posicao,	hora,	aluguel,	barra,	barra2,		id_dia,			id_mes, 		id_ano,		colaborador,	dthr_criacao, id_hora)
			values 					($id_agenda, 	$value,		$hora,	$aluguel,	$barra,	$barra2, 	$dia_insere,	$mes_insere,	$ano,	'$usuario_fim',		'$dthr_cria', $hora_insere)"; 
			mysqli_query($link,$execute);

			$id_agenda = $id_agenda + 1;
			# code...

		}

		
	}
?>
	</script>
	 
</head>
<body onload="geracalendario(4)">
<?php/* echo $execute; */?>

	<article id="agenda">
	<form action="agenda.php" name='agenda' url method="post">
		<div class="delimitador">
			<img src="imagens/Colorido/Logo-colorido-03.png">
			<div id="menu">
				<p><?php echo $_SESSION['usuario']; ?></p>
				<a href="logout.php">Logout</a>
			</div>
			<h1>Consultório<span>r</span></h1>
			<br>
			<br>
			<div id="colaborador">
				<h3>Colaboradores:</h3>

				<br>
				<br>
				<table>
					<tr>
						<td id="t1" class='t' onclick="trocar('t1')">Elizabeth</td>
					</tr>
					<tr>
						<td id="t2" class='t' onclick="trocar('t2')">Sonia</td>
					</tr>
					<tr>
						<td id="t3" class='t' onclick="trocar('t3')">Cristina</td>
					</tr>
					<tr>
						<td id="t5" class='t' onclick="trocar('t5')">Camila</td>
					</tr>
					<tr>
						<td id="t5" class='t' onclick="trocar('t6')">Kelly</td>
					</tr>
					<tr>
						<td id="t5" class='t' onclick="trocar('t7')">Claudia</td>
					</tr>														
					<tr>
						<td id="t4" class='t' onclick="trocar('t4')">Apagar</td>
					</tr>
				</table>
			</div>			
			<div id="calendario"></div>
			<div id="campo"></div>
			<br/>
			<input id="bottom" type="submit" style="margin-bottom: 20px">
			<br>


		</div>	
	</form>
	</article>
	<script type="text/javascript">
		
	var div_r3 = "",div_r4 = "",div_r5 = "",div_r6 = "",div_r7 = "",div_r8 = "",div_r9 = "",div_r10="",div_r11 = "",div_r12 = "",div_r13 = "",div_r14 = "",div_r15 = "",div_r16 = "",div_r17 = "",div_r18 = "",div_r19 = "",div_r20 = "",div_r21 = "",div_r22 = "",div_r23 ="",div_r24 = "",div_r25 = "",div_r26 = "",div_r27 = "",div_r28 = "";

	function parmes(t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, t31, t32, t33, t34, t35, m, mes, t36){		
		
		var col = [];
		for(i=0; i<=5; i++){col[i]="<td></td>";}
		
		if((m==6)||(m==3)){
			linha7 = "<tr id='l7'><td id='d"+t36+"' class='cd' onclick='geratabela("+t36+","+m+")'>"+t36+"</td>"+col.join("")+"</tr>";}
		else{linha7="";}

		var mint=parseInt(m);
		
		if((m==1)||(m==10)){
			var diaum = t3,segunda = diaum+6,terca = diaum,quarta = diaum+1,quinta = diaum+2,sexta = diaum+3,sabado = diaum+4,domingo = diaum+5;}		
		if((m==2)||(m==3)||(m==11)){
			var diaum = t6,segunda = diaum+3,terca = diaum+4,quarta = diaum+5,quinta = diaum+6,sexta = diaum,sabado = diaum+1,domingo = diaum+2;			
		}
		if((m==4)||(m==7)){
			var diaum = t2,segunda = diaum,terca = diaum+1,quarta = diaum+2,quinta = diaum+3,sexta = diaum+4,sabado = diaum+5,domingo = diaum+6;
		}
		if(m==5){
			var diaum = t4,segunda = diaum+5,terca = diaum+6,quarta = diaum,quinta = diaum+1,sexta = diaum+2,sabado = diaum+3,domingo = diaum+4;
		}
		if(m==6){
			var diaum = t7,segunda = diaum+2,terca = diaum+3,quarta = diaum+4,quinta = diaum+5,sexta = diaum+6,sabado = diaum,domingo = diaum+1;
		}
		if(m==8){
			var	diaum = t5,segunda = diaum+4,terca = diaum+5,quarta = diaum+6,quinta = diaum,sexta = diaum+1,sabado = diaum+2,domingo = diaum+3;
		}
		if((m==9)||(m==12)){
			var	diaum = t1,segunda = diaum+1,terca = diaum+2,quarta = diaum+3,quinta = diaum+4,sexta = diaum+5,sabado = diaum+6,domingo = diaum;
		}

		var dias = ["D", "S", "T", "Q", "Q", "S", "S"];
		var par_dia = [domingo, segunda, terca, quarta, quinta, sexta, sabado];
		var t_arr = [t1,t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, t31, t32, t33, t34, t35];

		
		var colunas = [];
		for(i=0; i<=6; i++){colunas[i] = "<td onclick='geratabelasemanal("+par_dia[i]+","+m+")'>"+dias[i]+"</td>";}
		var colunas2 = [];
		for(i=0; i<=6; i++){colunas2[i] = "<td id='d"+t_arr[i]+"' class='cd' onclick='geratabela("+t_arr[i]+","+m+")'>"+t_arr[i]+"</td>";}
		var colunas3 = [];
		for(i=0; i<=6; i++){colunas3[i] = "<td id='d"+t_arr[i+7]+"' class='cd' onclick='geratabela("+t_arr[i+7]+","+m+")'>"+t_arr[i+7]+"</td>";}
		var colunas4 = [];
		for(i=0; i<=6; i++){colunas4[i] = "<td id='d"+t_arr[i+14]+"' class='cd' onclick='geratabela("+t_arr[i+14]+","+m+")'>"+t_arr[i+14]+"</td>";}
		var colunas5 = [];
		for(i=0; i<=6; i++){colunas5[i] = "<td id='d"+t_arr[i+21]+"' class='cd' onclick='geratabela("+t_arr[i+21]+","+m+")'>"+t_arr[i+21]+"</td>";}
		var colunas6 = [];
		for(i=0; i<=6; i++){colunas6[i] = "<td id='d"+t_arr[i+28]+"' class='cd' onclick='geratabela("+t_arr[i+28]+","+m+")'>"+t_arr[i+28]+"</td>";}		

		var linha= 	document.getElementById('calendario').innerHTML = "<span id='volta' class='troca' onclick='geracalendario("+(mint-1)+")'><</span>"+"<h3>"+mes+"</h3>"+"<span id='avanca' class='troca' onclick='geracalendario("+(mint+1)+")'>></span>"
				+"<table id='"+mes+"' class='col-1'>"
					+"<tr id='dias'>"+colunas.join("")+"</tr>"
					+"<tr id='l2'>"+colunas2.join("")+"</tr>"
					+"<tr id='l3'>"+colunas3.join("")+"</tr>"
					+"<tr id='l4'>"+colunas4.join("")+"</tr>"
					+"<tr id='l5'>"+colunas5.join("")+"</tr>"
					+"<tr id='l6'>"+colunas6.join("")+"</tr>"+linha7;
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
		$.ajax({
				type    : "GET",            
				async   : true, // Essa linha determina se a requisição vai ser sincrona ou assincrona
				url     : "buscadia.php?chave=valor&mes="+m+"", // Essa linha vai ser a URL para qual os dados serão enviados
				success : function(data) { // Essa função vai ser executada após o retorno
					//alert(data)
					var quebra = data.split("##");

					if(quebra[1].split("=")!=""){
						var dado_dia1 = quebra[1].split("=");
						document.getElementById("d"+dado_dia1[1]).innerHTML = dado_dia1[1]+"<div class='tem'></div>";						
					}
					if(quebra[3].split("=")!=""){
						var dado_dia2 = quebra[3].split("=");
						document.getElementById("d"+dado_dia2[1]).innerHTML = dado_dia2[1]+"<div class='tem'></div>";
					}

					if(quebra[5].split("=")!=""){
						var dado_dia3 = quebra[5].split("=");
						document.getElementById("d"+dado_dia3[1]).innerHTML = dado_dia3[1]+"<div class='tem'></div>";						
					}

					if(quebra[7].split("=")!=""){
						var dado_dia4 = quebra[7].split("=");
						document.getElementById("d"+dado_dia4[1]).innerHTML = dado_dia4[1]+"<div class='tem'></div>";						
					}

					if(quebra[9].split("=")!=""){
						var dado_dia5 = quebra[9].split("=");
						document.getElementById("d"+dado_dia5[1]).innerHTML = dado_dia5[1]+"<div class='tem'></div>";						
					}

					if(quebra[11].split("=")!=""){
						var dado_dia6 = quebra[11].split("=");
						document.getElementById("d"+dado_dia6[1]).innerHTML = dado_dia6[1]+"<div class='tem'></div>";						
					}

					if(quebra[13].split("=")!=""){
						var dado_dia7 = quebra[13].split("=");
						document.getElementById("d"+dado_dia7[1]).innerHTML = dado_dia7[1]+"<div class='tem'></div>";						
					}
					if(quebra[15].split("=")!=""){
						var dado_dia8 = quebra[15].split("=");
						document.getElementById("d"+dado_dia8[1]).innerHTML = dado_dia8[1]+"<div class='tem'></div>";						
					}
					if(quebra[17].split("=")!=""){
						var dado_dia9 = quebra[17].split("=");
						document.getElementById("d"+dado_dia9[1]).innerHTML = dado_dia9[1]+"<div class='tem'></div>";						
					}
					if(quebra[19].split("=")!=""){
						var dado_dia10 = quebra[19].split("=");
						document.getElementById("d"+dado_dia10[1]).innerHTML = dado_dia10[1]+"<div class='tem'></div>";						
					}
					if(quebra[21].split("=")!=""){
						var dado_dia11 = quebra[21].split("=");
						document.getElementById("d"+dado_dia11[1]).innerHTML = dado_dia11[1]+"<div class='tem'></div>";						
					}
					if(quebra[23].split("=")!=""){
						var dado_dia12 = quebra[23].split("=");
						document.getElementById("d"+dado_dia12[1]).innerHTML = dado_dia12[1]+"<div class='tem'></div>";						
					}
					if(quebra[25].split("=")!=""){
						var dado_dia13 = quebra[25].split("=");
						document.getElementById("d"+dado_dia13[1]).innerHTML = dado_dia13[1]+"<div class='tem'></div>";						
					}
					if(quebra[27].split("=")!=""){
						var dado_dia14 = quebra[27].split("=");
						document.getElementById("d"+dado_dia14[1]).innerHTML = dado_dia14[1]+"<div class='tem'></div>";						
					}
					if(quebra[29].split("=")!=""){
						var dado_dia15 = quebra[29].split("=");
						document.getElementById("d"+dado_dia15[1]).innerHTML = dado_dia15[1]+"<div class='tem'></div>";						
					}
					if(quebra[31].split("=")!=""){
						var dado_dia16 = quebra[31].split("=");
						document.getElementById("d"+dado_dia16[1]).innerHTML = dado_dia16[1]+"<div class='tem'></div>";						
					}
					if(quebra[33].split("=")!=""){
						var dado_dia17 = quebra[33].split("=");
						document.getElementById("d"+dado_dia17[1]).innerHTML = dado_dia17[1]+"<div class='tem'></div>";						
					}
					if(quebra[35].split("=")!=""){
						var dado_dia18 = quebra[35].split("=");
						document.getElementById("d"+dado_dia18[1]).innerHTML = dado_dia18[1]+"<div class='tem'></div>";						
					}
					if(quebra[37].split("=")!=""){
						var dado_dia19 = quebra[37].split("=");
						document.getElementById("d"+dado_dia19[1]).innerHTML = dado_dia19[1]+"<div class='tem'></div>";						
					}
					if(quebra[39].split("=")!=""){
						var dado_dia20 = quebra[39].split("=");
						document.getElementById("d"+dado_dia20[1]).innerHTML = dado_dia20[1]+"<div class='tem'></div>";						
					}
					if(quebra[41].split("=")!=""){
						var dado_dia21 = quebra[41].split("=");
						document.getElementById("d"+dado_dia21[1]).innerHTML = dado_dia21[1]+"<div class='tem'></div>";						
					}
					if(quebra[43].split("=")!=""){
						var dado_dia22 = quebra[43].split("=");
						document.getElementById("d"+dado_dia22[1]).innerHTML = dado_dia22[1]+"<div class='tem'></div>";						
					}
					if(quebra[45].split("=")!=""){
						var dado_dia23 = quebra[45].split("=");
						document.getElementById("d"+dado_dia23[1]).innerHTML = dado_dia23[1]+"<div class='tem'></div>";						
					}
					if(quebra[47].split("=")!=""){
						var dado_dia24 = quebra[47].split("=");
						document.getElementById("d"+dado_dia24[1]).innerHTML = dado_dia24[1]+"<div class='tem'></div>";						
					}
					if(quebra[49].split("=")!=""){
						var dado_dia25 = quebra[49].split("=");
						document.getElementById("d"+dado_dia25[1]).innerHTML = dado_dia25[1]+"<div class='tem'></div>";						
					}
					if(quebra[51].split("=")!=""){
						var dado_dia25 = quebra[51].split("=");
						document.getElementById("d"+dado_dia25[1]).innerHTML = dado_dia25[1]+"<div class='tem'></div>";						
					}
					if(quebra[53].split("=")!=""){
						var dado_dia26 = quebra[53].split("=");
						document.getElementById("d"+dado_dia26[1]).innerHTML = dado_dia26[1]+"<div class='tem'></div>";						
					}
					if(quebra[55].split("=")!=""){
						var dado_dia27 = quebra[55].split("=");
						document.getElementById("d"+dado_dia27[1]).innerHTML = dado_dia27[1]+"<div class='tem'></div>";						
					}
					if(quebra[57].split("=")!=""){
						var dado_dia28 = quebra[57].split("=");
						document.getElementById("d"+dado_dia28[1]).innerHTML = dado_dia28[1]+"<div class='tem'></div>";						
					}
					if(quebra[59].split("=")!=""){
						var dado_dia29 = quebra[59].split("=");
						document.getElementById("d"+dado_dia29[1]).innerHTML = dado_dia29[1]+"<div class='tem'></div>";						
					}
					if(quebra[61].split("=")!=""){
						var dado_dia30 = quebra[61].split("=");
						document.getElementById("d"+dado_dia30[1]).innerHTML = dado_dia30[1]+"<div class='tem'></div>";						
					}
					if(quebra[63].split("=")!=""){
						var dado_dia31 = quebra[63].split("=");
						document.getElementById("d"+dado_dia31[1]).innerHTML = dado_dia31[1]+"<div class='tem'></div>";						
					}
				}
		});																					

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

	var mes_arr = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
	var horas = ["8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00"]
	var linhas = [];


	function geratabelasemanal(d, m, cd){
		var x = document.getElementsByClassName("cd");
		var i;
		for (i = 0; i < x.length; i++) { x[i].style.backgroundColor = "white"; }
		var dint = parseInt(d);
		var mes;

		if((m==1)||(m==3)||(m==5)||(m==7)||(m==8)){
			document.getElementById('d29').style.backgroundColor = "white";
			document.getElementById('d30').style.backgroundColor = "white";			
			document.getElementById('d31').style.backgroundColor = "white";
			if(dint<4){
				var ultimasemana = ", "+(dint+21)+" e "+(dint+28);
				document.getElementById('d29').style.backgroundColor = "white";
				document.getElementById('d30').style.backgroundColor = "white";				
				document.getElementById('d31').style.backgroundColor = "white";				
				document.getElementById('d'+(dint+28)).style.backgroundColor = "#FAD488";
			}
			else{
				var ultimasemana = " e "+(dint+21);
				document.getElementById('d29').style.backgroundColor = "white";
				document.getElementById('d30').style.backgroundColor = "white";				
				document.getElementById('d31').style.backgroundColor = "white";
			}
		};

		if((m==4)||(m==6)||(m==9)||(m==10)||(m==11)||(m==12)){
			document.getElementById('d29').style.backgroundColor = "white";
			document.getElementById('d30').style.backgroundColor = "white";

			if(dint<3){
				var ultimasemana = ", "+(dint+21)+" e "+(dint+28);
				document.getElementById('d29').style.backgroundColor = "white";
				document.getElementById('d'+(dint+28)).style.backgroundColor = "#FAD488";
			}
			else{
				var ultimasemana = " e "+(dint+21);
				document.getElementById('d29').style.backgroundColor = "white";
				document.getElementById('d30').style.backgroundColor = "white";
			}

		}		

		document.getElementById('d'+d).style.backgroundColor = "#FAD488";
		document.getElementById('d'+(dint+7)).style.backgroundColor = "#FAD488";
		document.getElementById('d'+(dint+14)).style.backgroundColor = "#FAD488";
		document.getElementById('d'+(dint+21)).style.backgroundColor = "#FAD488";

		var mes;
		for(i=0;i<=11; i++){
			
			if(m==(i+1)){
				mes=mes_arr[i];
				if(m==2){var ultimasemana = " e "+(dint+21);}
			}
		}

		for(i=0; i<=12; i++){linhas[i]="<tr><td class='hora'>"+horas[i]+"</td><td id='"+(i+8)+d+m+"' class='insere' onclick='marcousemana("+(i+8)+","+d+","+m+")'></td></tr>";}


		document.getElementById('campo').innerHTML = "<h3> "+d+", "+(dint+7)+", "+(dint+14)+ultimasemana+" de "+mes+"</h3><table id='dia"+d+"'>"+linhas.join("")+"</table>";

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
							busca("18"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
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

	
	function geratabela(d, m, cd){
		var x = document.getElementsByClassName("cd");
		var i;
		for (i = 0; i < x.length; i++) { x[i].style.backgroundColor = "white"; }
		if(mes=='Abril'||mes=='Junho'||mes=='Setembro'||mes=='Outubro'||mes=='Novembro'||mes=='Dezembro'){
			document.getElementById('d29').style.backgroundColor = "white";
			document.getElementById('d30').style.backgroundColor = "white";
		}
		if(mes=='Janeiro'||mes=='Março'||mes=='Maio'||mes=='Julho'||mes=='Agosto'){
			document.getElementById('d29').style.backgroundColor = "white";
			document.getElementById('d30').style.backgroundColor = "white";			
			document.getElementById('d31').style.backgroundColor = "white";

		}
		document.getElementById('d'+d).style.backgroundColor = "#FAD488";

		var mes;
		for(i=0;i<=11; i++){if(m==(i+1)){mes=mes_arr[i];}}

		for(i=0; i<=12; i++){linhas[i]="<tr><td class='hora'>"+horas[i]+"</td><td id='"+(i+8)+d+m+"' class='insere' onclick='marcou("+(i+8)+","+d+","+m+")'></td></tr>";}
		document.getElementById('campo').innerHTML = "<h3> "+d+" de "+mes+"</h3>"+"<table id='dia"+d+"'>"+linhas.join("")+"</table>";


		$.ajax({
				type    : "GET",            
				async   : true, // Essa linha determina se a requisição vai ser sincrona ou assincrona
				url     : "busca.php?chave=valor&chave2="+m+"&paramd="+d+"", // Essa linha vai ser a URL para qual os dados serão enviados
				success : function(data) { // Essa função vai ser executada após o retorno
					//console.log(data);
						//alert(data);

						var div = data.split("##");

						if(div[0].split("=")!=""){
							var div_r1 = div[0].split("=");	//Separa o resultado de posição
							var div_r2 = div[1].split("=");	//Separa o resultado de colaborador
								//alert(div_r1[1]);
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
							busca("18"+d+m, div, div_r1, div_r2, div_r3, div_r4, div_r5, div_r6, div_r7, div_r8, div_r9, div_r10, div_r11, div_r12, div_r13, div_r15, div_r16, div_r17, div_r18, div_r19, div_r20, div_r21, div_r22, div_r23, div_r24, div_r25, div_r26, div_r27, div_r28);
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
		mostra = document.getElementById(c+""+d+""+m).innerHTML;
		if(colaborador==" "){
			alert("Selecione um colaborador primeiro!")
		}
		if(colaborador!=" "){
			if(mostra.substring(3, 0)=="<in"){
				soma(c, d, m);
			}
			else{
				soma(c, d, m);	
			}
		}
		if(colaborador=="Apagar"){
			if (mostra.length>1){
				subtrai(c, d, m);
			}
			if(mostra.substring(3, 0)=="<in"){
				subtrai(c, d, m);
			}						
		}
	}

	function marcousemana(c, d, m){
		mostra = document.getElementById(c+""+d+""+m).innerHTML;		
		if(colaborador==" "){
			alert("Selecione um colaborador primeiro!")
		}
		if(colaborador!=" "){
			if(mostra.substring(3, 0)=="<in"){
				somasemana(c, d, m);
			}
			else{
				somasemana(c, d, m);
			}
		}
		if(colaborador=="Apagar"){
			if (mostra.length>2){
				subtraisemana(c, d, m);
			}
			if(mostra.substring(3, 0)=="<in"){
				subtraisemana(c, d, m);
			}			
		}		
	}

	function soma(c, d, m){
		var idhora = c.toString() + d.toString(), strhora = parseInt(idhora);
		var nomes = ["posicao["+c+d+m+"]", "usuario["+c+d+m+"]","dia["+c+d+m+"]", "mes["+c+d+m+"]","hora["+c+d+m+"]"];
		var valores = [c+""+d+""+m, colaborador, d, m, c];
		var inp = [];
		for(i=0; i<=4; i++){inp[i]="<input type='hidden' name="+nomes[i]+"	class='"+c+"'	value='"+valores[i]+"' />";}
		document.getElementById(c+""+d+""+m).innerHTML = colaborador+inp.join("");

	}

	function somasemana(c, d, m){
			if(m==2){
				var semana5 = ""
			}
			/*SEMANA 5*/
		if((m==1)||(m==3)||(m==5)||(m==7)||(m==8)){
			if(d<4){
				var semana5 =
					"<input type='hidden' name='posicao["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+""+(d+28)+""+m+"'	/>"
					+"<input type='hidden' name='usuario["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+colaborador+"'	/>"
					+"<input type='hidden' name='dia["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+(d+28)+"'	/>"
					+"<input type='hidden' name='mes["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+m+"'	/>"
					+"<input type='hidden' name='hora["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+"'	/>";
			}
			else{
				var semana5 = "";
			};
		}
		if((m==4)||(m==6)||(m==9)||(m==10)||(m==11)||(m==12)){
			if(d<3){
				var semana5 =
					"<input type='hidden' name='posicao["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+""+(d+28)+""+m+"'	/>"
					+"<input type='hidden' name='usuario["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+colaborador+"'	/>"
					+"<input type='hidden' name='dia["+c+""+(d+28)+""+m+"]'		class='"+c+"'	value='"+(d+28)+"'	/>"
					+"<input type='hidden' name='mes["+c+""+(d+28)+""+m+"]'		class='"+c+"'	value='"+m+"'	/>"
					+"<input type='hidden' name='hora["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+"'	/>";
			}
			else{
				var semana5 = "";
			}
		}			

		var idhora = c.toString() + d.toString();
		var strhora = parseInt(idhora);

		var nomes = [
		"posicao["+c+""+d+""+m+"]", 	"usuario["+c+""+d+""+m+"]",		"dia["+c+""+d+""+m+"]", 	"mes["+c+""+d+""+m+"]", 		"hora["+c+""+d+""+m+"]",
		"posicao["+c+""+(d+7)+""+m+"]",	"usuario["+c+""+(d+7)+""+m+"]",	"dia["+c+""+(d+7)+""+m+"]", "mes["+c+""+(d+7)+""+m+"]",		"hora["+c+""+(d+7)+""+m+"]",
		"posicao["+c+""+(d+14)+""+m+"]","usuario["+c+""+(d+14)+""+m+"]","dia["+c+""+(d+14)+""+m+"]", "mes["+c+""+(d+14)+""+m+"]", 	"hora["+c+""+(d+14)+""+m+"]",
		"posicao["+c+""+(d+21)+""+m+"]","usuario["+c+""+(d+21)+""+m+"]","dia["+c+""+(d+21)+""+m+"]", "mes["+c+""+(d+21)+""+m+"]", 	"hora["+c+""+(d+21)+""+m+"]"];

		var valores = [
		c+""+d+""+m, 		colaborador,	d, 		m, c,
		c+""+(d+7)+""+m, 	colaborador,	(d+7), 	m, c,
		c+""+(d+14)+""+m, 	colaborador,	(d+14), m, c,
		c+""+(d+21)+""+m, 	colaborador,	(d+21), m, c
		];
		
		var inp = [];
		for(i=0; i<=19; i++){inp[i]="<input type='hidden' name="+nomes[i]+"	class='"+c+"'	value='"+valores[i]+"' />";}

		document.getElementById(c+""+d+""+m).innerHTML = colaborador+inp.join("")+semana5;
	}	

	function subtrai(c, d, m){
		var str = document.getElementById(c+""+d+""+m).innerHTML;
		document.getElementById(c+""+d+""+m).innerHTML = ""
		+"<input type='hidden' name='posicao["+c+""+d+""+m+"]'	class='"+c+"'	value='"+c+""+d+""+m+"'	/>";
//
		}

	function subtraisemana(c, d, m){
			if(m==2){
				var semana5 = ""
			}
			/*SEMANA 5*/
		if((m==1)||(m==3)||(m==5)||(m==7)||(m==8)){
			if(d<4){
				var semana5 =
					"<input type='hidden' name='posicao["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+""+(d+28)+""+m+"'	/>";
			}
			else{
				var semana5 = "";
			};
		}
		if((m==4)||(m==6)||(m==9)||(m==10)||(m==11)||(m==12)){
			if(d<3){
				var semana5 =
					"<input type='hidden' name='posicao["+c+""+(d+28)+""+m+"]'	class='"+c+"'	value='"+c+""+(d+28)+""+m+"'	/>";
			}
			else{
				var semana5 = "";
			}
		}			

		var idhora = c.toString() + d.toString();
		var strhora = parseInt(idhora);
		var nomes = ["posicao["+c+""+d+""+m+"]","posicao["+c+""+(d+7)+""+m+"]", "posicao["+c+""+(d+14)+""+m+"]","posicao["+c+""+(d+21)+""+m+"]"];

		var valores = [c+""+d+""+m, c+""+(d+7)+""+m, c+""+(d+14)+""+m, c+""+(d+21)+""+m];
		var inp = [];
		for(i=0; i<=3; i++){inp[i]="<input type='hidden' name="+nomes[i]+"	class='"+c+"'	value='"+valores[i]+"' />";}
		
		document.getElementById(c+""+d+""+m).innerHTML = inp.join("")+semana5;
	}		

	</script>
	</body>
</html>