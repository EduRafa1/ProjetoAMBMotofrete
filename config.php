<?php 	
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
		$autoload = function($class){
			require_once('classes/'.$class.'.php');
		};
		spl_autoload_register($autoload);


		@define('BASE_DIR_PAINEL',__DIR__.'/painel');

 ?>