<?php

	$nome = strtoupper(($_POST['txtNome']));	
	$email = strtoupper(($_POST['txtEmail1']));
	$senha = ($_POST['txtSenha1']);

	$senha = md5($senha);


	include_once("conectar/conecta.php");	
	
	  
	$dados = mysqli_query($conectar, "INSERT INTO usuario(Nome, Email, Senha) values ('$nome',  '$email', '$senha')") or die(mysqli_error($conectar)); 	  


	header('Location:index.php');


?>