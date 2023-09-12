<?php	
	
	session_start();	


	$id = $_SESSION['id'];
	
	
	$produto = $_POST['prod'];
	$ativo = true;	


	include_once("conectar/conecta.php");	
	
	  
	$dados = mysqli_query($conectar, "INSERT INTO carrinho(Dono, Produto, Ativo) values ('$id',  '$produto', '$ativo')") or die(mysqli_error($conectar)); 	  
	$response = array("success" => true);
    echo json_encode($response);
?>