<?php

	session_start();
	
	if(@$_SESSION['perfil'] != '1'){ // SE NÃO ESTIVER LOGADO COMO ADM
		header('location: teste.php');
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Usuários | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body>
		
		<?php include 'php/header.php' ?>
		<h1>Usuários</h1>
		<main id='listar_usuarios' class='center'>
			<?php
				include 'conexao.php';
				@$usuarios = select('usuarios');
				foreach(@$usuarios as $usuario){
					echo "<div class='ficha'>";
						echo "
							<span>Id: ".@$usuario['id']."</span><br>
							<span>Nome: ".@$usuario['nome']."</span><br>
							<span>E-mail: ".@$usuario['email']."</span><br>
							<span>Perfil: ";
							
							if(@$usuario['perfil'] == '1')
								echo "Administrador";
							else{
								echo "Comum";
							}
							
							echo"</span><br><br>";
							echo "<a href='editar_usuario.php?id=".@$usuario['id']."'><input type='button' value='Editar' class='btn_inicial'></a>";
						echo "<input type='button' value='Excluir' class='btn_inicial abrir_confirmacao'>";
						
						echo "
							<div class='confirmacao hidden'>
								Você tem certeza?<br>
								<input type='button' value='Não' class='nao'>
								<input type='button' value='Sim' class='excluir'>
							</div>
							";
							echo "<input type='hidden' value='".@$usuario['id']."'>";
					echo "</div>";
				}
			?>
		</main>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				
				var id_usuario;
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
					
					id_usuario = $(ficha).find('input[type=hidden]').val();
					
					$.ajax({
						url: "ajax/excluir_usuario.php",
						type: "POST",
						datatype: "text",
						data: {'id_usuario': id_usuario},
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