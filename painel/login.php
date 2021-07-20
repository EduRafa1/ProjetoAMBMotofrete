<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/painel.css">
	<title>Login</title>
</head>
<body>

	<main class="login">
		<div class="container">
			<div class="box-login">
				
				<?php 
				if (isset($_POST['acao'])) {
					$login = $_POST['login'];
					$senha = $_POST['senha'];

					$sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro` WHERE cnpj = ? AND senha = ?');
					$sql->execute(array($login,$senha));

					$sqlMotoboy = MySql::conectar()->prepare('SELECT * FROM `tb_admin.cadastro-motoboy` WHERE login = ? AND senha = ?');
					$sqlMotoboy->execute(array($login,$senha));

					if ($sql->rowCount() == 1) {
						//Logado com Sucesso
						Painel::alert('sucesso','Logado com sucesso');
						$info = $sql->fetch();
						$_SESSION['login'] = true;
						$_SESSION['login'] = $login;
						$_SESSION['senha'] = $senha;
						$_SESSION['nomeEmpresa'] = $info['nomeEmpresa'];
						$_SESSION['cnpj'] = $info['cnpj'];
						$_SESSION['proprietario'] = $info['proprietario'];
						$_SESSION['ramo_de_atividades'] = $info['ramo_de_atividades'];
						$_SESSION['entregadores'] = $info['entregadores'];
						$_SESSION['telefone'] = $info['telefone'];
						$_SESSION['email'] = $info['email'];
						$_SESSION['cep'] = $info['cep'];
						$_SESSION['rua'] = $info['rua'];
						$_SESSION['bairro'] = $info['bairro'];
						$_SESSION['cidade'] = $info['cidade'];
						$_SESSION['estado'] = $info['estado'];
						$_SESSION['numero'] = $info['numero'];
						$_SESSION['consultor'] = $info['consultor'];
						$_SESSION['agente'] = $info['agente'];
						$_SESSION['myID'] = $info['myID'];
						$_SESSION['permissao'] = $info['permissao'];
						header('Location: main.php');
						die();
					}else if($sqlMotoboy->rowCount() == 1){
						//motoboy logado com sucesso
						$info = $sqlMotoboy->fetch();
						$_SESSION['login'] = true;
						$_SESSION['usuario'] = $login;
						$_SESSION['senha'] = $senha;
						$_SESSION['nome'] = $info['nome'];
						$_SESSION['cpf'] = $info['cpf'];
						$_SESSION['foto_rg'] = $info['foto_rg'];
						$_SESSION['foto_cnh'] = $info['foto_cnh'];
						$_SESSION['telefone'] = $info['telefone'];
						$_SESSION['contato'] = $info['contato'];
						$_SESSION['email'] = $info['email'];
						$_SESSION['cnpj_pj'] = $info['cnpj_pj'];
						$_SESSION['formato_de_contrato'] = $info['formato_de_contrato'];
						$_SESSION['vinculo_empresa'] = $info['vinculo_empresa'];
						$_SESSION['myIDMotoboy'] = $info['myIDMotoboy'];
						$_SESSION['permissao'] = $info['permissao'];
						header('Location: main.php');
						die();

					}else{
						Painel::alert('erro','CNPJ ou senha incorreta!');
					}
				}

				 ?>
				 <h1>Efetue o Login</h1>
				<form method="post">	
					<input class="w100" type="text" name="login" placeholder="Digite o login ou CNPJ">
					<input class="w100" type="password" name="senha" placeholder="Digite a Senha">
					<input type="submit" name="acao" value="Entrar">
				</form>
			</div><!--box-login-->
		</div><!--container-->
	</main>

</body>
</html>