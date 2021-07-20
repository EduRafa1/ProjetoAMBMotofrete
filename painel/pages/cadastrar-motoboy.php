<?php Painel::verificaPermissaoPagina(1); ?>

<section class="home">
	<h1>cadastrar novo motoboy</h1>
 		<div class="container-home w100">
 			<div class="container-single w100 cadastrar-motoboy">
 				
 				<form method="post">
	 				<label>Digite o ID do motoboy</label>
	 				<?php 
 					if (isset($_POST['acao'])) {
 						$idDigitado = $_POST['idMotoboy'];
 						$idEmpresa = $_SESSION['myID'];
 						if (Cadastro::vincularMotoboy($idDigitado)) {
 							
 							Cadastro::updateVinculoMotoboy($idEmpresa,$idDigitado);
 							echo Painel::alert('sucesso','O motoboy foi cadastrado com sucesso');

 						}else{
 							echo Painel::alert('erro','ID digitado não existe!');
 						}

 					}
 					

 				 ?>
	 				<br>
	 				<input type="text" name="idMotoboy">
	 				<input type="submit" name="acao" value="enviar">
	 			</form>
 			</div><!--container-single-->
 			
 		</div><!--contaier-home-->
 </section><!--home-->