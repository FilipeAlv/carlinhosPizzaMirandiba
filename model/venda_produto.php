<?php
	class VendaProduto{
		private $id;
		private $quantidade;
		private $venda_id;
		private $produto_id;
		
		public function __construct($id=0, $quantidade=0,$venda_id=0, $produto_id=0){
			$this->id = $id;
			$this->quantidade = $quantidade;
			$this->venda_id = $venda_id;
			$this->produto_id = $produto_id;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getQuantidade(){
			return $this->quantidade;
		}
		public function getVendaId(){
			return $this->venda_id;
		}
		public function getProdutoId(){
			return $this->produto_id;
		}
		
		public function setId($id){
			$this->id = $id; 
		}
		public function setQuantidade($quantidade){
			$this->quantidade = $quantidade; 
		}
		public function setVendaId($venda_id){
			$this->venda_id = $venda_id; 
		}
		public function setProdutoId($produto_id){
			$this->produto_id = $produto_id; 
		}
	
	}
?>