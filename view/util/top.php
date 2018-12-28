
<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carlinhos Pizza - Mirandiba</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo $dir ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo $dir ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo $dir ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $dir ?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <div id="wrapper">

      <!-- Sidebar -->
	 
      <ul class="sidebar navbar-nav">
		<li class="nav-item active">
          <a class="nav-link" href="<?=$index?>">
            <span style="font-size:20px; ">Carlinhos Pizza</span>
			<i class="fas fa-fw "><img src="http://carlinhospizza.000webhostapp.com/src/logo.png" style="width:45px;"></i>
          </a>
        </li>
        <li class="nav-item active" style="border-top:1px solid #666;border-bottom:1px solid #666; background-color: #404854">
          <a class="nav-link" href="<?=$index?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Cadastro</span>
          </a>
          <div class="dropdown-menu" >
            <h6 class="dropdown-header">Cadastrar:</h6>
            <a class="dropdown-item" href="<?=$cadastrar ?>funcionario">Funcionario</a>
            <a class="dropdown-item" href="<?=$cadastrar ?>produto">Produto</a>
            <a class="dropdown-item" href="<?=$cadastrar ?>mesa">Mesa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Venda</span>
          </a>
          <div class="dropdown-menu" >
            <h6 class="dropdown-header">Vendas:</h6>
            <a class="dropdown-item" href="<?=$venda ?>nova">Nova venda</a>
            <a class="dropdown-item" href="<?=$venda ?>dia">Vendas do dia</a>
			<a class="dropdown-item" href="<?=$venda ?>todas">Vizualizar vendas</a>
          </div>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Estoque</span>
          </a>
          <div class="dropdown-menu" >
            <h6 class="dropdown-header">Estoque:</h6>
            <a class="dropdown-item" href="<?=$estoque ?>estoque">Ver Estoque</a>
            <a class="dropdown-item" href="<?=$estoque ?>estoque/adicionar">Adicionar Produtos</a>
          </div>
        </li>
		
		
        <li class="nav-item" >
          <a class="nav-link" href="financeiro">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Financeiro</span></a>
        </li>
		
      </ul>
	     <div id="content-wrapper" style="padding:0px;">
			
			<nav class="navbar navbar-expand navbar-dark bg-primary static-top">
				<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
				</button>
				 <a class="navbar-brand mr-1" href="<?=$index?>">Mirandiba</a>
			  <!-- Navbar -->
			  <ul class="navbar-nav ml-auto" >
				<li class="nav-item dropdown no-arrow">
				  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
				  </a>
				  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
				  </div>
				</li>
			  </ul>

			</nav>
			<div class="container-fluid"> 
			  <ol class="breadcrumb" style="margin-top:15px;">
					<li class="breadcrumb-item">
					  <a href="#"><?=$page?></a>
					</li>
					<li class="breadcrumb-item active"><?=$cont?></li>
				  </ol>
