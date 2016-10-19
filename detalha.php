<?php
//inicia sessao
session_start();

//recupera o id do usuário no qual deseja-se ver os repositórios
$id = $_GET['id'];

//recupera o obj. PHP contendo o JSON de resposta através da variável de sessão
$dados_usuario = $_SESSION['dados_usuario'];

//$usuario recebe os dados do usuário(s) pesquisado
$usuario = $dados_usuario["items"];

//percorre os usuários encontrados e recupera o login apenas do usuário que deseja-se ver os repositórios
foreach($usuario as $user){
	if($user["id"] == $id){
		$login = $user["login"];
	}
}

//inclui o login na url de pesquisa de repositórios da api github
$url = "https://api.github.com/users/".$login."/repos";

//faz procedimento para acessar dados da api github
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true );
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["Accept: application/vnd.github.v3+json","Content-Type: text/plain","User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);

//$resposta recebe o resultado da pesquisa em formato JSON
$resposta = curl_exec($curl);

//$repositorios é um objeto PHP com os dados do JSON de resposta
$repositorios = json_decode($resposta,true);

//libera recurso curl do sistema
curl_close($curl);


//variável de sessão como os dados do objeto PHP, para que se possa usá-lo em outras páginas
$_SESSION['repositorios'] = $repositorios;

/*se o JSON não trouxer resultados direciona para página que informa que esse usuário ainda não tem repositórios públicos no GitHub
  do contrário direciona para página de listagem dos repositórios	*/
if($repositorios == null){

	header("location: sem_repositorios.php");

}else{

	header("location: repositorios.php");
}


?>