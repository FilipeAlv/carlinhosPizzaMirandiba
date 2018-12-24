<?php
	class Mesa{
		private $id;
		private $numero;
		private $status;
		
		public function __construct($id=0, $numero=0, $status=""){
			$this->id = $id;
			$this->numero = $numero;
			$this->status = $status;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getNumero(){
			return $this->numero;
		}
	
		public function setId($id){
			$this->id = $id; 
		}
		public function setNumero($numero){
			$this->numero = $numero; 
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		
		
	}
?>