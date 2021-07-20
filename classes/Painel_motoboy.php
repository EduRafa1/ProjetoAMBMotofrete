<?php 

	class Painel_motoboy{

		public static function getEmpresa($idEmpresa){
			$sql = MySql::conectar()->prepare('SELECT nomeEmpresa FROM `tb_admin.cadastro` WHERE myID = ?');
			$sql->execute(array($idEmpresa));
			
		}


	}

 ?>