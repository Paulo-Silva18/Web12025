<?php
	include_once("modelo/ContatoDAO_class.php");	
	class CadastrarContato{
		//CONTROLE
	
		public function __construct(){
			
			if(isset($_POST["enviar"])){
				//formulário enviar foi enviado
				
				$c = new Contato();
				$c->setNome_Produto($_POST["nome_produto"]);
				$c->setDescricao($_POST["descricao"]);
				$c->setPreco($_POST["preco"]);
				$c->setImagem_Url("qwe");
				
				$dao = new ContatoDAO();
				$dao->cadastrar($c);
				
				$status = "Cadastro do Contato " . $c->getNome_Produto() . 
				" efetuado com sucesso";
				
				$lista = $dao->listar();
				
				include_once("visao/listaContato.php");
				
			} else{
			
				include_once("visao/formCadastroContato.php");	
			
			}
		}
	}
?>
