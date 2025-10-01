<?php

	
	include_once("modelo/ContatoDAO_class.php"); //adicionar contatoDAO
	
	class ListarContato{
	
		public function __construct(){
			//****** acessar o modelo
			$dao = new ContatoDAO();
			//instanciar o objeto que manipula os dados
			//iniciou a conexão com o BD
			$lista = $dao->listar(); //quer todos os dados
			
			//vou passar a lista para a visão
			//****** acessar a visão
			include_once("visao/listaContato.php");	

			
		}
	}

?>