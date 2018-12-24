<?php
   $model = '../model/';
   require '../persistence/dao_funcionario.php';
   
   $objetoFuncionario = new Funcionario ();
   $objetoFuncionario->setNome($_POST['nome']);
   $objetoFuncionario->setSenha($_POST['senha']);
   $objetoFuncionario->setPermissao($_POST['permissao']);
    
    
   $dao = new DAOFuncionario();
   $dao->cadastrarFuncionario($objetoFuncionario); 
   
	header('Location: ../view/cadastrar/funcionario/');
	
	exit;
?>