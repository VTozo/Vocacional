<?php

	session_start();
	
	if(!@$_SESSION['perfil']){ // SE NÃO ESTIVER LOGADO
		header('location: index.php');
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sobre | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body id='sobre'>
		
		<?php include 'php/header.php' ?>
		<h1>Sobre</h1>
		<main class='center'>
			<br><br>
			Este site foi desenvolvido com fins didáticos,<br>
			e não visa obtenção de lucro.<br><br>
			Todos os direitos reservados - 2017.<br>
			©Vinicius Tozo<br><br><br><br>
			<a href='teste.php'><input type='button' value='Voltar para página principal'></a>
		</main>
	</body>
</html>