<?php
	include '../conexao.php';
	
	$id_usuario = $_POST['id_usuario'];
	
	echo delete('usuarios','id = '.$id_usuario);
	
	
?>