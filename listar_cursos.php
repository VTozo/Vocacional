<?php

	session_start();
	
	if(@$_SESSION['perfil'] != '1'){ // SE NÃO ESTIVER LOGADO COMO ADM
		header('location: teste.php');
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cursos | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body>
		
		<?php include 'php/header.php' ?>
		<h1>Cursos</h1>
		<main id='listar_cursos' class='center'>
			<?php
				include 'conexao.php';
				@$cursos = select('cursos');
				foreach(@$cursos as $curso){
					echo "<div class='ficha'>";
						echo "
							<span>Id: ".@$curso['id']."</span><br>
							<span>Nome: ".@$curso['nome']."</span><br>
							<span>Atributos: (".@$curso['atributos'].")</span><br>
							<br><br>";
							
						echo "<a href='editar_curso.php?id=".@$curso['id']."'><input type='button' value='Editar' class='btn_inicial'></a>";
						echo "<input type='button' value='Excluir' class='btn_inicial abrir_confirmacao'>";
						
						echo "
							<div class='confirmacao hidden'>
								Você tem certeza?<br>
								<input type='button' value='Não' class='nao'>
								<input type='button' value='Sim' class='excluir'>
							</div>
							";
						
						echo "<input type='hidden' value='".@$curso['id']."'>";
					echo "</div>";
				}
			?>
		</main>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				
				var id_curso;
				var ficha;
				
				$('.abrir_confirmacao').click(function(){
					$(this).siblings('.confirmacao').show();
					$(this).siblings().find('.btn_inicial').hide();
					$(this).hide();
				});
				
				$('.nao').click(function(){
					$(this).parents('.ficha').find('.btn_inicial').show();
					$(this).parents('.confirmacao').hide();
				});
				
				$('.excluir').click(function(){
					ficha = $(this).parents('.ficha');
					
					id_curso = $(ficha).find('input[type=hidden]').val();

					$.ajax({
						url: "ajax/excluir_curso.php",
						type: "POST",
						datatype: "text",
						data: {'id_curso': id_curso},
						success: function(data){
							/*alert(data);*/
							ficha.animate({'opacity':0},200,function(){
								$(this).animate({'width':0},200,function(){
									$(this).hide();
								});
							});
						}
					});
					
				});
			});
		</script>
		
	</body>
</html>