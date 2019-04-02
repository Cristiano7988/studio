<?php

	$link = mysqli_connect("localhost:3306", "harmon53_root", "cr1st1ano2019", "harmon53_bd_agenda");

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

	$result = mysqli_query($link,"Select * from agenda2 where id_dia=".$paramd." and id_mes=".$mes." and id_ano=2019");
	$resultado = mysqli_fetch_all($result,MYSQLI_ASSOC);

	foreach($resultado as $indice => $valor){				
		$posicao = $valor['Posicao'];
		$colaborador = $valor['COLABORADOR'];
		$agrupa .= "pos=".$posicao."##colaborador=".$colaborador."##";			
	}

	echo $agrupa;
	
?>