<?php
   $model = '../model/';
   require '../persistence/dao_produto.php';
   
   $objetoProduto = new Produto ();
   $objetoProduto->setNome($_POST['nome']);
   $objetoProduto->setTipo($_POST['tipo']);
   $objetoProduto->setValor($_POST['valor']);
    
    
   $dao = new DAOProduto();
   $dao->cadastrarProduto($objetoProduto); 
   
	header('Location: ../view/cadastrar/produto/');
	
	exit;
?>