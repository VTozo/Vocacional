<?php
	function sql($sql){
		global $conex;
		$select = $conex->prepare($sql);
		$select->execute();
		
		$return = $select->fetchAll();
		$select = null;
		$conex = null;
		return $return;
	}
	function select($tabela){
		global $conex;
		$sql = "SELECT * FROM $tabela";
		$select = $conex->prepare($sql);
		$select->execute();
		
		$return = $select->fetchAll();
		$select = null;
		$conex = null;
		return $return;
	}
	function select_where($tabela,$where){
		global $conex;
		$primeiro = true;
		$sql = "SELECT * FROM $tabela WHERE $where";
		
		#echo $sql;
		$select = $conex->prepare($sql);
		$select->execute();
		
		$return = $select->fetchAll();
		$select = null;
		$conex = null;
		
		#return $sql;
		return $return;
	}
	function select_order_by($tabela,$ordem,$asc_desc){
		global $conex;
		$sql = "SELECT * FROM $tabela ORDER BY $ordem $asc_desc";
		$select = $conex->prepare($sql);
		$select->execute();
		
		$return = $select->fetchAll();
		$select = null;
		$conex = null;
		return $return;
	}
	function insert($tabela,$dados){
		global $conex;
		$primeiro = true;
		$sql = "INSERT INTO $tabela VALUES(";
		foreach($dados as $data){
			if($primeiro){
				$primeiro = false;
			}
			else{
				$sql .= ",";
			}
			$sql .= "?";
		}
		$sql .= ")";
		$select = $conex->prepare($sql);
		$select->execute($dados);
		return $sql;
	}
	function delete($tabela,$where){
		global $conex;
		$sql = "DELETE FROM $tabela WHERE $where";
		$delete = $conex->prepare($sql);
		$delete->execute();
		
		$delete = null;
		$conex = null;
		return $sql;
	}
?>