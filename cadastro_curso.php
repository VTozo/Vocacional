<?php
	session_start();
	if(!@$_SESSION['perfil']){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de cursos | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body>
		
		<?php include 'php/header.php' ?>
		<h1>Cadastro de curso</h1>
		<main id='cadastros'>
			<div id='form'>
				Nome:
				<br>
				<input type='text' name='nome' maxlength='50' required><br>
				<br>
				
				<section>
					Área:<br><br><br>
					<input type='radio' name='attr0' value=' exatas ' checked>Exatas<br>
					<input type='radio' name='attr0' value=' humanas '>Humanas<br>
					<input type='radio' name='attr0' value=' biologicas '>Biológicas<br>
				</section>
				
				<section>
					Ambiente de atuação:<br><br>
					<input type='radio' name='attr1' value=' casa ' checked>Casa<br>
					<input type='radio' name='attr1' value=' escritorio '>Escritório<br>
					<input type='radio' name='attr1' value=' fora '>Fora<br>
				</section>
				
				<section>
					Individual ou em grupo?<br><br>
					<input type='radio' name='attr2' value=' individual ' checked>Individual<br>
					<input type='radio' name='attr2' value=' grupo '>Grupo<br>
				</section>
				
				<section>
					Contato com clientes?<br><br>
					<input type='radio' name='attr3' value=' com_cliente ' checked>Sim<br>
					<input type='radio' name='attr3' value=' sem_cliente '>Não<br>
				</section>
				
				<section>
					Calmo ou agitado?<br><br>
					<input type='radio' name='attr4' value=' calmo ' checked>Calmo<br>
					<input type='radio' name='attr4' value=' agitado '>Agitado<br>
				</section>
				
				<button id='enviar'>Enviar</button><br><br>
				
				<input type='hidden' name='id_usuario' value='<?php echo @$_SESSION['id_usuario'] ?>'>
			</div>
		</main>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				
				var nome;
				var atributos;
				var id_usuario;
				
				$('#enviar').click(function(){
					// Pega os valores //
					nome = $('input[name=nome]').val();
					atributos = ($("input[name=attr0]:checked").val()+$("input[name=attr1]:checked").val()+$("input[name=attr2]:checked").val()+$("input[name=attr3]:checked").val()+$("input[name=attr4]:checked").val());
					id_usuario = $('input[name=id_usuario]').val();
					
					if(nome){
						$.ajax({
							url: "ajax/ajax_cadastro.php",
							type: "POST",
							datatype: "text",
							data: {'nome': nome, 'atributos': atributos, 'id_usuario': id_usuario},
							success: function(data){
								$('input[name=nome]').val('');
								$('.reset').hide();
								if(data == '1'){
									$('#enviar').after('<br><br><p class="reset">Cadastrado com sucesso!</p>');
									$('.reset').delay(3000).fadeOut();
								}
								else{
									$('#enviar').after('<br><br><p class="reset">Este curso já foi cadastrado.</p>');
									$('.reset').delay(3000).fadeOut();
								}
								
								
							}
						});
					}
					
					
				});
			});
		</script>
		
	</body>
</html>