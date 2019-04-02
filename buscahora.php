<?php

	$link = mysqli_connect("localhost:3306", "harmon53_root", "cr1st1ano2019", "harmon53_bd_agenda");

	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	   	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}


	$hora = $_GET["chave2"];
	$agrupa = ' ';


	$result = mysqli_query($link,"Select * from agenda2 where id_hora=".$hora." and id_ano=2019");
	$resultado = mysqli_fetch_all($result,MYSQLI_ASSOC);

	foreach($resultado as $indice => $valor){				
		$id_hora = $valor['ID_HORA'];
		$colaborador = $valor['COLABORADOR'];
		$agrupa .= "hora=".$id_hora."##colaborador=".$colaborador."##";			
	}

	echo $agrupa;

	
?>

