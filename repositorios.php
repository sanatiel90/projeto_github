<?php
	//inicia sessão
	session_start();

	//recupera o obj. PHP contendo o JSON com dados dos repositórios através da variável de sessão
	$repositorios = $_SESSION['repositorios'];

	//percorre o obj. PHP e atribui à $usuario os dados do usuário que possui os repositórios
	foreach ($repositorios as $repos) {
		$usuario = $repos["owner"];
	}



?>

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
			<h4 class="text-center">Dados do usuário</h4>
			
			<h5 class="text-center"><label>Id: </label> <?php echo $usuario["id"] ?> </h5> 
			
			<h5 class="text-center"><label>Login:  </label> <?php echo $usuario["login"] ?> </h5>
			<br>
			<h4 class="text-center">Lista de repositórios</h4>
			<table class="table table-hover text-center">
				<tr>
					<th class="text-center">Nome</th>
					<th class="text-center">GitHub</th>
				</tr>

				<?php
					//lista o nome dos repositórios do usuário
					foreach($repositorios as $repos){
						echo '<tr>';
						  echo '<td>';
						  	echo $repos["name"];
						  echo '</td>';

						  echo '<td>';
						  	//link para acessar o repositório no GitHub
						  	echo '<a target="_blank" href="https://github.com/'.$usuario["login"].'/'.$repos["name"].'">Acessar repositório no GitHub</a>';
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