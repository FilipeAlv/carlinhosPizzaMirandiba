<?php
	$page="Estoque";
	$cont="Produtos";
	include '../util/dir_estoque.php';
	include '../util/top.php';
	require '../../persistence/dao_produto.php';
	require '../../persistence/dao_estoque.php';
	$dao_estoque = new DAOEstoque();
	$dao_produto = new DAOProduto();
	$estoques = $dao_estoque->listarEstoques();
?>


    <div class="container">
	   <div class="card mb-3 mx-5">
            <div class="card-header">
              <i class="fas fa-table"></i>
				Produtos em Estoque
			</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Tipo</th>
                      <th>Valor</th>
                      <th>Quantidade</th>
                    </tr>
                  </thead>
                  
                  <tbody>
				  <?php
						foreach($estoques as $estoque){
						    $produto = $dao_produto->buscarPorId($estoque->getProdutoId());
					  ?>
						<tr>
							<td><?=$produto->getNome()?></td>
							<td><?=$produto->getTipo()?></td>
							<td><?=$produto->getValor()?></td>
							<td><?=$estoque->getQuantidade()?></td>
						</tr>
					  <?php
						}
					  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
	  
	  
	  
	  
    </div>
	
	<?php
		include '../util/bottom.php';
	?>