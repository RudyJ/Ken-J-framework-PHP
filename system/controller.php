<?php
	
	class Controller extends System{
		
		protected function openPage($pagina, $dados = NULL, $lista = NULL){
			
			if(file_exists( VIEWS .$pagina.'.phtml')){
				
					if($dados	!=	NULL):
						extract($dados, EXTR_PREFIX_ALL, 'view');
						return require_once( VIEWS .$pagina.'.phtml');
						exit();
					else:
						return require_once( VIEWS .$pagina.'.phtml');
						exit();
					endif;
					
					
			}else{ 
			
				return require_once( VIEWS . '404.phtml');
				exit();
			
			}
	
		}
	
	
	}


?>