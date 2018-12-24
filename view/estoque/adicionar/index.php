<?php
	$page="Estoque";
	$cont="Adicionar Produtos";
	include '../../util/dir_estoque_add.php';
	include '../../util/top.php';
	require '../../../persistence/dao_produto.php';
	$dao_produto = new DAOProduto();
    $produtos = $dao_produto->listarProdutos();
?>


    <div class="container">
		<div class="card mx-5 mb-5">
			<div class="card-header">Adicionar Produtos ao Estoque</div>
			<div class="card-body">
				<form action="../../../controller/adicionar_produto.php" method="post">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group">
									<select type="text" id="produto" name="produto" class="form-control" required="required">
										<option value="" disabled selected>Selecione o produto...</option>
										<?php
											foreach($produtos as $produto){
										?>
												<option value="<?=$produto->getId()?>"> <?=$produto->getNome()?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-label-group">
									<input type="text" id="quantidade" name="quantidade" class="form-control" placeholder="Quantidade" required="required">
									<label for="quantidade">Quantidade</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-label-group">
									<select type="text" id="medida" name="medida" class="form-control" required="required">
										<option value="" disabled selected>Selecione a unidade de  Medida...</option>
										<option value="unidade">Unidade</option>
										<option value="quilo">Quilo</option>
										<option value="grama">Grama</option>
										<option value="litro">Litro</option>
										<option value="garrafa">Garrafa</option>
										<option value="lata">Lata</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<input type="submit" class="btn btn-primary btn-block" value="Cadastrar">
					
				</form>
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
    </div>
	
	<?php
		include '../../util/bottom.php';
	?>