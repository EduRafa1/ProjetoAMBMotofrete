<?php 
	class MySql
	{

		private static $pdo;

		public static function conectar(){
			if (self::$pdo == null) {			
			try{
					self::$pdo = new PDO('mysql:host=localhost;dbname=amb','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
				// mostra o erro gerado na tela
				 echo $e->getMessage(); 
					//echo "<h4> Erro na coneção com o banco de dados MySql</h4>";

				}
			}
			return self::$pdo;

			
		}

	}

 ?>