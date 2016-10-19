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
			<br>
			<h4 class="text-center">Resultado da pesquisa por usuário(s)</h4>
			<br>
			<table class="table table-hover text-center">
				<tr>
					<th class="text-center">Id</th>
					<th class="text-center">Login</th>
					<th class="text-center">Repositórios</th>
					<th class="text-center">GitHub</th>
				</tr>

				<?php
					session_start();
					$dados_usuario = $_SESSION['dados_usuario'];

					$usuario = $dados_usuario["items"];

					foreach($usuario as $user){
						echo '<tr>';
						  echo '<td>';
						  	echo $user["id"];
						  echo '</td>';

						  echo '<td>';
						  	echo $user["login"];
						  echo '</td>';

						  echo '<td>';
						  	echo '<a href="detal.php?id='.$user["id"].'">Detalhar repositórios</a>';
						  echo '</td>';

						  echo '<td>';
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