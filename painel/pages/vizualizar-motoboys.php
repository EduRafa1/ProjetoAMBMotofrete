<?php Painel::verificaPermissaoPagina(2); ?>
<section class="home">
	<h1>Todos os Motoboys</h1>
	<?php 
 				$dadosMotoboy = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro-motoboy`');
 				$dadosMotoboy->execute();
 				$dadosMotoboy = $dadosMotoboy->fetchAll();
 				foreach ($dadosMotoboy as $key => $value) {
 					if ($value['vinculo_empresa'] == '') {
 						# code...
 					
 				?>
 		<div class="container-home w100">
 			<div class="container-single w100">
 				<div class="motoboy">
 					 <div class="img-motoboy">

 					 	<img src="uploads/dudu.jpg">
 					 </div><!--img-motoboy-->
 					 <div class="info-motoboy">
 					 	<div class="info-single">
 					 		<span>Nome: <?php echo $value['nome'] ?> </span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>CNPJ ou CPF: <?php 
 					 		if ($value['cnpj_pj'] == '') {
 					 			echo $value['cpf'];
 					 		}else{
 					 			echo $value['cnpj_pj'];
 					 		}
 					 		 ?></span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>Cep: <?php echo $value['cep']; ?></span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>Foto do rg: ...</span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>Foto do cnh: .....</span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>Contato: <?php echo $value['contato'] ?></span>
 					 	</div><!--info-single--->
 					 	<div class="info-single">
 					 		<span>Formato de Contrato: <?php echo $value['formato_de_contrato'] ?></span>
 					 	</div><!--info-single--->
 					 </div><!--info-motoboy-->

 					 <div class="clear"></div>
 					
 				</div><!--motoboy-->

 			</div><!--container-single-->
 			
 		</div><!--contaier-home-->
 		<?php }} ?>
 </section><!--home-->