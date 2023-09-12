<!DOCTYPE html>
<html>
<head>
	<title>Loja</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>

	<?php		
	 	include_once("dadosUsuario.php");	
	?>

	<header>			

		<div class="apre">
			<img src="topo.svg">		
		</div>

	</header>

	<nav class="menu">
		<button class=" btn btn-menu" data-toggle="collapse" onclick="openNav()">               
	            <span class="glyphicon glyphicon-menu-hamburger"></span>
	        </button>
		<div class="container">
						
        </div>
		
		<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <ul>                
            <li><a href="index.php">Home</a></li>
			<li><a data-toggle="collapse" data-target="#Produtos">Produtos ▼ </a>
				<ul class="collapse" id="Produtos">
					<li><a href="">Jogos</a></li>
					<li><a href="">Consoles</a></li>
				</ul>
			</li>
			<li><a href="">Carrinho</a></li>
          </ul>          
        </div>

		
	</nav>



	<div class="conteudoLogin" style="display: flex;">

		<div class="col-md-8 col-sm-12 col-xs-12 formulario" style="margin: auto;">
			<div class="col-md-12 col-sm-12 col-xs-12 login ">

				<ul class="nav nav-tabs">
			  		<li class="active col-md-6 col-xs-6 col-sm-6" ><a data-toggle="tab" href="#log">LOGIN</a></li>			    
			  		<li class="col-md-6 col-xs-6 col-sm-6"><a data-toggle="tab" href="#cad" style="margin: 0;">CADASTRO</a></li>			    
				</ul>

			  	<div class="tab-content ">

			    	<div id="log" class="tab-pane fade in active">
			     		<form class="col-md-12 col-xs-12 col-sm-12" method="POST" action="loga.php" style="padding-top: 20px;">

							<div class="form-group col-md-8 form">
							  <label for="txtEmail" class="col-form-label">E-mail</label>
							  <div class="col-10">
							    <input class="form-control text" type="email" id="txtEmail" name="txtEmail" required="" autocomplete="off" placeholder="Digite seu e-mail">
							  </div>
							</div>

							<div class="form-group col-md-4">
							  <label for="txtSenha" class="col-2 col-form-label">Senha</label>
							  <div class="col-10">
							    <input class="form-control text" type="password" id="txtSenha" name="txtSenha" required="" placeholder="*********">
							  </div>
							</div>	

							<input type="submit" class="btn btn-logar btn-lg btn-block" name="btnEnviar" value="LOGAR">

						</form>

			    	</div>

			    	<div id="cad" class="tab-pane fade">	      
					
						<form class="col-md-12 cadastra" method="POST" action="cadastra.php">
							<div class="form-group col-md-6">
							  <label for="txtNome" class="col-2 col-form-label">Nome</label>
							  <div class="col-10">
							    <input class="form-control text" type="text" required="" placeholder="Preencha seu nome" autocomplete="off" id="txtNome" name="txtNome">
							  </div>
							</div>

							<div class="form-group col-md-6">
							  <label for="txtSobre" class="col-2 col-form-label">Sobrenome</label>
							  <div class="col-10">
							    <input class="form-control text" type="text" required="" placeholder="Preencha seu sobrenome" autocomplete="off" id="txtSobre" name="txtSobre">
							  </div>
							</div>

							<div class="form-group col-md-12">
							  <label for="txtEmail" class="col-2 col-form-label">E-Mail</label>
							  <div class="col-10">
							    <input class="form-control text" type="email" required="" placeholder="Preencha seu email" autocomplete="off" id="txtEmail" name="txtEmail">
							  </div>
							</div>

							<div class="form-group col-md-6">
							  <label for="txtSenha" class="col-2 col-form-label">Senha</label>
							  <div class="col-10">
							    <input class="form-control text" type="password" required="" placeholder="*********" id="txtSenha" name="txtSenha">
							  </div>
							</div>	

							<div class="form-group col-md-6 form">
							  <label for="txtSenha2" class="col-2 col-form-label">Confirmar Senha</label>
							  <div class="col-10">
							    <input class="form-control text" type="password" id="txtSenha2"   placeholder="*********" required="" name="txtSenha2">
							  </div>
							</div>	

							<input type="submit" class="btn btn-logar btn-lg btn-block" name="btnEnviar" value="CADASTRAR">

						</form>

			    	</div>

				</div>

			</div>
		</div>
	</div>
	

		<input type="checkbox" id="men">

		<label for="menu-usuario">
			<div class="entrar">
				<?php
					if(!$logado){
						echo("<a href='login.php'>LOGAR</a>");
					}
					else{
						echo("<label> ");
						echo($nome.' '.$sobre);
						echo(" </label>	        	
							 <a href=''>CONFIGURAÇÕES</a>
							 <a href='desloga.php'>SAIR</a>");	           	
					}
				?>
				
	        </div>

	        
	        <label class="usuario" for="men">	        	
	            <svg class="svg-icon" viewBox="0 0 20 20" for="men">
					<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
				</svg>
	        </label>
	        
	    </label>

	


	<footer>
		<!-- <h3><i>Layout desenvolvido por Gean Cesar</i></h3> 	 -->
	</footer>

</body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		

      function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";		  
		  document.getElementById("conteudo").style.opacity = "0.3";
		  document.getElementById("conteudo").style.pointerEvents =  "none";
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";          
          document.getElementById("conteudo").style.opacity = "1";
          document.getElementById("conteudo").style.pointerEvents =  "all";              
      }
	</script>

</html>