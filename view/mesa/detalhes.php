<?php

	$page="Mesa";
	$cont="Detalhe";
	include '../util/dir_mesa.php';
	include '../util/top.php';
	require '../../persistence/dao_venda.php';
	require '../../persistence/dao_mesa.php';
	require '../../persistence/dao_produto.php';
	require '../../persistence/dao_venda_produto.php';
	date_default_timezone_set("America/Fortaleza");
	$dao_venda = new DAOVenda();
	$dao_mesa= new DAOMesa();
	$dao_produto = new DAOProduto();
	$dao_venda_produto = new DAOVendaProduto();
	$mesa = $dao_mesa->buscarPorId($_GET['id_mesa']);
	$vendas = $dao_venda->buscarPorMesaIdDia($mesa->getId(), date('Y-m-d'));
	$total=0;
	include 'pop.php';
?>
  
	<script>
		function verProdutos(id, mesa){
			window.location.href=("detalhes.php?id_mesa="+mesa+"&id="+id); 
		}
		
		function deletar(idvenda, idproduto, idmesa){
			document.getElementById('modal-deletar').style.display='block';
			document.getElementById('buttomsim').onclick = function() { 
				window.location.href=("../../controller/delete_venda_produto.php?venda_id="+idvenda+"&produto_id="+idproduto+"&mesa_id="+idmesa);
			};
			
		}
		
		function novaVenda(idmesa){
			window.location.href=("../venda/nova?mesa_id="+idmesa);
		}
		
	</script>
	
	<?php
		if(isset($_GET['status'])){
			$id=$_GET['status'];
			echo "<script>document.getElementById('modal-wrapper').style.display='block';</script>";
		}
	
	
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			echo "<script>document.getElementById('modal-wrapper').style.display='block';</script>";
			$venda_produto = $dao_venda_produto->buscarPorVenda($id);
			$produtos = '<div class="card-body mx-5"><div class="table-responsive"><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><tr><th>id</th><th>nome</th><th>valor</th><th></th></tr>';			
			
			
			foreach ($venda_produto as $venda){
				$produto = $dao_produto->buscarPorId($venda->getProdutoId());
				$valor = $produto->getValor()+"";
				$comp = "";
				if(!strstr($valor,".")){
				    $comp=".00";
				}else{
					$i = strpos($valor, ".");
					if((strlen($valor)-$i)==2){
						 $comp="0";
					}
				}
				
				$produtos = $produtos.'<tr><td>'.$produto->getId().'</td><td>'.$produto->getNome().'</td><td>'.$produto->getValor().$comp.'</td><td><span onclick="deletar('.$venda->getVendaId().','.$produto->getId().','.$mesa->getId().')" class="delete" title="Remover">&times;</span></td>'; 
				
			}
			$produtos = $produtos.'</div></div>';
			echo "<script>document.getElementById('edit').innerHTML='".$produtos."';</script>";
		}
	?> 
	 <div class="card mx-5">
		<div class="card-header">Mesas <?=$mesa->getNumero()?></div>
			<div class="card-body">
				<div class="form-control">
					Status: <?=$mesa->getStatus()?>
					
				</div>
				<input type="buttom" value="Nova venda" class="btn btn-primary mt-1" style="float:right" onclick="novaVenda(<?=$mesa->getId();?>)">
			</div>
		</div>	
            <div class="card-body mx-5">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
					  <th>Produtos</th>
                      <th>Hora</th>
					  <th>Tipo</th>
					  <th>Valor</th>
                    </tr>
                  </thead>
                  
                  <tbody>
					  <?php
						foreach($vendas as $venda){
							$hora=$venda->getDataHora();
							$total = $total+$venda->getValor();
					  ?>
						
						<tr>
							<td name="idVenda"><?php echo $venda->getId();?></td>
							<td><a href="#" onclick="verProdutos(<?=$venda->getId();?>,<?=$mesa->getId();?>)"><div class="fas fa-eye"></div></a></td>
							<td><?php echo(date('H:m:s', strtotime($hora)))?></td>
							<td><?=$venda->getTipo()?></td>
							<td>R$<?=$venda->getValor()?>,00</td>
						</tr>
					  <?php
						}
					  ?>
                  </tbody>
				  
				  <thead>
						<tr>
							<th>Total</th>
							<th></th>
							<th></th>
							<th></th>
							<th>R$<?=$total?>,00</th>
						</tr>
					</thead>  
				  
                </table>
              </div>
			  	<br>
			  	<br>
			<input type="button" class="btn btn-primary btn-block" value="Receber" onclick="receber()">
            </div>
		
    
	</div>

	
          
	<?php
		include '../util/bottom.php';
	
?>
