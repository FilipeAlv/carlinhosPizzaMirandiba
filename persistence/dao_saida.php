<?php
    require_once 'conexao.php';
	include ($model."saida.php");
	
	class DAOSaida{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarSaida(Saida $saida){
			$valor = $saida->getValor();
			$data_hora = $saida->getDataHora();
			

			$sql = "INSERT INTO saida (valor,data) VALUES ('$valor',  '$data_hora')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarSaidas(){
			$lista = $this->conexao->executarQuery("SELECT * FROM saida");
			$arraySaidas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$saida = new Saida($linha['id'],$linha['valor'],$linha['data']);
				array_push($arraySaidas,$saida);
			}
			return $arraySaidas;
		}
		
		public function buscarPorData($dataInicio, $dataFim){
			$lista = $this->conexao->executarQuery("SELECT * FROM saida where data between '$dataInicio' and '$dataFim'");
			$arraySaidas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$saida = new Saida($linha['id'],$linha['valor'],$linha['data']);
				array_push($arraySaidas,$saida);
			}
			return $arraySaidas;
		}
		
		public function buscarPorMesaIdDia($mesa_id, $data){
			$lista = $this->conexao->executarQuery("SELECT * FROM saida where mesa_id = $mesa_id and data like '$data %'");
			$arraySaidas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$saida = new Saida($linha['id'],$linha['valor'],$linha['data']);
				array_push($arraySaidas,$saida);
			}
			return $arraySaidas;
		}
		
		public function buscarMaxId(){
			$lista =$this->conexao->executarQuery("SELECT * FROM saida ORDER BY id DESC LIMIT 1");
			$linha = mysqli_fetch_array($lista);
			$saida = new Saida($linha['id'],$linha['valor'],$linha['data']);
			return $saida->getId();
		}
	}
	
?>