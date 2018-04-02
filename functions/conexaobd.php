<?php
	//$servidor = "phpmyadmin.umbler.com";
	$servidor = "mysql472.umbler.com";
	$usuario = "ect";
	$senha = "ecta1234";
	$nomedb = "bdbot";
	
	
	//Criar a conexao
	$bd = mysqli_connect($servidor, $usuario, $senha, $nomedb);