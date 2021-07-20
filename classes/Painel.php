<?php 

	class Painel{
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}
		public static function alert($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo '<div class="box-alert sucesso">'.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro">'.$mensagem.'</div>';
				
			}
		}
		public static function sair(){
			session_destroy();
			header('Location: index.php');
		}

		public static function verificaPermissao($permissao){
			if ($_SESSION['permissao'] >= $permissao) {
				return;
			}else{
				echo "style='display:none'";
			}
		}
		public static function verificaPermissaoMotoboy($permissao){
			if ($_SESSION['permissao'] <= $permissao) {
				return;
			}else{
				echo "style='display:none'";
			}
		}
		function verificaPermissaoPagina($permissao){
			if ($_SESSION['permissao'] >= $permissao) {
				return;
			}else{
				include('pages/permissao-negada.php');

				die();
			}
		}
		function verificaPermissaoPaginaMotoboy($permissao){
			if ($_SESSION['permissao'] <= $permissao) {
				return;
			}else{
				include('pages/permissao-negada.php');

				die();
			}
		}
		public static function editarConta($senha,$myID){
			$sql = MySql::conectar()->prepare('UPDATE `tb_admin.cadastro` SET senha = ? WHERE myID = ?');
			$sql->execute(array($senha,$myID));

		}
		public static function editarContaMotoboy($senha,$myIDMotoboy){
			$sql = MySql::conectar()->prepare('UPDATE `tb_admin.cadastro-motoboy` SET senha = ? WHERE myIDMotoboy = ?');
			$sql->execute(array($senha,$myIDMotoboy));

		}
		public static function getEmpresas(){
			$sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro`');
			$sql->execute();
			return $sql->fetchAll();
		}
		public static function getMotoboys(){
			$sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro-motoboy`');
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function getMotoboysSemVinculo($vinculo_empresa){
			$sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro-motoboy` WHERE vinculo_empresa = ?');
			$sql->execute(array($vinculo_empresa));
			return $sql->fetchAll();
		}


		


	}

 ?>