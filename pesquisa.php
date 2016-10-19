<?php

$usuario = $_GET['usuario'];

$url = "https://api.github.com/search/users?q=".$usuario;

$curl = curl_init();

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true );

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($curl, CURLOPT_HTTPHEADER, ["Accept: application/vnd.github.v3+json","Content-Type: text/plain","User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);


$resposta = curl_exec($curl);

$dados_usuario = json_decode($resposta,true);

curl_close($curl);


session_start();

$_SESSION['dados_usuario'] = $dados_usuario;

header("location: listagem.php");


?>