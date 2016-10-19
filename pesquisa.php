<?php

//recupera a pesquisa feita
$usuario = $_GET['usuario'];

//inclui a pesquisa na url de pesquisa de usuários da api github
$url = "https://api.github.com/search/users?q=".$usuario;

//faz procedimento para acessar dados da api github
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true );
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["Accept: application/vnd.github.v3+json","Content-Type: text/plain","User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);

//$resposta recebe o resultado da pesquisa em formato JSON
$resposta = curl_exec($curl);

//$dados_usuario é um objeto PHP com os dados do JSON de resposta
$dados_usuario = json_decode($resposta,true);

//libera recurso curl do sistema
curl_close($curl);

//inicia uma sessao
session_start();

//cria uma variável de sessão como os dados do objeto PHP, para que se possa usá-lo em outras páginas
$_SESSION['dados_usuario'] = $dados_usuario;

/*se o número de resultados da pesquisa feita for menor igual a zero, direciona para página que informa que não haver resultados
  se houver resultados, envia para página de listagem*/
if($dados_usuario["total_count"] <= 0){
	
	header("location: sem_resultados.php");

}else{
	
	header("location: listagem.php");
}




?>