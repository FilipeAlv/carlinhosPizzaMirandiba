<?php
   $model = '../model/';
   require '../persistence/dao_venda_produto.php';
   
   $mesa_id = $_GET['mesa_id'];
   $produto_id = $_GET['produto_id'];
   $venda_id = $_GET['venda_id'];
   echo "<script> alert( $venda_id);</script>";
   $dao = new DAOVendaProduto();
   $dao->deleteProduto($venda_id, $produto_id);
   
   header('Location: ../view/mesa/detalhes.php?id_mesa='.$mesa_id.'&id='.$venda_id);
	
	exit;
?>