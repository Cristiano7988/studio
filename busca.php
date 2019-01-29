<?php
	//Cria a conexao com o banco de dados, localhost: Servidor do banco de dados, root: Usuário que acessa o banco de dados, e "" senha que esta vazia no momento, bd_agenda = nome do banco de dados
		$link = mysqli_connect("localhost", "root", "", "bd_agenda");

			if (!$link) {
			    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	   			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    			exit;
			}

			$valor = $_GET["chave"];
	$mes = $_GET["chave2"];
	$paramd = $_GET["paramd"];

$agrupa = '';

	$result = mysqli_query($link,"Select * from agenda2 where id_dia=".$paramd." and id_mes=".$mes." and id_ano=2018");
	$resultado = mysqli_fetch_all($result,MYSQLI_ASSOC);

	foreach($resultado as $indice => $valor){				
						$posicao = $valor['Posicao'];
						$colaborador = $valor['COLABORADOR'];
			$agrupa .= "pos=".$posicao."##colaborador=".$colaborador."##";			

					}

	

	



	echo $agrupa;
	
/*
	echo "Valor1: " . $valor . "<br />";
	echo "Valor2: " . $valor2 . "<br />";
	echo "Valor3: " . $valor3 . "<br />";
*/
?>