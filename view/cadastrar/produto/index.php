<?php
	$page="Cadastrar";
	$cont="Produto";
	include '../../util/dir_cadastrar.php';
	include '../../util/top.php';
	require '../../../persistence/dao_produto.php';
	$dao_produto = new DAOProduto();
	$produtos = $dao_produto->listarProdutos();

?>




    <div id="content-wrapper">	
	
	
      <div class="card mx-5 mb-5">
        <div class="card-header">Novo Produto</div>
        <div class="card-body">
            <form action="../../../controller/cadastrar_produto.php" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
				    </div>
			    </div>
			    <div class="form-group">
				    <div class="form-row">
					    <div class="col-md-12">
					        <div class="form-label-group">
						        <select type="text" id="tipo" name="tipo" class="form-control" required="required">
							        <option value="venda">Venda</option>
							        <option value="materia">Matéria</option>
						        </select>
					         </div>
					    </div>
				    </div>
                </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="text" id="valor" name="valor" class="form-control" placeholder="Senha">
                    <label for="valor">Valor</label>
                  </div>
                </div>
				</div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Cadastrar">
          </form>
        </div>
      </div>
	  
	  <!-- Table -->
	  
	   <div class="card mb-3 mx-5">
            <div class="card-header">
				<i class="fas fa-table"></i>
				Produtos Cadastrados</div>
            <div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Tipo</th>
								<th>Valor</th>
							</tr>
						</thead>
                  
						<tbody>
							 <?php
								foreach($produtos as $produto){
							?>
							<tr>
								<td><?=$produto->getNome()?></td>
								<td><?=$produto->getTipo()?></td>
								<td>R$<?=$produto->getValor()?></td>
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
		include '../../util/bottom.php';
	?>