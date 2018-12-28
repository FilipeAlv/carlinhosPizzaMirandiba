<?php
	$page="Cadastrar";
	$cont="Funcionario";
	include '../../util/dir_cadastrar.php';
	include '../../util/top.php';
	require '../../../persistence/dao_funcionario.php';
	$dao_funcionario = new DAOFuncionario();
	$funcionarios = $dao_funcionario->listarFuncionarios();

?>


    <div id="content-wrapper">	
		<div class="card mx-5 mb-5">
			<div class="card-header">Novo Funcionario</div>
			<div class="card-body">
				<form action="../../../controller/cadastrar_funcionario.php" method="post">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-label-group">
									<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
									<label for="nome">Nome</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-label-group">
									<select type="text" id="permissao" name="permissao" class="form-control" required="required">
										<option value="funcionario">Funcionario</option>
										<option value="administrador">Administrador</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-label-group">
									<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required="required">
									<label for="senha">Senha</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-label-group">
									<input type="password" id="confirmarSenha" name="confirmarSenha" class="form-control" placeholder="Confirmar Senha" required="required">
									<label for="confirmarSenha">Comfirmar Senha</label>
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
				Funcionarios Cadastrados
			</div>
            <div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Permissão</th>
							</tr>
						</thead>
                  
						<tbody>
							<?php
								foreach($funcionarios as $funcionario){
							?>
									<tr>
										<td><?=$funcionario->getNome()?></td>
										<td><?=$funcionario->getPermissao()?></td>
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