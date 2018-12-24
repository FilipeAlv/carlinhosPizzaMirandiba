<?php
    require_once 'conexao.php';
	include ($model."venda.php");
	
	class DAOVenda{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarVenda(Venda $venda){
			$valor = $venda->getValor();
			$tipo = $venda->getTipo();
			$data_hora = $venda->getDataHora();
			$funcionario_id = $venda->getFuncionarioId();
			$mesa_id = $venda->getMesaId();
			

			$sql = "INSERT INTO venda (valor, tipo, data, funcionario_id, mesa_id) VALUES ('$valor', '$tipo', '$data_hora', '$funcionario_id', '$mesa_id')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarVendas(){
			$lista = $this->conexao->executarQuery("SELECT * FROM venda");
			$arrayVendas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$venda = new Venda($linha['id'],$linha['valor'],$linha['tipo'],$linha['data'],$linha['funcionario_id'],$linha['mesa_id']);
				array_push($arrayVendas,$venda);
			}
			return $arrayVendas;
		}
		
		public function buscarPorData($dataInicio, $dataFim){
			$lista = $this->conexao->executarQuery("SELECT * FROM venda where data between '$dataInicio' and '$dataFim'");
			$arrayVendas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$venda = new Venda($linha['id'],$linha['valor'],$linha['tipo'],$linha['data'],$linha['funcionario_id'],$linha['mesa_id']);
				array_push($arrayVendas,$venda);
			}
			return $arrayVendas;
		}
		
		public function buscarPorMesaIdDia($mesa_id, $data){
			$lista = $this->conexao->executarQuery("SELECT * FROM venda where mesa_id = $mesa_id and data like '$data %'");
			$arrayVendas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$venda = new Venda($linha['id'],$linha['valor'],$linha['tipo'],$linha['data'],$linha['funcionario_id'],$linha['mesa_id']);
				array_push($arrayVendas,$venda);
			}
			return $arrayVendas;
		}
		
		public function buscarMaxId(){
			$lista =$this->conexao->executarQuery("SELECT * FROM venda ORDER BY id DESC LIMIT 1");
			$linha = mysqli_fetch_array($lista);
			$venda = new Venda($linha['id'],$linha['valor'],$linha['tipo'],$linha['mesa_id'],$linha['funcionario_id']);
			return $venda->getId();
		}
	}
	
?>