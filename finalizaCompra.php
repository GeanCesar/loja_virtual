<?php

	include_once("conectar/conecta.php");

	session_start();	

	$dono = $_SESSION['id'];
	 

		$sql = "UPDATE carrinho set Ativo = 2 WHERE Dono = $dono and Ativo = 1";

		if (mysqli_query($conectar, $sql)) {
		    header("Location: carrinho.php");
		} else {
			header("Location: carrinho.php");
		}

		mysqli_close($conn);

		
	

?>