<?php

	$page="Mesa";
	$cont="Detalhe";
	include '../util/dir_mesa.php';
	include '../util/top.php';
	require '../../persistence/dao_venda.php';
	require '../../persistence/dao_mesa.php';
	date_default_timezone_set("America/Fortaleza");
	$dao_venda = new DAOVenda();
	$dao_mesa= new DAOMesa();
	$mesa = $dao_mesa->buscarPorId($_GET['id_mesa']);
	$vendas = $dao_venda->buscarPorMesaIdDia($mesa->getId(), date('Y-m-d'));
	$total=0;
?>
	 <div class="card mx-5">
		<div class="card-header">Mesas <?=$mesa->getNumero()?></div>
			<div class="card-body">
				<div class="form-control">
					Status: <?=$mesa->getStatus()?>
				</div>
				
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
							<td><?=$venda->getId()?></td>
							<td><a href="#" onclick="open('produtos','produtos.php?venda_id=<?=$venda->getId()?>','status=no,Width=700,Height=700');"><div class="fas fa-eye"></div></a></td>
							<td><?php echo(date('H:m:s', strtotime($hora)))?></td>
							<td><?=$venda->getTipo()?></td>
							<td>R$<?=$venda->getValor()?>,00</td>
						</tr>
						</a>
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
            </div>
    
	</div>

	
          
	<?php
		include '../util/bottom.php';
	
?>
