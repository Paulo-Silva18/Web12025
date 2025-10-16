<?php
	include_once("ConnectionFactory_class.php");//PDO
	include_once("Contato_class.php"); //entidade
	
	class ContatoDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados
	
		public $con = null; //obj recebe conexão
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
	
		//cadastrar
		public function cadastrar($cont){
			try{
				$stmt = $this->con->prepare(
				"INSERT INTO produtos(nome_produto, descricao, preco, imagem_url)
				VALUES (:nome_produto, :descricao, :preco, :imagem_url)");
				//:nome - é uma âncora e será ligado pelo bindValue
				//SQL injection
				//ligamos as âncoras aos valores de Contato
				$stmt->bindValue(":nome_produto", $cont->getNome_Produto());
				$stmt->bindValue(":descricao", $cont->getDescricao());
				$stmt->bindValue(":preco", $cont->getPreco());
				$stmt->bindValue(":imagem_url", "teste");
				
				$stmt->execute(); //execução do SQL	
				/*$this->con->close();
				$this->con = null;*/	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//alterar
		public function alterar($cont){
			try{
				$stmt = $this->con->prepare(
				"UPDATE produtos SET nome_produto=:nome_produto, 
				descricao=:descricao, preco=:preco, imagem_url=:imagem_url WHERE
				id=:id");
					
				//ligamos as âncoras aos valores de Contato
				$stmt->bindValue(":nome_produto", $cont->getNome_Produto());
				$stmt->bindValue(":descricao", $cont->getDescricao());
				$stmt->bindValue(":preco", $cont->getPreco());
				$stmt->bindValue(":imagem_url", $cont->getImagem_Url());
				$stmt->bindValue(":id", $cont->getId());
				
				$this->con->beginTransaction();
			    $stmt->execute(); //execução do SQL	
				$this->con->commit(); 
				/*$this->con->close();
				$this->con = null;*/	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		//excluir
		public function excluir($cont){
			try{
				$num = $this->con->exec("DELETE FROM produtos WHERE id = " . $cont->getId());
				//numero de linhas afetadas pelo comando
				
				if($num >= 1){
					return 1;
				} else {
					return 0;
				}
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
	
		//listar
		public function listar($query = null){		
			//se não recebe parâmetro (ou seja, uma consulto personalizada)
			//$query recebe nulo
			try{
				if($query == null){
					$dados = $this->con->query("SELECT * FROM produtos");
					//dataset (conjunto de dados) com todos os dados
					//query() é função PDO, executa SQL
				} else {
					$dados = $this->con->query($query);
					//se listar receber parâmetro este será uma SQL 
					//SQL específica
				}
				$lista = array(); //crio chamando função array()

				/*for($i = 0; $i<$dados.lenght; $i++){
					$c->setNome($dados[i][1]);
				}*/

				foreach($dados as $linha){
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
					$c = new Contato();
					$c->setId($linha["id"]);
					$c->setNome_Produto($linha["nome_produto"]);
					$c->setDescricao($linha["descricao"]);
					$c->setPreco($linha["preco"]);					
					$lista[] = $c;
				}
				return $lista;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//exibir 
		public function exibir($id){			
			try{				
				$lista = $this->con->query("SELECT * FROM produtos WHERE id = " . $id);
				
				/*$this->con->close();
				$this->con = null;*/
				
				$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
				
				$c = new Contato();
				$c->setId($dado[0]["id"]);
				$c->setNome_Produto($dado[0]["nome_produto"]);
				$c->setDescricao($dado[0]["descricao"]);
				$c->setPreco($dado[0]["preco"]);
				$c->setImagem_Url($dado[0]["imagem_url"]);
				
				return $c;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
			
		}
	}


?>