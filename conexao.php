<?php
define('HOST', 'localhost:3306');
define('USUARIO', 'harmon53_root');
define('SENHA', 'cr1st1ano2019');
define('DB', 'harmon53_bd_agenda');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar!');


?>