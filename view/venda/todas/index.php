<?php
	$page="Vendas";
	$cont="Vizualizar Vendas";
	include '../../util/dir_venda.php';
	include '../../util/top.php';
	require '../../../persistence/dao_venda.php';
	require '../../../persistence/dao_produto.php';
	require '../../../persistence/dao_mesa.php';
	$dao_venda = new DAOVenda();
	if(array_key_exists('dataInicio',$_POST)){$dataInicio=$_POST['dataInicio']; $dataFim=$_POST['dataFim'];}
	else{$dataInicio = date("Y-m-d");$dataFim = date('Y-m-d', strtotime('+1 days'));;
	}
	$total=0;
	$vendas = $dao_venda->buscarPorData($dataInicio, $dataFim);
?>
			
	<div class="form-group">
		<form enctype="multipart/form-data" action="../todas/index.php" method="post">
			<div class="form-row">
				<div class="col-md-5">
					<input type="date" id="dataInicio" name="dataInicio" class="form-control" required="required">
				</div>
				<div class="col-md-5">
					<input type="date" id="dataFim" name="dataFim" class="form-control" required="required">
				</div>
				
				<div class="col-md-2">
					<input type="submit" class="btn btn-primary btn-block" value="Filtrar">
				</div>
			</div>
		</form>
	</div>
			



    <div class="container">
		<div class="card mb-3 mx-5">
            <div class="card-header">
              <i class="fas fa-table"></i>
				Vendas do dia <?php echo(date('d/m/Y',  strtotime($dataInicio))) ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Hora</th>
					  <th>Tipo</th>
					  <th>Valor</th>
                    </tr>
                  </thead>
                  
                  <tbody>
					  <?php
						foreach($vendas as $venda){
							$total=$total+$venda->getValor();
							$data_hora = date('d/m/Y H:i',  strtotime($venda->getDataHora()));
					  ?>
						<tr>
							<td><?=$venda->getId()?></td>
							<td><?=$data_hora?></td>
							<td><?=$venda->getTipo()?></td>
							<td>R$<?php echo $venda->getValor();
								$valor = $venda->getValor()+"";
								if(!strstr($valor,".")){
								  echo ".00";
								}else{
									$i = strpos($valor, ".");
									if((strlen($valor)-$i)==2){
										 echo "0";
									}
								}?>
								</td>
						</tr>
					  <?php
						}
					  ?>
					  
					<thead>
						<tr>
							<th>Total</th>
							<th></th>
							<th></th>
							<th>R$<?php echo $total;
								$valor = $total+"";
								if(!strstr($valor,".")){
								  echo ".00";
								}else{
									$i = strpos($valor, ".");
									if((strlen($valor)-$i)==2){
										 echo "0";
									}
								}?>
							</th>
						</tr>
					</thead>  
					
					</tbody>
                </table>
              </div>
            </div>
          </div>
	  
	  
    </div>
	
	<?php
		include '../../util/bottom.php';
	?>