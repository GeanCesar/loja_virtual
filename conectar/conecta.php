<?php 
	//informações para acesso ao BD
	$enderecoServ ="localhost";
	$usuarioServ="root";
	$senhaServ="";
	$nomeBD ="Loja";

	//Acessar o servidor

	$conectar = @mysqli_connect($enderecoServ,$usuarioServ,$senhaServ) or die (" Não foi possível acessar o servidor ");

	//acessoi ao BD
	$selecionarBD = mysqli_select_db($conectar,$nomeBD) or die ("Não foi possível acessar o Banco de Dados");

?>