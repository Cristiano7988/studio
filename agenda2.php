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
<?php echo $execute; ?>
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
					<p>Carga Horária: <span id="ctSonia"></span>&nbsp hora(s)</p><hr id="b1" class="barra">
					<p>Aluguel da sala: R$ <span id="ctSonia2"></span>,00</p><hr id="b2" class="barra">
					<br><br>

					<h3>Elizabeth</h3>
					<p>Carga Horária: <span id="ctElizabeth"></span>&nbsp hora(s)</p><hr id="b3" class="barra">
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


	function geracalendario(m){
		if(m==1){
			var mes="Janeiro";
			document.getElementById('calendario').innerHTML = "<h3>"+mes+"</h3><table id='mes"+mes+"'>	<tr id='dias'>	<td>D</td>	<td>S</td>	<td>T</td>	<td>Q</td>	<td>Q</td>	<td>S</td>	<td>S</td>	</tr>	<tr id='l2'>	<td id='c8'></td>	<td id='c9'></td>	<td id='c10' onclick='geratabela(1,"+m+")'>1</td>	<td id='c11' onclick='geratabela(2,"+m+")'>2</td>	<td id='c12' onclick='geratabela(3,"+m+")'>3</td>	<td id='c13' onclick='geratabela(4,"+m+")'>4</td>	<td id='c14' onclick='geratabela(5,"+m+")'>5</td>	</tr>	<tr id='l3'>	<td id='c15' onclick='geratabela(6,"+m+")'>6</td>	<td id='c16' onclick='geratabela(7,"+m+")'>7</td>	<td id='c17' onclick='geratabela(8,"+m+")'>8</td>	<td id='c18' onclick='geratabela(9,"+m+")'>9</td>	<td id='c19' onclick='geratabela(10,"+m+")'>10</td>	<td id='c20' onclick='geratabela(11,"+m+")'>11</td>	<td id='c21' onclick='geratabela(12,"+m+")'>12</td>	</tr>	<tr id='l4'>	<td id='c22' onclick='geratabela(13,"+m+")'>13</td>	<td id='c23' onclick='geratabela(14,"+m+")'>14</td>	<td id='c24' onclick='geratabela(15,"+m+")'>15</td>	<td id='c25' onclick='geratabela(16,"+m+")'>16</td>	<td id='c26' onclick='geratabela(17,"+m+")'>17</td>	<td id='c27' onclick='geratabela(18,"+m+")'>18</td>	<td id='c28' onclick='geratabela(19,"+m+")'>19</td>	</tr>	<tr id='l5'>	<td id='c29' onclick='geratabela(20,"+m+")'>20</td>	<td id='c30' onclick='geratabela(21,"+m+")'>21</td>	<td id='c31' onclick='geratabela(22,"+m+")'>22</td>	<td id='c32' onclick='geratabela(23,"+m+")'>23</td>	<td id='c33' onclick='geratabela(24,"+m+")'>24</td>	<td id='c34' onclick='geratabela(25,"+m+")'>25</td>	<td id='c35' onclick='geratabela(26,"+m+")'>26</td>	</tr>	<tr id='l6'>	<td id='c36' onclick='geratabela(27,"+m+")'>27</td>	<td id='c37' onclick='geratabela(28,"+m+")'>28</td>	<td id='c38' onclick='geratabela(29,"+m+")'>29</td>	<td id='c39' onclick='geratabela(30,"+m+")'>30</td>	<td id='c40' onclick='geratabela(31,"+m+")'>31</td>	<td id='c41' onclick='geratabela(32,"+m+")'></td>	<td id='c42' onclick='geratabela(33,"+m+")'>	</td></tr>	</table>";
		}
		if(m==2){
			var mes="Fevereiro";
			document.getElementById('calendario').innerHTML = "<h3>"+mes+"</h3><table id='mes"+mes+"'>	<tr id='dias'>	<td>D</td>	<td>S</td>	<td>T</td>	<td>Q</td>	<td>Q</td>	<td>S</td>	<td>S</td>	</tr>	<tr id='l2'>	<td id='c8'></td>	<td id='c9'></td>	<td id='c10'></td>	<td id='c11'></td>	<td id='c12'></td>	<td id='c13' onclick='geratabela(1,"+m+")'>1</td>	<td id='c14' onclick='geratabela(2,"+m+")'>2</td>	</tr>	<tr id='l3'>	<td id='c15' onclick='geratabela(3,"+m+")'>3</td>	<td id='c16' onclick='geratabela(4,"+m+")'>4</td>	<td id='c17' onclick='geratabela(5,"+m+")'>5</td>	<td id='c18' onclick='geratabela(6,"+m+")'>6</td>	<td id='c19' onclick='geratabela(7,"+m+")'>7</td>	<td id='c20' onclick='geratabela(8,"+m+")'>8</td>	<td id='c21' onclick='geratabela(9,"+m+")'>9</td>	</tr>	<tr id='l4'>	<td id='c22' onclick='geratabela(10,"+m+")'>10</td>	<td id='c23' onclick='geratabela(11,"+m+")'>11</td>	<td id='c24' onclick='geratabela(12,"+m+")'>12</td>	<td id='c25' onclick='geratabela(13,"+m+")'>13</td>	<td id='c26' onclick='geratabela(14,"+m+")'>14</td>	<td id='c27' onclick='geratabela(15,"+m+")'>15</td>	<td id='c28' onclick='geratabela(16,"+m+")'>16</td>	</tr>	<tr id='l5'>	<td id='c29' onclick='geratabela(17,"+m+")'>17</td>	<td id='c30' onclick='geratabela(18,"+m+")'>18</td>	<td id='c31' onclick='geratabela(19,"+m+")'>19</td>	<td id='c32' onclick='geratabela(20,"+m+")'>20</td>	<td id='c33' onclick='geratabela(21,"+m+")'>21</td>	<td id='c34' onclick='geratabela(22,"+m+")'>22</td>	<td id='c35' onclick='geratabela(23,"+m+")'>23</td>	</tr>	<tr id='l6'>	<td id='c36' onclick='geratabela(24,"+m+")'>24</td>	<td id='c37' onclick='geratabela(25,"+m+")'>25</td>	<td id='c38' onclick='geratabela(26,"+m+")'>26</td>	<td id='c39' onclick='geratabela(27,"+m+")'>27</td>	<td id='c40' onclick='geratabela(28,"+m+")'>28</td>	<td id='c41'></td>	<td id='c42'>	</td></tr>	</table>";
		}					
	}			
/*
function compara(){
	if($id_dia=''){	
		echo "document.getElementById('c".$posicao.$id_dia."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
	}
}*/

function php(p){
//	p = window.document.getElementById('fevereiro').value;
//	alert(p);

//Quando eu quiser passar algo do banco de dados para javascript eu uso o input;
//Quando eu quiser passar uma parametro em javascript para php, como faço?
					//alert($('#fevereiro').val());
					<?php
					//echo "alert(p);";
//O PHP executa no servidor. O JavaScript executa no browser do cliente.
//Não há como passar uma variável client-side para server-side sem enviar pelos métodos GET ou POST.

						//TESTAR usando os dias 2 e 5
///////////////////////$compara = $('#fevereiro').val();////////////////////////////////////////////

					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							/*if($id_dia=''){	
								echo "document.getElementById('c".$posicao.$id_dia."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}*/							
						}
					}

				?>

}
	

		function geratabela(d, m){
			var mes;
			//alert(m);
			//alert(d);
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
			document.getElementById('campo').innerHTML = "<h3> "+d+" de "+mes+"</h3><table id='dia"+d+"'><tr><td>8:00</td><td id='c49"+d+m+"' onclick='marcou(49,"+d+","+m+")'></td></tr><tr><td>9:00</td><td id='c51"+d+m+"' onclick='marcou(51,"+d+","+m+")'></td></tr><tr><td>10:00</td><td id='c53"+d+m+"' onclick='marcou(53,"+d+","+m+")'></td></tr><tr><td>11:00</td><td id='c55"+d+m+"' onclick='marcou(55,"+d+","+m+")'></td></tr><tr><td>12:00</td><td id='c57"+d+m+"' onclick='marcou(57,"+d+","+m+")'></td></tr><tr><td>13:00</td><td id='c59"+d+m+"' onclick='marcou(59,"+d+","+m+")'></td></tr><tr><td>14:00</td><td id='c61"+d+m+"' onclick='marcou(61,"+d+","+m+")'></td></tr><tr><td>15:00</td><td id='c63"+d+m+"' onclick='marcou(63,"+d+","+m+")'></td></tr><tr><td>16:00</td><td id='c65"+d+m+"' onclick='marcou(65,"+d+","+m+")'></td></tr><tr><td>17:00</td><td id='c67"+d+m+"' onclick='marcou(67,"+d+","+m+")'></td></tr><tr><td>18:00</td><td id='c69"+d+m+"' onclick='marcou(69,"+d+","+m+")'></td></tr><tr><td>19:00</td><td id='c71"+d+m+"' onclick='marcou(71,"+d+","+m+")'></td></tr><tr><td>20:00</td><td id='c73"+d+m+"' onclick='marcou(73,"+d+","+m+")'></td></tr></table>";


			if(d==1){
				document.getElementById('c13').style.backgroundColor = "magenta";

				<?php

					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
						$mes = $valor['ID_MES'];
						
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($mes + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";

							//if($id_dia==5){
							if(($id_dia==1)&&($mes==1)){

								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}

						}
					}
				?>
			}
			if(d!=1){
				document.getElementById('c13').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}

/*
			if(d==2){
				document.getElementById('c14').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==2){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=2){
				document.getElementById('c14').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}

			if(d==3){
				document.getElementById('c15').style.backgroundColor = "magenta";
			
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==3){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=3){
				document.getElementById('c15').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}

			if(d==4){
				document.getElementById('c16').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==4){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=4){
				document.getElementById('c16').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			

			if(d==5){
				document.getElementById('c17').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==5){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=5){
				document.getElementById('c17').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			

			if(d==6){
				document.getElementById('c18').style.backgroundColor = "magenta";				
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==6){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=6){
				document.getElementById('c18').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			


			if(d==7){
				document.getElementById('c19').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==7){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=7){
				document.getElementById('c19').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			


			if(d==8){
				document.getElementById('c20').style.backgroundColor = "magenta";				
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==8){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=8){
				document.getElementById('c20').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			


			if(d==9){
				document.getElementById('c21').style.backgroundColor = "magenta";				
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==9){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=9){
				document.getElementById('c21').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			


			if(d==10){
				document.getElementById('c22').style.backgroundColor = "magenta";				
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==10){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=10){
				document.getElementById('c22').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			

			if(d==11){
				document.getElementById('c23').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==11){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=11){
				document.getElementById('c23').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			

			if(d==12){
				document.getElementById('c24').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==12){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=12){
				document.getElementById('c24').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}			

			if(d==13){
				document.getElementById('c25').style.backgroundColor = "magenta";
				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==13){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=13){
				document.getElementById('c25').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	

			if(d==14){
				document.getElementById('c26').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==14){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=14){
				document.getElementById('c26').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	

			if(d==15){
				document.getElementById('c27').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==15){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=15){
				document.getElementById('c27').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}				

			if(d==16){
				document.getElementById('c28').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==16){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=16){
				document.getElementById('c28').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==17){
				document.getElementById('c29').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==17){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=17){
				document.getElementById('c29').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==18){
				document.getElementById('c30').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==18){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=18){
				document.getElementById('c30').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==19){
				document.getElementById('c31').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==19){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=19){
				document.getElementById('c31').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==20){
				document.getElementById('c32').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==20){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=20){
				document.getElementById('c32').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==21){
				document.getElementById('c33').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==21){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=21){
				document.getElementById('c33').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==22){
				document.getElementById('c34').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==22){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=22){
				document.getElementById('c34').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==23){
				document.getElementById('c35').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==23){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=23){
				document.getElementById('c35').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==24){
				document.getElementById('c36').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==24){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=24){
				document.getElementById('c36').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==25){
				document.getElementById('c37').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==25){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=25){
				document.getElementById('c37').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	

			if(d==26){
				document.getElementById('c38').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==26){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=26){
				document.getElementById('c38').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==27){
				document.getElementById('c39').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==27){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=27){
				document.getElementById('c39').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==28){
				document.getElementById('c40').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==28){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=28){
				document.getElementById('c40').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==29){
				document.getElementById('c41').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==29){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=29){
				document.getElementById('c41').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==30){
				document.getElementById('c42').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==30){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=30){
				document.getElementById('c42').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}	
			if(d==31){
				document.getElementById('c43').style.backgroundColor = "magenta";

				<?php
					if(!empty($id_dia)){
						foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
						$id_dia = $valor['ID_DIA'];
							
						//echo "alert($compara + ' é o que foi atribuido através do input');";
						//echo "alert($id_dia + ' vem do banco de dados, multiplos valores');";
						//echo "alert(p + ' é o parametro da função, valor fixo');";
							//if($id_dia==5){
							if($id_dia==31){	
								echo "document.getElementById('c".$posicao."').innerHTML = '".$colaborador." <input type = \'hidden\' name=\'posicao[".$posicao."]\' class=\'$posicao\'	value=\'$posicao\'/> <input type=\'hidden\' name=\'usuario[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$colaborador."\'	/> <input type=\'hidden\' name=\'dia[".$posicao."]\'	class=\'".$posicao."\'	value=\'".$id_dia."\'	/>'\n";
								//print_r($posicao.$id_dia);			
							}							
						}
					}
				?>
			}
			if(d!=31){
				document.getElementById('c43').style.backgroundColor = "rgb(189, 233, 245, 0.7)";
			}		*/				

		}


		function marcou(c, d, m){
			if(colaborador==" "){
				alert("Selecione um colaborador primeiro!")
			}
			if(colaborador!=" "){
				mostra = document.getElementsByTagName('td')[c].innerHTML;
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

			document.getElementsByTagName('td')[c].innerHTML = colaborador
			+"<input type='hidden' name='posicao["+c+d+m+"]'	class='"+c+"'	value='"+c+d+m+"'	/>"
			+"<input type='hidden' name='usuario["+c+d+m+"]'	class='"+c+"'	value='"+colaborador+"'	/>"
			+"<input type='hidden' name='dia["+c+d+m+"]'	class='"+c+"'	value='"+d+"'	/>"
			+"<input type='hidden' name='mes["+c+d+m+"]'	class='"+c+"'	value='"+m+"'	/>";


		}
/*
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    document.getElementById("t1").innerHTML = myObj.name;
  }
};
xmlhttp.open("GET", "busca.php", true);
xmlhttp.send();
*/		
	</script>
	</body>
</html>