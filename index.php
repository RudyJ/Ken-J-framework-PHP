<?php

        session_start();
        define("MODELS", "app/models/");
		define("VIEWS", "app/views/");
		define("CONTROLLERS", "app/controllers/");
	
        require_once('system/system.php');
        require_once('system/controller.php');
		require_once('system/model.php');
        
        function __autoload($file){
			if(file_exists(MODELS.$file.'.php')){
				require_once(MODELS.$file.'.php');
			}else{
				die("Model n&atilde;o encontrado.");
			}
		}
        
        $start	=	new System;
		$start->run();
  
?>