<?php
	include '../conexao.php';
	
	$id_curso = $_POST['id_curso'];
	
	$select = sql('select likes from cursos where id = '.$id_curso);
	$select = $select[0][0];
	
	$select++;
	
	include '../conexao.php';
	$sql = 'update cursos set `likes` = '.$select.' where id = '.$id_curso;
	sql($sql);
	print_r($select);
?>