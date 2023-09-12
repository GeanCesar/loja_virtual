<?php	
	
	$id = $_POST['id'];		

	include_once("conectar/conecta.php");	
	
	  
	$dados = mysqli_query($conectar, "DELETE FROM carrinho WHERE Id = $id") or die(mysqli_error($conectar)); 	  
	$response = array("success" => true);
    echo json_encode($response);
?>