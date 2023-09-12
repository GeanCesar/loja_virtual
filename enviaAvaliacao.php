<?php

	include_once("conectar/conecta.php");

	session_start();	

	$dono = $_SESSION['id'];

	if(!empty($_POST['estrela'])){
		$produto = $_POST['produto'];
		$estrela = $_POST['estrela'];


		$dados = mysqli_query($conectar, "INSERT INTO avaliacao_produto (Usuario, Produto, Quantidade) VALUES ($dono, $produto, '$estrela')") or die(mysqli_error($conectar)); 	 

		$sql = "UPDATE carrinho set Ativo = 3 WHERE Dono = $dono and Produto = $produto";

		if (mysqli_query($conectar, $sql)) {
		    
		} else {
				    
		}

		mysqli_close($conectar);

		header("Location: avaliacao.php");
		
		
	}else{		
		header("Location: avaliacao.php");
	}

?>