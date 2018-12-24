<?php
   $model = '../model/';
   require '../persistence/dao_venda.php';
   require '../persistence/dao_venda_produto.php';
   require '../persistence/dao_mesa.php';
   
   date_default_timezone_set("America/Fortaleza");
   $produto_ids = $_GET['produto_id'];
   
   $dao = new DAOMesa();
   $dao->updateStatus($_GET['mesa_id'], "ocupada");
   
   $objetoVenda = new Venda ();
   $objetoVenda->setValor($_GET['valor']);
   $objetoVenda->setTipo($_GET['tipo']);
   $objetoVenda->setMesaId($_GET['mesa_id']);
   $objetoVenda->setFuncionarioId(1);
   $objetoVenda->setDataHora(date('Y-m-d H:i:s'));
		
   $dao = new DAOVenda();
   $dao->cadastrarVenda($objetoVenda); 
   $venda_id = $dao->buscarMaxId();
   
   $dao = new DAOVendaProduto();
   
   $objetoVendaProduto = new VendaProduto();
   $objetoVendaProduto->setVendaId($venda_id);
   foreach($produto_ids as $produto){
      $objetoVendaProduto->setProdutoId($produto);
	  $objetoVendaProduto->setQuantidade(1);
	  $dao->cadastrarVendaProduto($objetoVendaProduto);
   }         
   
   header('Location: ../view/venda/nova');
	
	exit;
?>