<?php
	class Produto{
		private $id;
		private $nome;
		private $tipo;
		private $valor;
		
		public function __construct($id=0, $nome="", $tipo="",  $valor=0){
		$this->id = $id;	
		$this->nome = $nome;
		$this->tipo = $tipo;
		$this->valor = $valor;
	}
		
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function getValor(){
			return $this->valor;
		}
		
		public function setId($id){
			$this->id = $id; 
		}
		public function setNome($nome){
			$this->nome = $nome; 
		}
		public function setTipo($tipo){
			$this->tipo = $tipo; 
		}
		public function setValor($valor){
			$this->valor = $valor; 
		}
	}
?>