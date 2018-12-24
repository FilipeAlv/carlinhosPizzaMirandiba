<?php
	class Estoque{
		private $id;
		private $quantidade;
		private $produto_id;
		
		public function __construct($id=0, $quantidade=0,$produto_id=0){
			$this->id = $id;
			$this->quantidade = $quantidade;
			$this->produto_id = $produto_id;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getQuantidade(){
			return $this->quantidade;
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
		public function setProdutoId($produto_id){
			$this->produto_id = $produto_id; 
		}
		
	}
?>