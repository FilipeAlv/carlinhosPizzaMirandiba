<?php
    require_once 'conexao.php';
	include $model.'produto.php';
	
	class DAOProduto{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarProduto(Produto $produto){
			$nome = $produto->getNome();
			$tipo = $produto->getTipo();
			$valor = $produto->getValor();
			

			$sql = "INSERT INTO produto (nome, tipo, valor) VALUES ('$nome', '$tipo', $valor)";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarProdutos(){
			$lista = $this->conexao->executarQuery("SELECT * FROM produto");
			$arrayProdutos = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$produto = new Produto($linha['id'],$linha['nome'],$linha['tipo'], $linha['valor']);
				array_push($arrayProdutos,$produto);
			}
			return $arrayProdutos;
		}
		
		public function buscarPorId($id){
			$lista = $this->conexao->executarQuery("SELECT * FROM produto where id=$id");
			
		    $linha = mysqli_fetch_array($lista);
			$produto = new Produto($linha['id'],$linha['nome'],$linha['tipo'], $linha['valor']);
			
			return $produto;
		}
	}
	
?>