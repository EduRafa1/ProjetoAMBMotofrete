<?php 
	include('../config.php');
	if (isset($_GET['exit'])) {
		Painel::sair();
		echo "sair";
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=5.0">
 	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/painel.css">
 	<title>Painel de Controle | AMB</title>
 </head>
 <body>
 	<div class="menu">
 		<div class="container-menu">
 		<div class="session-menu">
	 			<div class="imagem-perfil-padrao">
	 				<i class="fas fa-user "></i>
	 			</div><!--imagem-perfil-padrao-->

	 		</div><!--session-menu-->
	 		<div class="info-basicas">
	 			<h4><?php 
	 				if (isset($_SESSION['nomeEmpresa'])) {
	 					echo $_SESSION['nomeEmpresa'];
	 				}else{
	 					echo $_SESSION['nome'];
	 				}
	 			 ?></h4>
	 			<p><?php if(isset($_SESSION['cnpj'])) {
	 				echo 'cnpj - '.$_SESSION['cnpj'];
	 			}else if(isset($_SESSION['cpf'])){
	 				echo 'cpf - '.$_SESSION['cpf'];
	 			}

	 			 ?></p>
	 		</div><!--info-basicas-->
	 	</div><!--container-menu-->
	 	<form class="form-menu" method="get">
	 		
	 		<div class="form-menu-single title" <?php Painel::verificaPermissao(1); ?>>
	 			<button><h3>Motoboys</h3></button>
		 	</div>
		 	<div class="form-menu-single " <?php Painel::verificaPermissao(2); ?>>
	 			<button name="vizualizar-motoboys" ><span>Vizualizar Motoboys</span></button>
	 		</div><!--form-menu-single-->
		 	<div class="form-menu-single "<?php Painel::verificaPermissao(1); ?>>
	 			<button name="meus-motoboys"><span>Meus Motoboys</span></button>
	 		</div><!--form-menu-single-->
	 		<div class="form-menu-single " <?php Painel::verificaPermissao(1); ?>>
	 			<button name="cadastrar-motoboy"><span>Cadastrar Motoboy</span></button>
	 		</div><!--form-menu-single-->
	 		<div class="form-menu-single" <?php Painel::verificaPermissao(1); ?>>
	 			<button name="excluir-motoboy"><span>Desvincular Motoboy</span></button>
	 		</div><!--form-menu-single-->
	 		<div class="form-menu-single title">
	 			<h3>Adiministração do Painel</h3>
	 		</div>
	 		<div class="form-menu-single"<?php Painel::verificaPermissao(1); ?>>
	 			<button name="editar-conta"><span>Editar Conta</span></button>
	 		</div><!--form-menu-single-->
	 		<div class="form-menu-single"<?php Painel::verificaPermissaoMotoboy(0); ?>>
	 			<button name="editar-conta-motoboy"><span>Editar Conta</span></button>
	 		</div><!--form-menu-single-->
	 	</form><!--form-menu-->
 	</div><!--menu-->

 	<header class="header"> 
 		<div class="container">
 			<i class="fas fa-bars  bars"></i>
 			<div class="menu-header w50 right">
 				<form method="get">
 				<li><button name="home"><i class="fas fa-home"></i> Pagina Inicial</button></li>
 				<li><button name="exit"><i class="fas fa-sign-out-alt"></i> Sair</button></li>
 				</form>
 			</div><!--menu-header-->
 		</div><!--contaner-->
 	</header>


 	<main>
 		
 		<?php
 		if (isset($_GET['home'])) {
 			include('pages/home.php');
 			
 		}if (isset($_GET['vizualizar-motoboys'])) {
 			include('pages/vizualizar-motoboys.php');	
 			
 		}if (isset($_GET['meus-motoboys'])) {
 			include('pages/meus-motoboys.php');	
 			
 		}if (isset($_GET['cadastrar-motoboy'])) {
 			include('pages/cadastrar-motoboy.php');	
 			
 		}if (isset($_GET['excluir-motoboy'])) {
 			include('pages/excluir-motoboy.php');	
 			
 		}if (isset($_GET['editar-conta'])) {
 			include('pages/editar-conta.php');	
 			
 		}if (isset($_GET['editar-conta-motoboy'])) {
 			include('pages/editar-conta-motoboy.php');	
 			
 		}
 		
 			
 		 ?>
 	</main>
 <script src="js/jquery.js"></script>
 <script src="js/menu.js"></script>
 </body>
 </html>