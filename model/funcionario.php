<?php
	class Funcionario{
		private $id;
		private $nome;
		private $senha;
		private $permissao;
		
		public function __construct($id=0, $nome="", $senha="",  $permissao=""){
		$this->id = $id;	
		$this->nome = $nome;
		$this->senha = $senha;
		$this->permissao = $permissao;
	}
		
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getPermissao(){
			return $this->permissao;
		}
		
		public function setId($id){
			$this->id = $id; 
		}
		public function setNome($nome){
			$this->nome = $nome; 
		}
		public function setSenha($senha){
			$this->senha = $senha; 
		}
		public function setPermissao($permissao){
			$this->permissao = $permissao; 
		}
	}
?>