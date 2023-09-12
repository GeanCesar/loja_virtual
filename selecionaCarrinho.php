<?php	
	
	session_start();	


	$id = $_SESSION['id'];
	
	
	
	$ativo = true;	


	include_once("conectar/conecta.php");	
	
	  
	$dados = mysqli_query($conectar, "SELECT * FROM carrinho WHERE Dono = $id and Ativo = 1");	    

			    if($dados === FALSE) { 
				   die(mysqli_error($conectar));
				}  

			    $total = mysqli_num_rows($dados);  


			    mysqli_close($conectar);

	$response = array("success" => true);
	$qtd = array("qtd" => $total);
    echo json_encode($qtd + $response);
?>