<?php Painel::verificaPermissaoPaginaMotoboy(0); ?>
<section class="home">
	<h1>Editar Senha</h1>
 		<div class="container-home w100">
 			<div class="container-single w100">
 					<?php 
 					if (isset($_POST['acao'])) {
 						$myIDMotoboy = $_SESSION['myIDMotoboy'];
 						$senha = $_POST['senha'];
 						if ($senha == '') {
 							Painel::alert('erro','Campo não foi preenchido');
 						}else{
 							Painel::editarContaMotoboy($senha,$myIDMotoboy);
 							Painel::alert('sucesso','Senha editada com sucesso!');
 						}	
 					}
 					 ?>
 				<form method="post" class="editar-senha">
 				
 					<label>Nova senha</label>
 					<br>
 					<input type="text" name="senha">
 					<input type="submit" name="acao" value="Editar" required>
 				</form>
 			</div><!--container-single-->		
 		</div><!--contaier-home-->
 </section><!--home-->