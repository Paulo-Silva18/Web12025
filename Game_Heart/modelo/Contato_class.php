<?php
	class Contato{
	//classe entidade	
		private $id;
		private $nome_produto;
		private $descricao;
		private $preco;
		private $imagem_url;
		
		public function __construct(){
		}		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this->id;
		}
		//demais getters e setters
		
		public function getNome_Produto(){
			return $this->nome_produto;
		}
		public function setNome_Produto($n){
			$this->nome_produto = $n;
		}
		
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($e){
			$this->descricao = $e;
		}
		
		public function getPreco(){
			return $this->preco;
		}
		public function setPreco($t){
			$this->preco = $t;
		}
		
		public function getImagem_Url(){
			return $this->imagem_url;
		}
		public function setImagem_Url($imagem_url){
			$this->imagem_url = $imagem_url;
		}
	}

?>

