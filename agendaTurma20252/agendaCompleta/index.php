<?php
session_start(); //Inicia a sessão
//área de memória dentro do servidor
//carrinho de compras, seus dados de conexão
//qualquer variável que vc queira criar

	include_once("controle/ListarContato_class.php");
	$index = new ListarContato();
	//atribuição de responsabilidade
	//o controle sabe como exibir a lista de contatos

	//incluo o controle especifico que irá listar os contatos
	//executo o construtor do controle listar

?>