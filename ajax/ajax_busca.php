<?php
	include '../conexao.php';
	
	$respostas = @$_POST['respostas'];
	
	$select = sql('select * from cursos where 
	(atributos like "%'.@$respostas[0].'%") and
	(atributos like "%'.@$respostas[1].'%") and
	(atributos like "%'.@$respostas[2].'%") and
	(atributos like "%'.@$respostas[3].'%") and
	(atributos like "%'.@$respostas[4].'%") 
	order by likes desc
	');
	
	if(count($select) == 0){
		echo "
			<div class='curso'>
				Nenhum curso encontrado...
			</div>
			";
	}
	else{
		echo "
				<div class='curso'>
					<h2>Resultados:</h2>
				</div>
				";
		foreach($select as $curso){
			echo "
				<div class='curso'>
					".$curso['nome']."
					<div class='like like".$curso['id']."' onClick='ajax_like(".$curso['id'].")'>
						<img class='img".$curso['id']."' src='img/thumbs-up.svg' height='36px' width='36px'>
					</div>
				</div>
				";
		}
	}
	#print_r($select);
	
?>