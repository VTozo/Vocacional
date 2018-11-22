<?php
	session_start();
	
	if(@$_POST){ /*SALVAR EDIÇÕES*/
		include 'conexao.php';
		@$sql = '
			update usuarios set 
			`nome` = "'.@$_POST['nome'].'" , `email` = "'.@$_POST['email'].'" ';
			
		if(@$_POST['admin']){
			@$sql .= ', `perfil` = "1" ';
		}
		else{
			@$sql .= ', `perfil` = "2" ';
		}
		
		if((@$_POST['senha']) && (@$_POST['senha'] == @$_POST['senha2'])){
			@$sql .= ', `senha` = "'.md5(@$_POST['senha']).'"';
			@$mensagem = '<p class="center">Dados e senha nova gravados com sucesso!</p>';
		}
		else{
			@$mensagem = '<p class="center">Dados gravados com sucesso!</p>';
		}
		
		@$sql .= ' where id = "'.@$_POST['id'].'"';
		sql(@$sql);
		@$_SESSION['nome'] = @$_POST['nome'];
	}
	
	if(@$_SESSION['perfil'] == '1'){ // SE ESTIVER LOGADO COMO ADM
		include 'conexao.php';
		@$usuario = select_where('usuarios','id = '.@$_GET['id']);
		@$usuario = @$usuario[0];
		@$nome = " usuário ".explode(" ",@$usuario['nome'])[0];
		@$admin = true;
	}
	elseif(@$_SESSION['perfil'] == '2'){
		include 'conexao.php';
		@$usuario = select_where('usuarios','id = '.@$_SESSION['id_usuario']);
		@$usuario = @$usuario[0];
		@$nome = explode(" ",@$usuario['nome']);
		@$nome = "perfil";
	}
	else{
		header("location: index.php");
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edição de usuário | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body>
		
		<?php include 'php/header.php' ?>
		<h1>Editar <?php echo @$nome ?></h1>
		<?php echo @$mensagem ?>
		<main id='cadastros'>
			<form id='form' method='post'>
				<input type='hidden' name='id' value='<?php echo @$usuario['id'] ?>'>
				Nome:
				<br>
				<input type='text' name='nome' maxlength='100' required value='<?php echo @$usuario['nome'] ?>'><br>
				<br>
				E-mail:
				<br>
				<input type='email' required name='email' maxlength='100' value='<?php echo @$usuario['email'] ?>'><br>
				<br>
				<?php if(@$_SESSION['id_usuario'] == @$usuario['id']): ?>
				Senha: (opcional)
				<br>
				<input type='password' maxlength='100' name='senha'><br>
				<br>
				Confirmação de senha: (opcional)
				<br>
				<input type='password' maxlength='100' name='senha2'><br>
				<?php endif; ?>
				<br>
				<?php if(@$admin): ?>
				<input type='checkbox' name='admin'
				<?php if(@$usuario['perfil'] == '1') echo 'checked' ?>
				> Administrador
				<br>
				<?php endif ?>
				<br>
				<button id='salvar'>Salvar</button><br><br>
				
				<input type='hidden' name='id_usuario' value='<?php echo @$_SESSION['id_usuario'] ?>'>
			</form>
		</main>
		
	</body>
</html>