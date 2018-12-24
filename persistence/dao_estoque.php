<?php
    require_once 'conexao.php';
	include ($model."estoque.php");
	
	class DAOEstoque{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarEstoque(Estoque $estoque){
			$produto_id = $estoque->getProdutoId();
			$quantidade = $estoque->getQuantidade();
			

			$sql = "INSERT INTO estoque (produto_id, quantidade) VALUES ('$produto_id', '$quantidade')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarEstoques(){
			$lista = $this->conexao->executarQuery("SELECT * FROM estoque");
			$arrayEstoques = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$estoque = new Mesa($linha['id'],$linha['produto_id'], $linha['quantidade']);
				array_push($arrayEstoques,$estoque);
			}
			return $arrayEstoques;
		}
	}
	
?>