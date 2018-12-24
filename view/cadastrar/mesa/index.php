<?php
	$page="Cadastrar";
	$cont="Mesa";
	include '../../util/dir_cadastrar.php';
	include '../../util/top.php';
	require '../../../persistence/dao_mesa.php';
	$dao_mesa = new DAOMesa();
	$mesas = $dao_mesa->listarMesas();
?>
	 
    <div id="content-wrapper">
		
	
		<div class="card mx-5 mb-5">
			<div class="card-header">Nova Mesa</div>
			<div class="card-body">
			  <form action="../../../controller/cadastrar_mesa.php" method="post">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
						  <div class="form-label-group">
							<input type="text" id="numero" name="numero" class="form-control" placeholder="Numero" autofocus="autofocus">
								<label for="numero">Numero</label>
						  </div>
						  </div>
					  </div>
					</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
						  <div class="form-label-group">
							<input name="check"  value="true" class="col-md-1" type="checkbox" onchange="mostrar()">  Cadastrar Várias
						  </div>
						  </div>
					  </div>
					</div>
				<div class="form-group" id="quant" name="quant">
					<div class="form-row">
						<div class="col-md-12">
						  <div class="form-label-group">
							<input type="text" id="quantidade" name="quantidade" class="form-control" placeholder="Quantidade">
								<label for="quantidade">Quantidade</label>
						  </div>
						  </div>
					  </div>
					</div>
				
				<input type="submit" class="btn btn-primary btn-block" value="Cadastrar">
			  </form>
			</div>
		  </div>
		  
		  
		 <div class="card mx-5">
			<div class="card-header">Mesas Cadastradas</div>
				<div class="card-body">
					<div class="row">
					<?php
						foreach ($mesas as $mesa){
					?>
						
							<div class="col-xl-2 col-sm-6 mb-3">
								<div class="card text-primary o-hidden h-100" style="border: 1px solid #808080">
									<div class="card-body" >
									  <div class="card-body-icon">
										<i class="fas fa-fw fa-comments"></i>
									  </div>
									  <div style="text-align: center" class="mr-5"><b>Mesa <?=$mesa->getNumero()?></b></div>
									</div>
									<a class="card-footer text-primary clearfix small z-1" href="#" style="border-top: 1px solid #808080">
									  <span class="float-left">View Details</span>
									  <span class="float-right">
										<i class="fas fa-angle-right"></i>
									  </span>
									</a>
								</div>
							</div>
					
						
						
						
					<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
	
	
		
	<?php
		include '../../util/bottom.php';
	?>