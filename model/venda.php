<?php
	class Venda{
		private $id;
		private $valor;
		private $tipo;
		private $data_hora;
		private $funcionario_id;
		private $mesa_id;
		
		
		public function __construct($id=0, $valor=0, $tipo="", $data_hora="", $funcionario_id=0, $mesa_id=0){
			$this->id = $id;
			$this->data_hora = $data_hora;
			$this->tipo = $tipo;
			$this->valor = $valor;
			$this->funcionario_id = $funcionario_id;
			$this->mesa_id = $mesa_id;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getDataHora(){
			return $this->data_hora;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function getValor(){
			return $this->valor;
		}
		
		public function getMesaId(){
			return $this->mesa_id;
		}
		
		public function getFuncionarioId(){
			return $this->funcionario_id;
		}
		
		public function setId($id){
			$this->id = $id; 
		}
		public function setDataHora($data_hora){
			$this->data_hora = $data_hora; 
		}
		public function setTipo($tipo){
			$this->tipo = $tipo; 
		}
		public function setValor($valor){
			$this->valor = $valor; 
		}
		
		public function setMesaId($mesa_id){
			$this->mesa_id = $mesa_id;
		}
		
		public function setFuncionarioId($funcionario_id){
			$this->funcionario_id = $funcionario_id;
		}
	
	}
?>