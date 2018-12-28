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
   $mesa_id = $_GET['mesa_id'];
   $objetoVenda->setValor($_GET['valor']);
   $objetoVenda->setTipo($_GET['tipo']);
   $objetoVenda->setMesaId($mesa_id);
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
   
   if(isset($_GET['venda'])){
		header("Location: ../view/mesa/detalhes.php?id_mesa=$mesa_id");
   }else{
		header('Location: ../view/venda/nova');
   }
	exit;
?>