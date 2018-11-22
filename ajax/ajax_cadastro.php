<?php

	@$nome      = @$_POST['nome'];
	@$atributos = @$_POST['atributos'];
	@$id_usuario = @$_POST['id_usuario'];
	
	include '../conexao.php';
	@$exite_curso = select_where('cursos','nome = "'.@$nome.'"');
	@$exite_curso = count(@$exite_curso);
	
	if(@$exite_curso){
		echo '0';
	}
	else{
		include '../conexao.php';
		insert('cursos',['',@$nome,@$atributos,@$id_usuario,'0']);
		echo '1';
	}
	
?>