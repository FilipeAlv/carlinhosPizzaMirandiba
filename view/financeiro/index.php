<?php
	$page="Financeiro";
	$cont="Movimentações";
	include '../util/dir_financeiro.php';
	include '../util/top.php';
	require '../../persistence/dao_venda.php';
	require '../../persistence/dao_saida.php';
	$dao_saida = new DAOSaida();
	$dao_venda = new DAOVenda();
	if(array_key_exists('dataInicio',$_POST)){$dataInicio=$_POST['dataInicio']; $dataFim=$_POST['dataFim'];}
	else{$dataInicio = date("Y-m-d");$dataFim = date('Y-m-d', strtotime('+1 days'));;
	}
	$total=0;
	$dados = $dao_venda->buscarPorData($dataInicio, $dataFim);
	$dados = array_merge($dados,$dao_saida->buscarPorData($dataInicio, $dataFim));
	
	
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
				Caixa do dia <?php echo(date('d/m/Y',  strtotime($dataInicio))) ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hora</th>
					  <th>Tipo</th>
					  <th>Valor</th>
                    </tr>
                  </thead>
                  
                  <tbody>
					  <?php
						foreach($dados as $dado){
							$valor = $dado->getValor();
							if(!$dado instanceof Venda){
								$valor = 0-$valor;
							}
							$total=$total+$valor;
							$data_hora = date('d/m/Y H:i',  strtotime($dado->getDataHora()));
					  ?>
						<tr>
							<td><?=$data_hora?></td>
							<?php if($dado instanceof Venda){?>
								<td>Entrada</td>
								<td style='color:green'>R$
							<?php }else{?>
								<td>Saída</td>
								<td style='color:red'>R$
							<?php }?>
									<?php echo $dado->getValor();
									$valor = $dado->getValor()+"";
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
							<th>Total em Caixa</th>
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
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
	  
    </div>
	
	<?php
		include '../util/bottom.php';
	?>