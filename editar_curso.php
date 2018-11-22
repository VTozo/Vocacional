<?php
	session_start();
	if(@$_SESSION['perfil'] != '1'){ // SE NÃO ESTIVER LOGADO COMO ADM
		header('location: teste.php');
	}
	if(@$_POST){ /*SALVAR EDIÇÕES*/
		include 'conexao.php';
		@$sql = '
			update cursos set 
			`nome` = "'.@$_POST['nome'].'" , `id_usuario` = "'.@$_POST['id_usuario'].'" , `atributos` = "'.@$_POST['attr0'].' '.@$_POST['attr1'].' '.@$_POST['attr2'].' '.@$_POST['attr3'].' '.@$_POST['attr4'].' "
			where id = '.@$_POST['id'];
		sql(@$sql);
		@$mensagem = "<p class='center'>Curso editado com sucesso.</p>";
	}
	include 'conexao.php';
	@$curso = select_where('cursos','id = '.@$_GET['id']);
	@$curso = @$curso[0];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edição de curso | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body>
		
		<?php include 'php/header.php' ?>
		<h1>Editar curso <?php echo @$curso['nome'] ?></h1>
		<main id='cadastros'>
			<?php echo @$mensagem ?>
			<form id='form' method='post'>
				<input type='hidden' name='id' value='<?php echo @$curso['id'] ?>'>
				<input type='hidden' name='id_usuario' value='<?php echo @$_SESSION['id_usuario'] ?>'>
				Nome:
				<br>
				<input type='text' name='nome' required maxlength='50' value='<?php echo @$curso['nome'] ?>'><br>
				<br>
				
				<section>
					Área:<br><br><br>
					<input type='radio' name='attr0' value=' exatas ' 
					<?php if(strpos(@$curso['atributos'],'exatas')){echo " checked ";} ?>>Exatas<br>
					<input type='radio' name='attr0' value=' humanas ' 
					<?php if(strpos(@$curso['atributos'],'humanas')){echo " checked ";} ?>>Humanas<br>
					<input type='radio' name='attr0' value=' biologicas ' 
					<?php if(strpos(@$curso['atributos'],'biologicas')){echo " checked ";} ?>>Biológicas<br>
				</section>
				
				<section>
					Ambiente de atuação:<br><br>
					<input type='radio' name='attr1' value=' casa ' 
					<?php if(strpos(@$curso['atributos'],'casa')){echo " checked ";} ?>>Casa<br>
					<input type='radio' name='attr1' value=' escritorio ' 
					<?php if(strpos(@$curso['atributos'],'escritorio')){echo " checked ";} ?>>Escritório<br>
					<input type='radio' name='attr1' value=' fora ' 
					<?php if(strpos(@$curso['atributos'],'fora')){echo " checked ";} ?>>Fora<br>
				</section>
				
				<section>
					Individual ou em grupo?<br><br>
					<input type='radio' name='attr2' value=' individual ' 
					<?php if(strpos(@$curso['atributos'],'individual')){echo " checked ";} ?>>Individual<br>
					<input type='radio' name='attr2' value=' grupo ' 
					<?php if(strpos(@$curso['atributos'],'grupo')){echo " checked ";} ?>>Grupo<br>
				</section>
				
				<section>
					Contato com clientes?<br><br>
					<input type='radio' name='attr3' value=' com_cliente ' 
					<?php if(strpos(@$curso['atributos'],'com_cliente')){echo " checked ";} ?>>Com cliente<br>
					<input type='radio' name='attr3' value=' sem_cliente ' 
					<?php if(strpos(@$curso['atributos'],'sem_cliente')){echo " checked ";} ?>>Sem cliente<br>
				</section>
				
				<section>
					Calmo ou agitado?<br><br>
					<input type='radio' name='attr4' value=' calmo ' 
					<?php if(strpos(@$curso['atributos'],'calmo')){echo " checked ";} ?>>Calmo<br>
					<input type='radio' name='attr4' value=' agitado ' 
					<?php if(strpos(@$curso['atributos'],'agitado')){echo " checked ";} ?>>Agitado<br>
				</section>
				<p>Última edição feita pelo usuário de id: <?php echo @$curso['id_usuario'] ?>.</p><br>
				<button id='salvar'>Salvar</button><br><br>
				
				<input type='hidden' name='id_usuario' value='<?php echo @$_SESSION['id_usuario'] ?>'>
			</form>
		</main>
		
	</body>
</html>