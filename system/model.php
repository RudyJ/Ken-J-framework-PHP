<?php

	
	class Model{
		protected $_db;
		public $_tabela;
		public function  __construct(){
			// AJUSTAR CONEXÃO COM O BANCO DE DADOS
            $this->_db	=	new PDO('mysql:host=localhost;dbname=BANCO DE DADOS', 'USUÁRIO', 'SENHA');
			}
		
		// CRUD - create / read / update / delete
	
		public function create( Array $dados ){
                    $campos = implode(", ", array_keys($dados));
                    $valores = "'".implode("','", array_values($dados))."'";
                    return $this->_db->query(" INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ");
                }
		
		public function read( $where = null, $limit = null, $offset = null, $orderby = null, $groupby = null){
                    $where = ($where != null ? "WHERE {$where}" : "");
                    $limit = ($limit != null ? "LIMIT {$limit}" : "");
                    $offset = ($offset != null ? "OFFSET {$offset}" : "");
                    $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
                    $groupby = ($groupby != null ? "GROUP BY `{$groupby}`" : "");
                    $q = $this->_db->query(" SELECT * FROM `{$this->_tabela}` {$where} {$groupby} {$orderby} {$limit} {$offset} ");
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    return $q->fetchAll();
                }

                public function update( Array $dados, $where ){
                    foreach ( $dados as $ind => $val ){
                        $campos[] = "{$ind} = '{$val}'";
                    }
                    $campos = implode(", ", $campos);
                    return $this->_db->query(" UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ");
                }

                public function delete( $where ){
                    return $this->_db->query(" DELETE FROM `{$this->_tabela}` WHERE {$where} ");
                }
	
	
	}
	
	

?>