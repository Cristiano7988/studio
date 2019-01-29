<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Studio Harmonia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilo2.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="coin-slider.js"></script>
	<link rel="stylesheet" href="coin-slider-styles.css" type="text/css" />

	<script type="text/javascript" src="java.js">
		
	</script>
	<style type="text/css">

	</style>
</head>
<body onload="carregar('danca.html')">


	<header>

		<div id='coin-slider'>

			<a href="img01_url" target="_blank">
	    		<img src='imagens/slider/pilates.jpg' >
				<span>
			    	Pilates
		    	</span>
			</a>

		    <a href="img01_url" target="_blank">
		    	<img src='imagens/slider/danca.jpg' >
				<span>
					Dança
				</span>
			</a>

			<a href="img01_url" target="_blank">
		    	<img src='imagens/slider/terapia.jpg' >
				<span>
					Dança
				</span>
			</a>
		</div>



		<img id="logo" alt="Logo do Estúdio" src="imagens/harmonia3logo3.png">
			<a id="adm" href=""><span>Administrador</span></a>			
			<ol>
				<li><a id="sob" href="#" onclick="carregar('pilates.html')"><span>Pilates</span></a></li>
				<li><a href="#" onclick="carregar('yoga.html')">Yoga</a></li>
				<li><a href="#" onclick="carregar('danca.html')">Dança</a></li>
				<li><a href="#" onclick="carregar('terapia.html')">Terapia</a></li>	
			</ol>
	</header>




	<div id="yoga">

	</div>

	<footer>
		<section class="delimitador">
			<article>
					<p>Endereço Rua Fernandes Xavier, nº 89 - Bairro: Rio Branco</p>
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
					Celular: (51) 98572-6454
				</p>
			</article>
		</section>
	</footer>
	</main>
	<script type="text/javascript">
		
	 	$(document).ready(function() {
	    	$('#coin-slider').coinslider({ width: 900, navigation: false, delay: 5000 });	
	  	});


	  /*	function carregar(l){
		var exibe = document.getElementById(l).innerHTML;
		alert(exibe)		
		}*/

    function carregar(pagina){
        $("#yoga").load(pagina);
    }
		
	</script>
	</body>
</html>