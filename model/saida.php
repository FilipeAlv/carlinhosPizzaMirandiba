<?php
	class Saida{
		private $id;
		private $valor;
		private $data_hora;
		
		
		public function __construct($id=0, $valor=0, $data_hora=""){
			$this->id = $id;
			$this->data_hora = $data_hora;
			$this->valor = $valor;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getDataHora(){
			return $this->data_hora;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
		
		public function setId($id){
			$this->id = $id; 
		}
		public function setDataHora($data_hora){
			$this->data_hora = $data_hora; 
		}
		
		public function setValor($valor){
			$this->valor = $valor; 
		}
		
		
	
	}
?>