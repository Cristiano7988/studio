<?php
session_start();
if(!$_SESSION['usuario']){
	header('Location: acesso.php');
	exit;
}
?>