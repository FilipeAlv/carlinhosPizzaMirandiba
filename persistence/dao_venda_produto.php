<?php
    require_once 'conexao.php';
	include ($model."venda_produto.php");
	
	class DAOVendaProduto{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarVendaProduto(VendaProduto $venda_produto){
			$quantidade = $venda_produto->getQuantidade();
			$produto_id = $venda_produto->getProdutoId();
			$venda_id = $venda_produto->getVendaId();
			

			$sql = "INSERT INTO venda_produto (quantidade, produto_id, venda_id) VALUES ('$quantidade', '$produto_id', '$venda_id')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarVendaProdutos(){
			$lista = $this->conexao->executarQuery("SELECT * FROM venda_produto");
			$arrayVendaProdutos = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$venda_produto = new VendaProduto($linha['id'],$linha['quantidade'],$linha['produto_id'],$linha['venda_id']);
				array_push($arrayVendaProdutos,$venda_produto);
			}
			return $arrayVendaProdutos;
		}
		
		public function buscarMaxId(){
			$lista =$this->conexao->executarQuery("SELECT * FROM venda_produto ORDER BY id DESC LIMIT 1");
			$linha = mysqli_fetch_array($lista);
			$venda_produto = new VendaProduto($linha['id'],$linha['quantidade'],$linha['produto_id'],$linha['venda_id']);
			return $venda_produto->getId();
		}
		
		public function buscarPorVenda($id){
			$lista = $this->conexao->executarQuery("SELECT * FROM venda_produto WHERE venda_id = $id");
			$arrayVendaProdutos = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$venda_produto = new VendaProduto($linha['id'],$linha['quantidade'],$linha['produto_id'],$linha['venda_id']);
				array_push($arrayVendaProdutos,$venda_produto);
			}
			return $arrayVendaProdutos;
		}
		
		public function deleteProduto($venda_id, $produto_id){
			$this->conexao->executarQuery("DELETE FROM venda_produto WHERE venda_id = $venda_id AND produto_id = $produto_id");
		}
			
	}
	
?>