<?php

	session_start();
	
	if(@$_POST['logar']){ // SE ENVIOU FORM DE LOGIN
		include 'conexao.php';
		@$usuario = select_where('usuarios','email = "'.@$_POST['email'].'" and senha = "'.md5(@$_POST['senha']).'"');
		if(count(@$usuario)){ // SE O LOGIN ESTIVER CERTO
			@$_SESSION['perfil'] = @$usuario[0]['perfil'];
			@$_SESSION['id_usuario'] = @$usuario[0]['id'];
			@$_SESSION['nome'] = @$usuario[0]['nome'];
		}
		@$mensagem = "Login incorreto!";
		
	}
	
	if(@$_SESSION['perfil']){ // SE ESTIVER LOGADO
		header('location: teste.php');
	}
	
	if(@$_POST['cadastrar']){ // SE ENVIOU FORM DE CADASTRO
		if(@$_POST['senha_cadastro']==@$_POST['senha_cadastro2']){
			@$nome = @$_POST['nome'];
			@$email = @$_POST['email_cadastro'];
			@$senha = md5(@$_POST['senha_cadastro']);
			
			include 'conexao.php';
			@$existe_email = select_where('usuarios',' email = "'.@$email.'" ');
			@$existe_email = count(@$existe_email);
			
			if(@$existe_email){
				@$mensagem = 'Este e-mail já existe.';
			}
			else{
				include 'conexao.php';
				insert('usuarios',['',@$nome,@$email,@$senha,'2']);
				@$mensagem = 'Cadastro efetuado com sucesso!';
			}
			
		}
		else{
			@$mensagem = "As senhas não conferem";
		}
	}
	
?>
<!DOCTYPE html>
<html class='html-100'>
	<head>
		<title>Index | Teste Vocacional</title>
		<?php include 'php/head.php' ?>
	</head>
	<body id='login_page'>
		<main>
			<?php echo @$mensagem ?>
			<section id="login">
				<h1>Teste Vocacional<hr class='margin-y-20'>Login</h1>
				<form method='post'>
					<input placeholder="E-mail" type="email" maxlength="100" name="email" required autofocus value="<?php echo @$_POST['email']?>"><br>
					<br>
					<input placeholder="Senha" type="password" name="senha" maxlength="100" pattern=".{5,100}"  value="<?php echo @$_POST['senha']?>" required title="Senha de no mínimo 5 caracteres"><br>
					<br>
					<input type='submit' name='logar' value='Entrar'><br>
					<input type='button' value='Cadastre-se' class='change'>
				</form>
			</section>
			
			<section id="cadastro">
				<h1>Cadastro</h1>
				<form method='post'>
					<input placeholder="Nome" type="text" maxlength="100" name="nome" required><br>
					<br>
					<input placeholder="E-mail" type="email" maxlength="100" name="email_cadastro" <?php echo @$_POST['email']?> required><br>
					<br>
					<input placeholder="Senha" type="password" name="senha_cadastro" maxlength="100" pattern=".{5,100}" required title="Senha de no mínimo 5 caracteres" <?php echo @$_POST['senha']?>><br>
					<br>
					<input placeholder="Confirmação de senha" type="password" name="senha_cadastro2" maxlength="100" pattern=".{5,100}" required title="Senha de no mínimo 5 caracteres" <?php echo @$_POST['senha2']?>><br>
					<br>
					<input type='submit' name='cadastrar' value='Cadastrar'><br>
					<input type='button' value='Voltar' class='voltar'>
				</form>
			</section>
			
		</main>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script>
			$(document).ready(function(){
				
				$('.change').click(function(){
					$('#login').fadeOut(500);
					$('#cadastro').delay(500).fadeIn();
				});
				
				$('.voltar').click(function(){
					$('#cadastro').fadeOut(500);
					$('#login').delay(500).fadeIn();
				});
			});
		</script>
		
	</body>
</html>