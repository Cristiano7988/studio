<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Acesso - Harmonia Studio</title>
	<link rel="stylesheet" type="text/css" href="estilo_acesso.css">
	<link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<style type="text/css">


	</style>

	<?php
	//Cria a conexao com o banco de dados, localhost: Servidor do banco de dados, root: Usuário que acessa o banco de dados, e "" senha que esta vazia no momento, bd_agenda = nome do banco de dados
	$link = mysqli_connect("localhost:3306", "harmon53_root", "cr1st1ano2019", "harmon53_bd_agenda");

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}

	$id = $_POST["id"];
	$colaborador = $_POST["usuario"];
	$senha = $_POST["senha"];


	$execute =
	"insert into acesso 	(id, colaborador,	senha)
	values 					($id, '$colaborador',	md5('$senha'))"; 
	mysqli_query($link,$execute);

//	$busca = mysql_query("SELECT id FROM acesso");
//	$dado = mysql_fetch_array($busca);

?>	


</head>
<body>
	<div class="delimitador">
		<img src="imagens/Colorido/Logo-colorido-03.png" alt="Logo Harmonia Studio">
		<form action="login.php" method="POST">
			<input type="name" required name="usuario" placeholder="Nome" style="margin-bottom: 10px;"></input>
			<br>
			<input type="password" required name="senha" placeholder="Senha"></input>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
			<p>*Dados inválidos</p>
					<?php
			        endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
			<br><br>
			<input type="hidden" required name="id" value="1"></input>
			<input type="submit" /><br><br>
			<a href="index.php">Voltar</a>			
		</form>
	</div>
	<script type="text/javascript">

	</script>

</body>
</html>