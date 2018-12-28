<?php
	class Estoque{
		private $id;
		private $quantidade;
		private $produto_id;
		private $medida;
		
		public function __construct($id=0, $quantidade=0,$produto_id=0, $medida=""){
			$this->id = $id;
			$this->quantidade = $quantidade;
			$this->produto_id = $produto_id;
			$this->medida = $medida;
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
		public function getMedida(){
			return $this->medida;
		}
		
		
		public function setMedida($medida){
			$this->medida = $medida; 
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