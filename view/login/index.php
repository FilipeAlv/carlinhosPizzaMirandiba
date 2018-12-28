<?php
	$page="Home";
	$cont="Mesas";
	include 'util/dir_home.php';
	include 'util/top.php';
	$model = '../model/';
	require '../persistence/dao_mesa.php';
	$dao_mesa = new DAOMesa();
	$mesas = $dao_mesa->listarMesas();
?>


		<div class="card mx-5">
			<div class="card-header">Mesas</div>
			<div class="card-body">
				<div class="row">
					<?php
						foreach ($mesas as $mesa){
					?>
						
							<div class="col-xl-2 col-sm-6 mb-3">
								<div class="card <?php if($mesa->getStatus()=="livre"){echo ("text-primary");}else{echo ("text-success");}?> o-hidden h-100" style="border: 1px solid <?php if($mesa->getStatus()=="livre"){echo ("#808080");}else{echo ("green");}?> ">
									<div class="card-body" >
									  <div class="card-body-icon">
										<i class="fas fa-fw fa-comments"></i>
									  </div>
									  <div style="text-align: center" class="mr-5"><b>Mesa <?=$mesa->getNumero()?></b></div>
									</div>
									<a class="card-footer <?php if($mesa->getStatus()=="livre"){echo ("text-primary");}else{echo ("text-success");}?>  clearfix small z-1" href="mesa/detalhes.php?id_mesa=<?=$mesa->getId()?>" style="border-top: 1px solid <?php if($mesa->getStatus()=="livre"){echo ("#808080");}else{echo ("green");}?>">
									  <span class="float-left">Detalhes</span>
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
			<br>
			<br>
		</div>
		
     
	
	<?php
		include 'util/bottom.php';
	
	?>
