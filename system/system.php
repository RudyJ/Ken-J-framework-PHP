<?php
	
	/*
	URLs :
	
	www.site.com/controller/action/params
	
	
	*/
	
	class System{
		
		private $_url;
		private $_explode;
		public $_controller;
		public $_action;
		public $_params;
		
		public function __construct(){
			$this->setUrl();
			$this->setExplode();
			$this->setController();
			$this->setAction();
			$this->setParams();
            //$this->validaSession(); // Configurar nome da $_SESSION
                        
			}
		

        private function setUrl(){
			$url	=	isset($_GET["url"])?$_GET["url"]:"index/index";
			$this->_url	=	$url;
			}
		
		private function setExplode(){
			$this->_explode	=	explode("/", $this->_url);
			}
		
		private function setController(){
			$this->_controller	=	$this->_explode[0];
			}
		
		private function setAction(){
			$ac		=	($this->_explode[1] == "")?"index":$this->_explode[1];
			$this->_action	=	$ac;
			}
		
		private function setParams(){
			
			$url	=	$this->_explode;
			
			unset($url[0], $url[1]);// elimina os 2 indices
			if($url == NULL)
				array_pop($url);
				
			if(empty($url)){
				
				$this->_params	=	"vazio";
				
				
				}else{
					
					$this->_params	=	$url;
					
				}
			
			}
			
		public function getParam($name){
			return $this->_params[$name];
			}
                                    
		 public function validaSession(){
					// CONFIGURAR NOME DA $_SESSION
					// DECIDIR ONDE SERÁ FEITO O LOGIN PARA NÃO FAZER UM LOOP DE REDIRECIONAMENTO
					if($this->_controller != "auth"): // SE FOR DIFERENTE DE AUTH
							if(!isset($_SESSION["VALOR"])  ||  $_SESSION["VALOR"] == ""){
								// AJUSTAR HREF PARA O LINK QUE FAZ LOGOUT
								echo "<script> window.location.href='/auth/logout';</script>";
							}
					endif;

                                    }	                        
                        
		public function run(){
			
			$controller_path	=	CONTROLLERS.$this->_controller."Controllers.php";// inclui o controller específico da página
			
			if(file_exists($controller_path)){// SE HOUVER ARQUIVO
					
					require_once($controller_path);
					$app	=	new $this->_controller();
					$action	=	$this->_action;
					$app->$action();
					
					}else{// SE NÃO HOUVER ARQUIVO DÁ ERRO 404
					
					require(CONTROLLERS."notFoundControllers.php");
					$app	=	new notFoundController();
					$app->_404();
								
						
						}
					
					
					}
		
                
                                        
		
}

?>