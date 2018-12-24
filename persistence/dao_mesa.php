<?php
    require_once 'conexao.php';
	include ($model."mesa.php");
	
	class DAOMesa{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarMesa(Mesa $mesa){
			$numero = $mesa->getNumero();
			$status = $mesa->getStatus();
			

			$sql = "INSERT INTO mesa (numero, status) VALUES ('$numero', '$status')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarMesas(){
			$lista = $this->conexao->executarQuery("SELECT * FROM mesa");
			$arrayMesas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$mesa = new Mesa($linha['id'],$linha['numero'],$linha['status']);
				array_push($arrayMesas,$mesa);
			}
			return $arrayMesas;
		}
		
		public function buscarPorId($id){
			$lista = $this->conexao->executarQuery("SELECT * FROM mesa where id=$id");
			$linha = mysqli_fetch_array($lista);
			$mesa = new Mesa($linha['id'],$linha['numero'],$linha['status']);
				
			return $mesa;
		}
		
		public function updateStatus($id, $status){
			$this->conexao->executarQuery("UPDATE mesa SET status='$status' WHERE id=$id");
		}
		
		
	}
	
?>