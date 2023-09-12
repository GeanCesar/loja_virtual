<?php

	session_start();	
	$logado;

	if(!empty($_SESSION['id'])){
		$id = $_SESSION['id'];	
		$nome = $_SESSION['nome'];		
		$email = $_SESSION['email'];
		$administrador = $_SESSION['administrador'];
		$logado = true;
	}
	else{
		$logado = false;
	}


?>
