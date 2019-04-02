<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: acesso.php');
	exit();
}

//Realiza validações e verifica se tá vindo ataque de sql inject
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
 //verifica se retorna registro
$query = "SELECT COLABORADOR FROM acesso WHERE COLABORADOR = '{$usuario}' AND SENHA = md5('{$senha}')";

//executa a query pelo banco de dados
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result); 

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: agenda.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: acesso.php');
	exit();
}

?>