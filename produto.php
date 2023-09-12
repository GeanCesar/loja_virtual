<!DOCTYPE html>
<html>
<head>
	<title>Game Now</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#000">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="favicon3.png" />
	<link rel="stylesheet" type="text/css" href="slick/slick.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="css/jquery-confirm.css">
	<link rel="stylesheet" href="css/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>

	<?php		
	 	include_once("dadosUsuario.php");
	 	include_once("conectar/conecta.php"); 

	 	$dados = mysqli_query($conectar, "SELECT * FROM produto");	    

	    if($dados === FALSE) { 
		   die(mysqli_error($conectar));
		}  

	    $linha = mysqli_fetch_assoc($dados);
	    $total = mysqli_num_rows($dados);   

	

	?>

	<header id="capa">			
		<div class="container redes">
			<a href="http://www.facebook.com"><i class="fa fa-facebook-official"></i></a>
			<a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>
			<a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i></a>
		</div>	
		<div class="apre">
			<img src="logo1.svg" id="logo" style="display: none;">
		</div>

	</header>


	<nav class="menu" id="me">
		<button class=" btn btn-menu" data-toggle="collapse" onclick="openNav()">               
	            <span class="glyphicon glyphicon-menu-hamburger"></span>
	            <span class="bolinha" style="visibility: hidden;" id="bolinha"></span>
	        </button>
		<div class=" col-xs-12 ">		  			
			  <div class="container input-group pesq col-xs-11 col-md-11 col-lg-11 col-sm-11" style="float: left; padding-left: 6%; padding-right: 5%;">
			    <input class="form-control txtPesquisa col-m" id="myInput" onkeyup="myFunction()" placeholder="Pesquisar nome" type="text" placeholder="Pesquisar" />
			</div>

		    <div class="col-xs-1 carri">
		    	<?php 

		    		if(!$logado){
		    			echo "<button onclick='botao()' for='men'><li class='fas fa-user'><li><span class='bolinha' id='bolinhaa' style='left: inherit; visibility: hidden;' ></span></li>
			<li></li></button>";
		    		}
		    		else{
		    			echo "<a href='carrinho.php'><button><li class='fas fa-shopping-cart'><span class='bolinha' id='bolinhaa' style='left:inherit; top: 2px;  font-family: Poppins;    font-size: 11px;    text-align: center;    padding-top: 1.8px;
		    				animation:none;
		    				height:15px;
		    				width:15px;'></span></li></button></a>
			";
		    		}

		    	 ?>
		    	

		    </div>        
        </div>		
	</nav>

	<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <ul>                
            <li><a href="index.php">Home</a></li>
			<li><a data-toggle="collapse" data-target="#Produtos">Produtos » </a>
				<ul class="collapse" id="Produtos">
					<li><a href="index.php">Jogos</a></li>
				<li><a href="consoles.php">Consoles</a></li>
				</ul>
			</li>
			<?php 
				if (!$logado) {
					
				}
				else{
					echo "<li><a href='carrinho.php'>Carrinho <span class='bolinha' id='bolinhaa' style='left: inherit; visibility: hidden;' ></span></a></li>";
					echo "<li><a href='avaliacao.php'>Avaliações</a></li>";
				}
			?>			
          </ul>          
        </div>

	


	<ul id="myUL" style="display: none;">
		<?php 
			if($total){ do{


		?>

	      <li><a href="produto.php?cod=<?php echo $linha['Id']  ?>"><img class="imagemPesq" src="fotos/<?php echo $linha['Foto']?>"><label><?php echo $linha['Nome']?></label></a></li>

	     <?php 
	     }while ($linha = mysqli_fetch_assoc($dados)); 

			mysqli_free_result($dados);}

	         ?>

    </ul> 

    


	<div class="conteudo container" id="conteudo" onscroll="slide()" style="padding-left: 15px; padding-right: 15px; margin-bottom: 35px;">
		
		

		

	</div>

	<footer id="roda">
		<h3>Desenvolvido por Gean Cesar</h3> 	
	</footer>
	<input type="checkbox" id="men" >

		<label for="menu-usuario" onclick="desativaConteudo()">
			<div class="entrar">
				<?php
					if(!$logado){
						
					}
					else{						
						echo("<label> ");
						echo($nome);
						echo(" </label>	        	
							 <a href=''>CONFIGURAÇÕES</a>
							 <h2  onclick='sair()'>SAIR</h2>");	           	
					}
				?>
				
	        </div>

	        
	        <label class="usuario" for="men" id="bota" onclick="botao()">	        	
	            <svg class="svg-icon" viewBox="0 0 20 20" for="men">
					<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
				</svg>
	        </label>
	        
	    </label>

	    <div class="externa" id="externa" >
	 		<?php
			if(!$logado){
				echo("<div class='col-lg-6 col-md-8 col-sm-10 col-xs-12 requestLogar' id='nLogado' style='visibility:hidden;'>
					<div class='col-md-12 col-sm-12 col-xs-12 formulario' style='margin: auto;'>
						<div class='col-md-12 col-sm-12 col-xs-12 login'>

						<div class='topoConfirm'><button class='fecho' onclick='fechar()'>X</button> </div>

							<ul class='nav nav-tabs'>
						  		<li class='active col-md-6 col-xs-6 col-sm-6' ><a data-toggle='tab' href='#log'>LOGIN</a></li>			    
						  		<li class='col-md-6 col-xs-6 col-sm-6 col-lg-6' ><a data-toggle='tab' href='#cad' style='margin: 0;'>CADASTRO</a></li>	
						  		
							</ul>

						  	<div class='tab-content '>

						    	<div id='log' class='tab-pane fade in active'>
						     		<form class='col-md-12 col-xs-12 col-sm-12' method='POST' action='loga.php' style='padding-top: 20px;'>

										<div class='form-group col-md-8 form'>
										  <label for='txtEmail' class='col-form-label'>E-mail</label>
										  <div class='col-10'>
										    <input class='form-control text' type='email' id='txtEmail' name='txtEmail' required='' autocomplete='off' placeholder='Digite seu e-mail'>
										  </div>
										</div>

										<div class='form-group col-md-4'>
										  <label for='txtSenha' class='col-2 col-form-label'>Senha</label>
										  <div class='col-10'>
										    <input class='form-control text' type='password' autocomplete='current-password' id='txtSenha' name='txtSenha' required='' placeholder='*********'>
										  </div>
										</div>	

										<input type='submit' class='btn btn-logar btn-lg btn-block' name='btnEnviar' value='LOGAR'>

									</form>

						    	</div>

						    	<div id='cad' class='tab-pane fade'>	      
								
									<form class='col-md-12 cadastra' method='POST' action='cadastra.php'>
										<div class='form-group col-md-6'>
										  <label for='txtNome' class='col-2 col-form-label'>Nome</label>
										  <div class='col-10'>
										    <input class='form-control text' type='text' required='' placeholder='Preencha seu nome' autocomplete='off' id='txtNome' name='txtNome'>
										  </div>
										</div>

										<div class='form-group col-md-6'>
										  <label for='txtSenha1' class='col-2 col-form-label'>Senha</label>
										  <div class='col-10'>
										    <input class='form-control text' type='password' autocomplete='current-password' required='' placeholder='*********' id='txtSenha1' name='txtSenha1'>
										  </div>
										</div>	

										<div class='form-group col-md-12'>
										  <label for='txtEmail1' class='col-2 col-form-label'>E-Mail</label>
										  <div class='col-10'>
										    <input class='form-control text' type='email' required='' placeholder='Preencha seu email' autocomplete='off' id='txtEmail1' name='txtEmail1'>
										  </div>
										</div>


										<input type='submit' class='btn btn-logar btn-lg btn-block' name='btnEnviar' value='CADASTRAR'>

									</form>

						    	</div>

							</div>

						</div>
					</div>
					
				</div>");
			}
			else{						
          	
			}
		?>
		</div>
		
</body>

	<script src="jquery/jquery-3.3.1.js"></script>
	<script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
  	<script src="bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript">
		

      function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";	
		  document.getElementById("conteudo").style.opacity = "0.3";
		  document.getElementById("conteudo").style.pointerEvents = "none";
		  document.getElementById("me").style.opacity = "0.3";
		  document.getElementById("me").style.pointerEvents = "none";
		  document.getElementById("roda").style.opacity = "0.3";
		  document.getElementById("bolinha").style.visibility = "hidden";
		  document.getElementById("capa").style.opacity = "0.3"
		  
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("me").style.opacity = "1";
          document.getElementById("me").style.pointerEvents = "all";
		  document.getElementById("conteudo").style.opacity = "1";
          document.getElementById("roda").style.opacity = "1";
          document.getElementById("conteudo").style.pointerEvents =  "all";
          document.getElementById("capa").style.opacity = "1";                      
      }

      function desativaConteudo(){
		  if(document.getElementById("men").checked == false){
		  	document.getElementById("conteudo").style.opacity = "0.3";
		  	document.getElementById("roda").style.opacity = "0.3";
		  	document.getElementById("conteudo").style.pointerEvents = "none";
		  	<?php 
			  	if(!$logado){
	  				echo "document.getElementById('nLogado').style.visibility = 'visible';";
	  				
	  			}
	  			else{

	  			}
  			?>
  			
		  	
		  }
		  else{
		  	document.getElementById("conteudo").style.opacity = "1";
          	document.getElementById("roda").style.opacity = "1";
          	document.getElementById("conteudo").style.pointerEvents =  "all"; 
          	<?php
      			if(!$logado){
      				echo "document.getElementById('nLogado').style.visibility = 'hidden';";
      				
      			}
      			else{

      			}
      		?>
      		
		  }

      }

      function fechar(){
      	botao();
      	ativaConteudo();
      }

      function ativaConteudo(){
	      	document.getElementById("mySidenav").style.width = "0";
	      	document.getElementById("men").checked = false;
      		document.getElementById("conteudo").style.opacity = "1";
          	document.getElementById("roda").style.opacity = "1";
          	document.getElementById("conteudo").style.pointerEvents =  "all";
          	<?php
      			if(!$logado){
      				echo "document.getElementById('nLogado').style.visibility = 'hidden';";
      				echo "\ndocument.getElementById('capa').style.opacity = '1';";
      				echo "\ndocument.getElementById('me').style.opacity = '1';";
      				
      			}
      			else{

      			}
      		?> 
      }



      function botao(){
      	var on = document.getElementById("men").checked;      	

      	if(on){
      		$("#bota").addClass("usuario");
      		$("#bota").removeClass("usuarioAtivo");
      		<?php
      			if(!$logado){
      				echo "\ndocument.getElementById('nLogado').style.visibility = 'hidden';";      				
      				echo "\ndocument.getElementById('externa').style.pointerEvents = 'none';";   
      				echo "\ndocument.getElementById('capa').style.opacity = '1';";
      				echo "\ndocument.getElementById('me').style.opacity = '1';";
      				
      			}
      			else{

      			}
      		?>
      	}
      	else{
      		$("#bota").removeClass("usuario");
      		$("#bota").addClass("usuarioAtivo");
      		<?php
      			if(!$logado){
      				echo "\ndocument.getElementById('nLogado').style.visibility = 'visible'; ";       				
      				echo "\ndocument.getElementById('externa').style.pointerEvents = 'all';"; 	      				
      				echo "\ndocument.getElementById('capa').style.opacity = '0.3';";
      				echo "\ndocument.getElementById('me').style.opacity = '0.3';";
      			}
      			else{

      			}
      		?>
      	}

      }



      /* Enviando dados */

      function enviaCarrinho(produto, id){
      	document.getElementById("capa").style.opacity = "0.3";
      	<?php 

      		if(!$logado){
      			?>      			
      			botao();
      		  	document.getElementById("conteudo").style.opacity = "0.3";
		  		document.getElementById("roda").style.opacity = "0.3";
      			<?php
      		}
      		else{

      			?>
      			document.getElementById("conteudo").style.opacity = "0.3";
		      	document.getElementById("conteudo").style.pointerEvents = "none";
		      	// document.body.style.overflowY = "hidden";
		      	var htmlConfirm = "<div class='externa confirm' id='car'><div class='col-md-4 col-xs-9 col-sm-6 col-lg-3 confirmar'> <div class='topoConfirm'><button class='fecho' onclick='fechaCarrinho()'>X</button> </div> <div class='conteudoConfirm'> <i class='fas fa-question iconeConfirm'></i> <h3 style='display:  block; margin-top: 10px;'> Deseja adicionar " + produto + " ao carrinho? </h3> </div> <div class='botoesConfirm'> <button class='botaoPrimario' onclick='addCarrinho("+ id +")'>SIM</button><button class='botaoSecundario' onclick='fechaCarrinho()' >NÃO</button></div>			</div></div>";

		      	document.body.innerHTML += htmlConfirm;      

		      	<?php 

      		}

      		?>
	      		
      	
      }

      function fechaCarrinho(){
      	var el = document.getElementById('car');
		el.remove();
		document.getElementById("conteudo").style.opacity = "1";
		document.getElementById("conteudo").style.pointerEvents = "all";
		document.getElementById("capa").style.opacity = "1";
		// document.body.style.overflowY = "scroll";
      }

      function addCarrinho(prod){            
 
            $.ajax({            
            	method: "POST",      
                dataType: 'json',
                url: 'insereCarrinho.php',
                async: true,
                data: "prod=" + prod,
                success: function(response) {

                	$.ajax({
                		method: "POST",      
		                dataType: 'json',
		                url: 'selecionaCarrinho.php',
		                async: true,
		                data: "prod=" + prod,
		                success: function(response) {		                	
		                	$("#bolinhaa").text(response.qtd);
		                	$("#bolinhaa").css('visibility', 'visible')
		                }

                	});


                	
                    fechaCarrinho();
                }                
            });
 
            


            <?php 
            	if(!$logado){

            	}
            	else{
            		$dados = mysqli_query($conectar, "SELECT * FROM carrinho WHERE Dono = $id and Ativo = 1");	    

				    if($dados === FALSE) { 
					   die(mysqli_error($conectar));
					}  

				    $total = mysqli_num_rows($dados);  


				    mysqli_close($conectar);
            	}
		    	

		     ?>

		     
       }


       
       $(document).ready(function(){ 

       	

       <?php 

       	if($total==0){
       		echo "$('#bolinhaa').css('visibility', 'hidden');";
       	}
       	else{
       		echo "$('#bolinhaa').text($total);";
       	}       	

       		  if(!empty($_GET['cod'])){
			  	$codigo = $_GET['cod'];
			  }
			  else{

			  }

       	?>
	       	$("#logo").fadeIn("slow");	       	
	       	$(".produto").fadeIn("slow");	       	
	       	$.ajax({
	       		type: 'POST',
	       		data: "codigo=" + <?php echo "$codigo"; ?>,
	       		url: 'carregaProduto.php',
	       		success: function(response){
	       			$('#conteudo').html(response);
	       			$('.responsive').slick($opts);
	       		}
	       	}); 
	       	// alteraOrdem();		       	
	       	
       });


       var $opts = {
              dots: false,
              infinite: true,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 3,  
              autoplay: true,
              autoplaySpeed: 3000,                        
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                }
              ]
            };


       function alteraOrdem(str) {

       	  $('.responsive').slick('unslick');

		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("conteudo").innerHTML=this.responseText;
		    }
		  }

		  <?php
		  	  
			  if(!empty($_GET['cod'])){
			  	$codigo = $_GET['cod'];
			  }
			  else{

			  }
		  	?>
		  xmlhttp.open("GET","carregaProduto.php?codigo=" + <?php
		  	   if(empty($codigo)){
		  	   		echo 0;
		  	   }
		  	   else{
		  			echo $codigo; 
		  	   }
		  		?> ,true);		

		  
		  xmlhttp.send();		  

		  $('.responsive').slick($opts);

		}




	function myFunction() {
       var input, filter, ul, li, a, i;
       input = document.getElementById("myInput");
       filter = input.value.toUpperCase();
       ul = document.getElementById("myUL");
       li = ul.getElementsByTagName("li");
        
       if(filter==""){
         document.getElementById("myUL").style.display = "none";
       }
       else{
       	 
         document.getElementById("myUL").style.display = "block";

         	        
            for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("a")[0];
              a = a.getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
              } else {
                li[i].style.display = "none";
              }
            }
        
       }
        
       
    }


    function verMais(texto){    	
     	
     	if(texto=="Ver mais"){
     		$('#VerMais').text('Ver menos');
     		document.getElementById('VerMais').value = 'Ver menos';	
     	}
     	else{
     		$('#VerMais').text('Ver mais');	
     		document.getElementById('VerMais').value = 'Ver mais';	
     	}

    }

    function myFunction() {
       var input, filter, ul, li, a, i;
       input = document.getElementById("myInput");
       filter = input.value.toUpperCase();
       ul = document.getElementById("myUL");
       li = ul.getElementsByTagName("li");
        
       if(filter==""){
         document.getElementById("myUL").style.display = "none";
       }
       else{
       	 
         document.getElementById("myUL").style.display = "block";

         	        
            for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("a")[0];
              a = a.getElementsByTagName("label")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
              } else {
                li[i].style.display = "none";
              }
            }
        
       }
        
       
    }

    function sair(){

    	document.getElementById("capa").style.opacity = "0.3"
    	document.getElementById("me").style.opacity = "0.3"
      	
	  	var htmlConfirm = "<div class='externa confirm' id='sai'><div class='col-md-4 col-xs-9 col-sm-6 col-lg-3 confirmar'> <div class='topoConfirm'><button class='fecho' onclick='fechaMessage()'>X</button> </div> <div class='conteudoConfirm'> <i class='fas fa-question iconeConfirm'></i> <h3 style='display:  block; margin-top: 10px;'>  Deseja sair? </h3> </div> <div class='botoesConfirm'> <a href='desloga.php'>  <button class='botaoPrimario'>SIM</button> </a> <button class='botaoSecundario' onclick='fechaMessage()' >NÃO</button></div>			</div></div>";

	  	document.body.innerHTML += htmlConfirm;      

		
	      		
      	
      }

      function fechaMessage(){
      	var el = document.getElementById('sai');
		el.remove();
		document.getElementById("conteudo").style.opacity = "1";
		document.getElementById("conteudo").style.pointerEvents = "all";
		document.getElementById("capa").style.opacity = "1";
		document.getElementById("me").style.opacity = "1"
		document.getElementById("roda").style.opacity = "1";
      }

		

		function slide(){			

            $('.responsive').slick($opts);            
            
		}

	</script>

</html>