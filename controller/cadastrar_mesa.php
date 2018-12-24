<?php
   $model = '../model/';
   require '../persistence/dao_mesa.php';
   
   $objetoMesa = new Mesa ();
   $objetoMesa->setNumero($_POST['numero']);
   $objetoMesa->setStatus("livre");
   $check=($_POST['check']);
   $quantidade = 1;
   $dao = new DAOMesa();
   
   if($check){
	   $quantidade=($_POST['quantidade']);
   }
    
	for($i=0; $i<$quantidade; $i++){
	   $dao->cadastrarMesa($objetoMesa); 
	   $objetoMesa->setNumero($objetoMesa->getNumero()+1); 
	}
   
	header('Location: ../view/cadastrar/mesa/');
	
	exit;
?>