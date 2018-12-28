<?php
   $model = '../model/';
   require '../persistence/dao_estoque.php';
   
   $objetoEstoque = new Estoque ();
   $objetoEstoque->setProdutoId($_POST['produto']);
   $objetoEstoque->setQuantidade($_POST['quantidade']);
   $objetoEstoque->setMedida($_POST['medida']);
    
    
   $dao = new DAOEstoque();
   $dao->cadastrarEstoque($objetoEstoque); 
   
	header('Location: ../view/estoque/adicionar/');
	
	exit;
?>
<script>alert("Cadastro realizado com sucesso");</script>