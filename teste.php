<?php
	session_start();
	if(!@$_SESSION['perfil']){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body id='teste'>
		
		<?php include 'php/header.php' ?>
		<h1>Teste Vocacional</h1>
		<main>
			<section class='pergunta 0'>
				Qual área do conhecimento você mais gosta/se identifica?<br><br>
				<button value='exatas'    >Exatas     </button>
				<button value='humanas'   >Humanas    </button>
				<button value='biologicas'>Biológicas </button>
				<button value=''          >Não sei</button>
			</section>
			
			<section class='pergunta 1'>
				Onde é o lugar ideal de trabalho para você?<br><br>
				<button value='casa'      >Em casa</button>
				<button value='escritorio'>Em escritório</button>
				<button value='fora'      >Fora</button>
				<button value=''          >Não sei</button>
			</section>
			
			<section class='pergunta 2 small'>
				Você prefere trabalhar em grupo ou individualmente?<br><br>
				<button value='individual' >Individual</button>
				<button value='grupo'      >Em grupo</button>
				<button value=''           >Não sei</button>
			</section>
			
			<section class='pergunta 3 small'>
				Você gostaria de uma profissão com contato direto com clientes?<br><br>
				<button value='com_cliente' >Sim</button>
				<button value='sem_cliente' >Não</button>
				<button value=''             >Não sei</button>
			</section>
			
			<section class='pergunta 4 small'>
				Você gostaria de ter um trabalho calmo ou agitado?<br><br>
				<button value='calmo'     >Calmo</button>
				<button value='agitado'   >Agitado</button>
				<button value=''          >Não sei</button>
			</section>
			<br>
			<button id='enviar'>Enviar</button>
			
			
			
		</main>
		
		<div class='modal'>
			<div id='data' class='modal_content scrollbar'>
				
			</div>
		</div>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script>
			
			var liked_question = new Array();
			
			function ajax_like(id_curso){
					$(".img"+id_curso).attr("src","img/thumbs-up-blue.svg");
					if(liked_question[id_curso] != true){
						$.ajax({
							url: "ajax/ajax_like.php",
							type: "POST",
							dataType:"text",
							data: {'id_curso': id_curso},
							success: function(data){}
						});
						liked_question[id_curso] = true;
					}
				}
		
			$(document).ready(function(){
				
				var num_pergunta;
				var respostas = new Array();
				var final;
				var id_curso;
				
				$('#enviar').click(function(){
					//alert(JSON.stringify(respostas))
					
					$.ajax({
						url: "ajax/ajax_busca.php",
						type: "POST",
						dataType:"text",
						data: {'respostas': respostas},
						success: function(data){
							$('#data').html(data);
							if($('#data').val() == ""){
								$('#data').val('Nenhum resultado encontrado...');
							}
							$('.modal').fadeIn();
						}
					});
					
				});
				
				$('section>button').not('#enviar').click(function(){
					
					$(this).siblings().removeClass('selecionado');
					$(this).addClass('selecionado');
					
					num_pergunta = $(this).parent().attr('class').replace('pergunta ','').replace(' small',''); // Pega o numero da pergunta
					respostas[num_pergunta] = $(this).val(); // Salva na variavel de respostas
					/*alert(num_pergunta);*/
				});
				
				$(window).click(function() {
					$('.modal').fadeOut();
				});
				
				$('.modal_content').click(function(event){
				    event.stopPropagation();
				});
				
			});
		</script>
		
	</body>
</html>