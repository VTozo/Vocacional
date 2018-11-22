<?php
	include '../conexao.php';
	
	$id_curso = $_POST['id_curso'];
	
	echo delete('cursos','id = '.$id_curso);
?>