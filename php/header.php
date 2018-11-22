<header>
	<a href='index.php'><div class="title">Vocacional</div></a>
	<a href='php/sair.php'><div>Sair</div></a>
	<a href='sobre.php'><div>Sobre</div></a>
	<a href='cadastro_curso.php'><div>Cadastrar curso</div></a>
	
	<?php if(@$_SESSION['perfil']=='2'): ?>
		<a href='editar_usuario.php'><div>Editar perfil</div></a>
	<?php endif ?>
	
	<?php if(@$_SESSION['perfil']=='1'): ?>
		<a href='listar_usuarios.php'><div>Listar usuários</div></a>
		<a href='listar_cursos.php'><div>Listar cursos</div></a>
	<?php endif ?>
	
	<a href='teste.php'><div>Realizar teste</div></a>
	<div id='bem_vindo'>
		Bem vindo
		<?php 
			if(@$_SESSION['perfil']=='1'){
				echo "Administrador!";
			}
			else{
				echo explode(" ", @$_SESSION['nome'])[0]."!";
			}
		?>
	</div>
</header>
<br>

