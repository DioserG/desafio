<?php

$servidor = '127.0.0.1';
$usuario  = 'root';
$senha    = ''; // inserir senha caso tenha
$banco    = 'desafio';
$port     = '3306';
$conexao  = new mysqli($servidor, $usuario, $senha, $banco, $port);

/*
if ($conexao) {
	echo "passou";
}else 
	echo "Não";
*/
?>