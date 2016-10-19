<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<title>Projeto GitHub</title>
</head>
<body>
	<div class="container">
		<div class="col-md-2"></div>
		
		<div class="col-md-8">
			<h3 class="text-center">Projeto GitHub - Desenvolvido por Sanatiel Barros</h3>	
			<br>
			<h4 class="text-center"><a href="index.php" class="btn btn-success btn-xs" style="text-decoration:none;font-size:white">Nova Pesquisa</a></h4>
			<br>
			<h4 class="text-center">Resultado da pesquisa por usuário(s): </h4>
			<br>
			<table class="table table-hover text-center">
				<tr>
					<th class="text-center">Id</th>
					<th class="text-center">Login</th>
					<th class="text-center">Repositórios</th>
					<th class="text-center">GitHub</th>
				</tr>

				<?php
					//inicia sessão
					session_start();

					//recupera o obj. PHP contendo o JSON de resposta através da variável de sessão
					$dados_usuario = $_SESSION['dados_usuario'];

					//$usuario recebe os dados do usuário(s) pesquisado
					$usuario = $dados_usuario["items"];

					//lista os usuários encontrados informando id e login
					foreach($usuario as $user){
						echo '<tr>';
						  echo '<td>';
						  	echo $user["id"];
						  echo '</td>';

						  echo '<td>';
						  	echo $user["login"];
						  echo '</td>';

						  echo '<td>';
						  	//link para listar todos os repositórios do usuário na própria aplicação PHP, é enviado o id do usuário via GET
						  	echo '<a href="detalha.php?id='.$user["id"].'">Detalhar repositórios</a>';
						  echo '</td>';

						  echo '<td>';
						  	//link que direciona para a página de repositórios do usuário no GitHub
						  	echo '<a href="https://github.com/'.$user["login"].'?tab=repositories" target="_blank" >Acessar GitHub do usuário</a>';
						  echo '</td>';
						echo '</tr>';
					}

					
				?>

			</table>

			

		</div>
		
		<div class="col-md-2"></div>		
	</div>

</body>
</html>