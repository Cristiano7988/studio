<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Studio Harmonia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!--
	<script type="text/javascript" src="coin-slider.js"></script>
	<link rel="stylesheet" href="coin-slider-styles.css" type="text/css" />
-->
	<link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

	<script type="text/javascript" src="java.js">
		
	</script>
	<style type="text/css">

	</style>
</head>
<body onload="carregar('pilates.html')">


	<header>

		<div id='coin-slider'>
<!--
			<a href="img01_url" target="_blank">
	    		<img src='imagens/slider/pilates.jpg' >
				<span>
			    	Pilates
		    	</span>
			</a>
-->

		    	<img src='imagens/slider/cover-site.png' >
<!--
			<a href="img01_url" target="_blank">
		    	<img src='imagens/slider/terapia.jpg' >
				<span>
					Dança
				</span>
			</a>
-->
		</div>



		<img id="logo" alt="Logo do Estúdio" src="imagens/Colorido/Logo-colorido-01.png">
			<div id="logar">
			<a id="adm" href="acesso.php">Colaborador</a>			
			</div>
			<ol>
				<li><a href="#" onclick="carregar('pilates.html')">Pilates</a></li>
				<li><a href="#" onclick="carregar('yoga.html')">Yoga</a></li>
				<li><a href="#" onclick="carregar('danca.html')">Arte</a></li>
				<li><a href="#" onclick="carregar('terapia.html')">Terapia</a></li>	
			</ol>
	</header>




	<div id="yoga">

	</div>

	<footer>
		<section>
			<article>
					<p>Endereço Rua Fernandes Vieira, nº 89 - Bairro: Bom Fim	</p>
					<p>contato@harmoniastudio.com.br</p>
					<p>Telefone: (51) 3312-6903</p>
					<p>Whatsapp: (51) 99775-5562</p>				
			</article>
			<article id="desenvolvedor">
				<p>
					Desenvolvido por Cristiano Oliveira Morales
				</p>
				<p>
					E-mail: cristianooliveiramorales@gmail.com
					Celular: (51) 98546-3537
				</p>
			</article>
		</section>
	</footer>
	</main>
	<script type="text/javascript">
		
/*	 	$(document).ready(function() {
	    	$('#coin-slider').coinslider({ width: 900, navigation: false, delay: 5000 });	
	  	});*/

    function carregar(pagina){
        $("#yoga").load(pagina);
    }
		
	</script>
	</body>
</html>