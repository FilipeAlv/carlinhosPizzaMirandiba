<?php
    require_once 'conexao.php';
	include $model.'funcionario.php';
	
	class DAOFuncionario{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarFuncionario(Funcionario $funcionario){
			$nome = $funcionario->getNome();
			$senha = $funcionario->getSenha();
			$permissao = $funcionario->getPermissao();
			

			$sql = "INSERT INTO funcionario (nome, senha, permissao) VALUES ('$nome', '$senha', '$permissao')";
			$this->conexao->executarQuery($sql);
		}
			
		public function listarFuncionarios(){
			$lista = $this->conexao->executarQuery("SELECT * FROM funcionario");
			$arrayFuncionarios = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$funcionario = new Funcionario($linha['id'],$linha['nome'],$linha['senha'], $linha['permissao']);
				array_push($arrayFuncionarios,$funcionario);
			}
			return $arrayFuncionarios;
		}
		
		public function validarFuncionario($nome , $senha ){
			$lista = $this->conexao->executarQuery("SELECT * FROM funcionario where nome='$nome' and senha='$senha'");
			
			$linha = mysqli_fetch_array($lista);
			if($linha!=null){
			    return true;
			}
		    
			return false;
		}		
	}
	
?>