<?php 
$empresasCadastradas = Painel::getEmpresas();
$motoboysCadastrados = Painel::getMotoboys();
$motoboysSemVinculo = Painel::getMotoboysSemVinculo('');
	

 ?>

<section class="home">
	<h1>Pagina Inicial</h1>
 		<div class="container-home w100" <?php Painel::verificaPermissaoMotoboy(0) ?>>
 			<div class="container-single w100 center pag-home" >
 				
 				<h2 ><?php echo 'Meu ID - '.$_SESSION['myIDMotoboy'] ?></h2>
 			</div><!--container-single-->	
 		</div><!--contaier-home-->
 		<div class="container-home w100" <?php Painel::verificaPermissao(1) ?>>
 			<div class="container-single w100 center pag-h" >
 				<div class="home-single w50 left" style="background-color: #6f02b8">
 					<span>Empresas Cadastradas</span>
 					<p><?php echo count($empresasCadastradas); ?></p>
 				</div><!--home-single-->
 				<div class="home-single w50 right" style="background-color: #12ad03">
 					<span>Motoboys Cadastrados</span>
 					<p><?php echo count($motoboysCadastrados); ?></p>
 				</div><!--home-single-->
 				<div class="home-single w100 right" style="background-color: #00678a">
 					<span>Motoboys sem vinculo</span>
 					<p><?php echo count($motoboysSemVinculo); ?></p>
 				</div><!--home-single-->
 				<div class="clear"></div>
 			</div><!--container-single-->	
 		</div><!--contaier-home-->
 		
 </section><!--home-->