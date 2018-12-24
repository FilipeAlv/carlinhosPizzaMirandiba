<?php
	$page="Vendas";
	$cont="Nova Venda";
	include '../../util/dir_venda.php';
	include '../../util/top.php';
	require '../../../persistence/dao_venda.php';
	require '../../../persistence/dao_produto.php';
	require '../../../persistence/dao_mesa.php';
	$dao_venda = new DAOVenda();
	$vendas = $dao_venda->listarVendas();
    $dao_produto = new DAOProduto();
    $produtos = $dao_produto->listarProdutos();
    $dao_mesa = new DAOMesa();
    $mesas = $dao_mesa->listarMesas();
	include 'pop.html';
?>
	
    <script>
		valor = 0;
		compUrl="";
		function confirmar(){
		   document.getElementById('modal-wrapper').style.display='block';
		   var produtos = document.getElementsByName('check');
		   var ids = document.getElementsByName('id');
		   var valores = document.getElementsByName('valor');
		   var selectTipo = document.getElementById("tipo");
		   var tipo = selectTipo.options[selectTipo.selectedIndex].value;
		   var selectMesa = document.getElementById("mesa");
		   var mesa = selectMesa.options[selectMesa.selectedIndex].value;
		   compUrl = "mesa_id="+mesa+"&tipo="+tipo;
		   for(var i = 0; i<produtos.length;i++){
			   if(produtos[i].checked){
				   var produto = ids[i].innerHTML;
				   valor=valor+parseInt(valores[i].innerHTML);
				   compUrl=compUrl+"&produto_id[]="+produto;
				}
		   }
		   document.getElementById('tipopop').value = tipo;
		   document.getElementById('mesapop').value = mesa;
		   document.getElementById('valorpop').value = "R$"+valor;
		}
		  
		   
		function cadastrar(){
			window.location.href="<?=$controller?>cadastrar_venda.php?"+compUrl+"&valor="+valor;
			alert("Venda Realizada com Sucesso!");
			
		}
	</script>

    <div class="container">
		<div class="card mx-5 mb-5">
			<div class="card-header">Nova Venda</div>
			<div class="card-body">
				<form method="post">
				
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<select id="tipo" name="tipo" class="form-control" required="required">
										<option value="" disabled selected>Selecione o tipo de venda...</option>
										<option value="mesa">Mesa</option>
										<option value="delivery">Delivery</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<select id="mesa" name="mesa" class="form-control">
										<option value="" disabled selected>Selecione a mesa...</option>
										<?php
											foreach($mesas as $mesa){
										?>
												<option value="<?=$mesa->getId()?>" <?php if($mesa->getStatus()!="livre"){?> style="color:#cc0000"<?php } ?>><?=$mesa->getNumero()?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<label>Produtos:</label>
					<div class="form-group">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Id</th>
											<th>Nome</th>
											<th>Valor</th>
											<th>Adicionar</th>
										</tr>
									</thead>
								  
									<tbody>
										<?php
											foreach($produtos as $produto){
												if($produto->getTipo()=="venda"){
										?>
													<tr>
														<td name="id"><?=$produto->getId()?></td>
														<td><?=$produto->getNome()?></td>
														<td name="valor"><?=$produto->getvalor()?></td>
														<td><input type="checkbox" name="check"></td>
													</tr>
										<?php
													}
												}
										?>
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
					<input type="button" class="btn btn-primary btn-block" value="Confirmar" onclick="confirmar()">
			  </form>
			</div>
		</div>	
		<br>
		<br>
    </div>
	
	<?php
		include '../../util/bottom.php';
	?>