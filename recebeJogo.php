<?php

	$nome = $_POST['txtNome'];	
	$preco = $_POST['txtPreco'];
	$requisitos = $_POST['txtRequisitos'];
	$genero = $_POST['txtGenero'];	
	$foto = $_FILES['txtFoto']['name'];

	include_once("conectar/conecta.php");	
	  
	$dados = mysqli_query($conectar, "INSERT INTO
	produto	(Nome, Genero, Preco, Categoria, Requisitos, Foto) values	('$nome',  $genero, $preco, 2, '$requisitos', '$foto')") or die(mysqli_error($conectar)); 	


	$location = 'fotos/';

	if (isset($_FILES['txtFoto'])) {
	    $name = $_FILES['txtFoto']['name'];	    
	    $tmp_name = $_FILES['txtFoto']['tmp_name'];

	    $error = $_FILES['txtFoto']['error'];
	    if ($error !== UPLOAD_ERR_OK) {
	        echo 'Erro ao fazer o upload:', $error;
	    } elseif (move_uploaded_file($tmp_name, $location . $name)) {
	         
	    }
	} else {
	    
	}

	
	  $nome = $_FILES['txtFoto']['name'];	  	  
	  $filename1 = 'fotos/';	  
	  $filename1.= $nome;	    

	  $len = strlen($nome);
	  
	  $rest = substr($nome, $len-4, $len);
	  if(($rest == ".jpg") || ($rest=="jpeg")){
	  	 processjpg($filename1, $nome);	  	  
	  }
	  else{
	  	processpng($filename1, $nome);
	  }
	  


	  function processjpg($filename, $nome){
	    list($width,$height) = getimagesize($filename);
	    $newheight = 1251;
	    $imagetruecolor = imagecreatetruecolor(978 ,$newheight);
	    $newimage = imagecreatefromjpeg($filename);
	    imagecopyresampled($imagetruecolor,$newimage,0,0,0,0,978 ,$newheight,$width,$height);	    
	    imagejpeg($imagetruecolor,'fotos/'.$nome,80);
	    
	  };

	  function processpng($filename, $nome){
	    list($width,$height) = getimagesize($filename);
	    $newheight = 1251;
	    $imagetruecolor = imagecreatetruecolor(978 ,$newheight);
	    $newimage = imagecreatefrompng($filename);
	    imagecopyresampled($imagetruecolor,$newimage,0,0,0,0,978 ,$newheight,$width,$height);	    
	    imagepng($imagetruecolor,'fotos/'.$nome,80);
	    
	  };

	  header("Location:cadastraJogo.php?falha=none");

?>