<!DOCTYPE html>
<html>
<head>
	<title>Game Now</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#000">
	<link rel="icon" type="image/png" href="favicon3.png" />
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

	 	if(!$logado){
	 		header("Location: index.php");
	 	}
	 	else{
	 		if (!$administrador!=0) {
	 			header("Location: index.php");		
	 		}
	 	}

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
			 <div class="container input-group  col-xs-11 col-md-11 col-lg-11 col-sm-11 pesq" style="float: left; padding-left: 7%;padding-right: 5%;">
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
		    				width:15px;' >3</span></li></button></a>
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
				<li><a href='acessorios.php'>Acessórios</a></li>
			</ul>
		</li>
		<?php if (!$logado) {
			
		}
		else{
			
			echo "<li><a href='avaliacao.php'>Avaliações</a>";
			if ($administrador!=0) {
				echo "
				<li><a data-toggle='collapse' data-target='#cadastros'> Cadastra » </a>
				<ul class='collapse' id='cadastros'>
					<li><a href='cadastraJogo.php'>Jogos</a></li>
					<li><a href='cadastraConsole.php'>Consoles</a></li>
					<li><a href='cadastraAcess.php'>Acessórios</a></li>
				</ul>
				</li>
				";
			}
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

	<div class="conteudo container" id="conteudo" style="padding-left: 0; padding-right: 0;">

	

		<section id="pro">
			
			<div class="col-md-12">
				<div class="tituloMenu" style="">
					<h3>Cadastra jogo</h3>
				</div>

				<form  enctype="multipart/form-data" class='col-md-12 cadastra' method='POST' action='recebeJogo.php' style="background: #040D1C; padding-top: 20px; padding-bottom: 10px; margin-top: 0; float:left;">
					<div class='form-group col-xs-7'>
					  <label for='txtNome' class='col-2 col-form-label'>Nome</label>
					  <div class='col-10'>
					    <input class='form-control text' type='text' required='' placeholder='Preencha o nome do jogo' autocomplete='off' id='txtNome' name='txtNome'>
					  </div>
					</div>

					<div class='form-group col-xs-5'>
					  <label for='txtPreco' class='col-2 col-form-label'>Preço</label>
					  <div class='col-10'>
					    <input class='form-control text' type='text' required='' placeholder='R$ 00,00' id='txtPreco' name='txtPreco' style="text-align: left;">
					  </div>
					</div>	

					<div class='form-group col-xs-12 col-sm-6'>
					  <label for='txtGenero' class='col-2 col-form-label'>Genero</label>
					  <div class='col-10'>
					  	<select class='form-control text' required='' name="txtGenero" autocomplete='off'  placeholder='Preencha o genero do jogo'>

					  		<?php 
						  		
					  			mysqli_query($conectar, "SET NAMES utf8");
							 	$dados = mysqli_query($conectar, "SELECT * FROM genero_produto");	    

							    if($dados === FALSE) { 
								   die(mysqli_error($conectar));
								}  

							    $linha = mysqli_fetch_assoc($dados);
							    $total = mysqli_num_rows($dados);
						     

								if($total){ do{

						?>

					      <option value="<?php echo($linha['Id']) ?>"><?php  echo ($linha['Descricao']) ?></option>

					     <?php 
					     }while ($linha = mysqli_fetch_assoc($dados)); 

							mysqli_free_result($dados);}

					         ?>
					  	</select>					    
					  </div>
					</div>

					<div class='form-group col-xs-12 col-sm-6'>
					  <label for='txtFoto' class='col-2 col-form-label'>Foto</label>
					  <div class='col-10'>
					  	<div class="input-group">
					  		<input type="text" class="form-control text" readonly style="background: #15233b;">
		  	                <label class="input-group-btn">
		  	                    <span class="btn btn-primary" style='background: #1A56C5; border: 0;'>
		  	                        Procurar&hellip; <input type="file" name="txtFoto" required="" accept="image/*"  style="display: none;" multiple>
		  	                    </span>
		  	                </label>
		  	                
		  	            </div>		    					  	
					  </div>					  
					</div>

					<div class='form-group col-xs-12'>
					  <label for='txtRequisitos' class='col-2 col-form-label'>Requisitos</label>
					  <div class='col-12'>
					  	<textarea required="" rows="4" name="txtRequisitos" id="txtRequisitos" class="form-control text" style="resize: vertical;"></textarea>
					  </div>					  
					</div>
					<div>
						<input type='submit' class='btn btn-logar btn-lg col-xs-12 center' name='btnEnviar' value='CADASTRAR' style="border-radius:6px; ">	
					</div>
				
					

				</form>


			</div>


		</section>		

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

						<div class='topoConfirm'><button class='fecho' onclick='fechar()' for='men'>X</button> </div>

							<ul class='nav nav-tabs'>
						  		<li class='active col-md-6 col-xs-6 col-sm-6' ><a data-toggle='tab' href='#log'>LOGIN</a></li>			    
						  		<li class='col-md-6 col-xs-6 col-sm-6 col-lg-6' ><a data-toggle='tab' href='#cad' style='margin: 0;'>CADASTRO</a></li>	
						  		
							</ul>

						  	<div class='tab-content '>

						    	<div id='log' class='tab-pane fade in active'>
						     		<form class='col-md-12 col-xs-12 col-sm-12' method='POST' action='loga.php' style='padding-top: 20px;'>

										<div class='form-group col-md-8 form ");

										if(!empty($_GET)){
											$erro = $_GET['falha'];

											if($erro=="erro"){
												echo "falhou";
											}				
										}					

										echo ("'>
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
										");


											
										if(!empty($_GET)){
											if($erro=="erro"){
												echo "																
													<label class='col-md-12 fail'>Login ou senha incorretos!</label>
												";
											}
										}
										

										echo ("


										<input type='submit' class='btn btn-logar btn-lg btn-block ' name='btnEnviar' value='LOGAR'>

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
	<script src="jquery/dist/jquery.inputmask.bundle.min.js"></script>

	
  	<script src="bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript">
	
	  var qtdP = 12;		

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

      function desativaConteudo(fail){
		  if(document.getElementById("men").checked == false){
		  	document.getElementById("conteudo").style.opacity = "0.3";		  	
		  	document.getElementById("roda").style.opacity = "0.3";
		  	document.getElementById("conteudo").style.pointerEvents = "none";
		  	if(fail = true){
		  		document.getElementById("nLogado").style.pointerEvents = "all";
		  	}
		  	<?php 
			  	if(!$logado){
	  				echo "document.getElementById('nLogado').style.visibility = 'visible';";
	  				echo "\ndocument.getElementById('capa').style.opacity = '0.3';";
	  				echo "\ndocument.getElementById('me').style.opacity = '0.3';";

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
      				echo "\ndocument.getElementById('conteudo').style.opacity = '1'"; 				
      				
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
      				echo "\ndocument.getElementById('conteudo').style.opacity = '0.3'";
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
		      	var htmlConfirm = "<div class='externa confirm' id='car'><div class='col-md-4 col-xs-9 col-sm-6 col-lg-3 confirmar'> <div class='topoConfirm'><button class='fecho' onclick='fechaCarrinho()'>X</button> </div> <div class='conteudoConfirm'> <i class='fas fa-question iconeConfirm'></i> <h3 style='display:  block; margin-top: 10px;'> Deseja adicionar " + produto + " ao carrinho? </h3> </div> <div class='botoesConfirm'> <button class='botaoPrimario' onclick='addCarrinho("+id+")'>SIM</button><button class='botaoSecundario' onclick='fechaCarrinho()' >NÃO</button></div>			</div></div>";

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
		document.getElementById("me").style.opacity = "1";
		// document.body.style.overflowY = "scroll";
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

      function verificaCarrinho(prod){      
        	

            <?php 
            	if(!$logado){
            		?>
            		$("#bolinhaa").css('visibility', 'hidden');
            		<?php 
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
		   	<?php
		   		if($total > 0 ){


		   	  ?>
		    $("#bolinhaa").text(<?php echo $total; ?>);
        	
        	<?php }
        	else{?>
        		$("#bolinhaa").css('visibility', 'hidden');
        		<?php 
        	} ?>
		     
       }

       $(document).ready(function(){       	
	       	$("#logo").fadeIn("slow");	       	
	       	$(".produto").fadeIn("slow");	       	
	       	
	       	verificaCarrinho();    
	       	<?php 
	       	if(!empty($_GET)){
				$erro = $_GET['falha'];

				if($erro=="erro"){
					header('Location:erro.php');
				}				
				else{?>
					document.getElementById("conteudo").style.opacity = "0.3";
		  			document.getElementById("roda").style.opacity = "0.3";
		  			document.getElementById("capa").style.opacity = "0.3";
		  			document.getElementById("me").style.opacity = "0.3";
		  			document.getElementById("logo").style.opacity = '1';
		  		
					var htmlConfirm = "<div class='externa confirm' id='car'><div class='col-md-4 col-xs-9 col-sm-6 col-lg-3 confirmar'> <div class='topoConfirm'><button class='fecho' onclick='fechaCarrinho()'>X</button> </div> <div class='conteudoConfirm'> <i class='fas fa-question iconeConfirm'></i> <h3 style='display:  block; margin-top: 10px;'> Sucesso! </h3> </div> <div class='botoesConfirm'><button class='botaoSecundario' onclick='fechaCarrinho()' >OK</button></div>			</div></div>";

		      	document.body.innerHTML += htmlConfirm;   
		      	<?php 
				}
			}

			?>



	       
       });

      
		var	controle;
		var distance;

		

		


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

    	document.getElementById("capa").style.opacity = "0.3";
    	document.getElementById("me").style.opacity = "0.3";
      	
	  	var htmlConfirm = "<div class='externa confirm' id='sai'><div class='col-md-4 col-xs-9 col-sm-6 col-lg-3 confirmar'> <div class='topoConfirm'><button class='fecho' onclick='fechaMessage()'>X</button> </div> <div class='conteudoConfirm'> <i class='fas fa-question iconeConfirm'></i> <h3 style='display:  block; margin-top: 10px;'>  Deseja sair? </h3> </div> <div class='botoesConfirm'> <a href='desloga.php'>  <button class='botaoPrimario'>SIM</button> </a> <button class='botaoSecundario' onclick='fechaMessage()' >NÃO</button></div>			</div></div>";

	  	document.body.innerHTML += htmlConfirm;      
	      		
      	
      }

      <?php
	      if(!empty($_GET)){
			$erro = $_GET['falha'];

			if($erro=="erro"){
				echo "					
					
					desativaConteudo(true);
				";
			}										
		  }
			
	  ?>



	  // Deste formulário

	  $(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	  });

	  // We can watch for our custom `fileselect` event like this
	  $(document).ready( function() {
	      $(':file').on('fileselect', function(event, numFiles, label) {

	          var input = $(this).parents('.input-group').find(':text'),
	              log = numFiles > 1 ? numFiles + ' files selected' : label;

	          if( input.length ) {
	              input.val(log);
	          } else {
	              if( log ) alert(log);
	          }

	      });


	  });

	  	$("#txtPreco").inputmask('decimal', {
                'alias': 'numeric',                
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ".",
                'rightAlign': false,
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': '',                
                'placeholder': ''
    		});	




 




	</script>

</html>
