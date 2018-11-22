<?php
	try{
		@$conex = new PDO('mysql:host=localhost;dbname=Vocacional','root','');
	}
	catch(PDOException $e){
		#var_dump(@$e);
	}
	
	include_once 'php/funcoes_banco.php';
?>