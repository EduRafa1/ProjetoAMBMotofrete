<?php 

	class Cadastro{

		public static function cadastrar($nome_empresa,$cnpj,$representante,$ramo_de_atividade,$entregadores,$telefone,$email,$cep,$rua,$bairro,$cidade,$estado,$numero_casa,$senha,$select_consultor,$select_agente,$myID,$permissao){

			$sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.cadastro` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			$sql->execute(array($nome_empresa,$cnpj,$representante,$ramo_de_atividade,$entregadores,$telefone,$email,$cep,$rua,$bairro,$cidade,$estado,$numero_casa,$senha,$select_consultor,$select_agente,$myID,$permissao));

		}
		public static function usuarioExiste($cnpj){
			$sql = MySql::conectar()->prepare('SELECT id FROM `tb_admin.cadastro` WHERE cnpj = ?');
			$sql->execute(array($cnpj));
			if ($sql->rowCount() == 1) {
				return true;
			}else{
				return false;
			}
		}
		public static function usuarioExisteMotoboy($login){
			$sql = MySql::conectar()->prepare('SELECT id FROM `tb_admin.cadastro-motoboy` WHERE login = ?');
			$sql->execute(array($login));
			if ($sql->rowCount() == 1) {
				return true;
			}else{
				return false;
			}
		}

		public static function cadastrarMotoboy($nome,$naturalidade,$sexo,$estado_civil,$pai,$mae,$data_de_nacimento,$rg,$emissor_uf,$data_de_emissao,$cpf,$foto_rg,$foto_cnh,$doc_moto,$comprovante_endereco,$cep,$rua,$bairro,$cidade,$estado,$numero,$telefone,$email,$login,$senha,$d_nome,$d_rg,$d_cpf,$empresa_atual,$cnpj_pj,$telefone2,$contato,$forma_de_contrato,$vinculo_empresa,$myIDMotoboy,$permissao){
			$sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.cadastro-motoboy` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			$sql->execute(array($nome,$naturalidade,$sexo,$estado_civil,$pai,$mae,$data_de_nacimento,$rg,$emissor_uf,$data_de_emissao,$cpf,$foto_rg,$foto_cnh,$doc_moto,$comprovante_endereco,$cep,$rua,$bairro,$cidade,$estado,$numero,$telefone,$email,$login,$senha,$d_nome,$d_rg,$d_cpf,$empresa_atual,$cnpj_pj,$telefone2,$contato,$forma_de_contrato,$vinculo_empresa,$myIDMotoboy,$permissao));

		}
		//processo de registrar o motoboy no painel para a empresa
		public static function vincularMotoboy($idMotoboy){
			$sql = MySql::conectar()->prepare('SELECT vinculo_empresa FROM `tb_admin.cadastro-motoboy` WHERE myIDMotoboy = ?');
			$sql->execute(array($idMotoboy));
			if ($sql->rowCount() == 1) {
				return true;
				
			}else{
				return false;
			}
		}
		public static function updateVinculoMotoboy($idEmpresa,$idMotoboy){
			$update = MySql::conectar()->prepare('UPDATE `tb_admin.cadastro-motoboy` SET vinculo_empresa = ? WHERE myIDMotoboy = ?');
				$update->execute(array($idEmpresa,$idMotoboy));
		}

		public static function desvincularMotoboy($idEmpresa,$idMotoboy){
			$update = MySql::conectar()->prepare('UPDATE `tb_admin.cadastro-motoboy` SET vinculo_empresa = ? WHERE myIDMotoboy = ?');
				$update->execute(array($idEmpresa,$idMotoboy));
		}


		public static function imagemValida($imagem){
		if ($imagem['type'] == 'image/jpeg' ||	$imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png') {
			return true;
		
		}else{
			return false;
		}
	}
			
		
		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = 'foto'.uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if (move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)) {
				return $imagemNome;
			}else{
				return false;
			}
			
			}

		public static function deleteFile($file){
		@unlink(BASE_DIR_PAINEL.'/uploads/'.$file);
	}

	}

 ?>