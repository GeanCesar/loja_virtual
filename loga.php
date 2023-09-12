<?php

	$email = strtoupper(($_POST['txtEmail']));
	$senha = ($_POST['txtSenha']);
	$senha = md5($senha);

	session_start();

	include_once("conectar/conecta.php");	
	
	  
	$dados = mysqli_query($conectar, "SELECT * FROM usuario WHERE Email = '$email' and Senha = '$senha'") or die(mysqli_error($conectar)); 	  

	$linha = mysqli_fetch_array($dados);
	$total = mysqli_num_rows($dados);


	$id = $linha['Id'];
	$nome = $linha['Nome'];	
	$admistrador = $linha['Administrador'];	

	if($total>0){		
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome'] = $nome;		
		$_SESSION['id'] = $id;
		$_SESSION['administrador'] = $admistrador;
		header('Location:index.php');
	}
	else{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		unset($_SESSION['nome']);		
		unset($_SESSION['id']);
		unset($_SESSION['administrador']);
		header('Location:index.php?falha=erro');
		
	}

?>