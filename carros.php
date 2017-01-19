<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$carro = new Carro();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'cadastrar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$criar = array_filter( $resultado );
	$nColunas = count( $criar );

	if ( $nColunas > $nColunas ) {
		$erro = 'sim';
	} else {
		$carro->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$carro->update( $atualizar );
	// header("Location: carros.php");
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$carro->delete( $id = $_GET[ 'id' ] );
}
?>
<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson Carvalho & Jhontas de Oliveira" content="">
<link rel="icon" href="#">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-carros.css">
<link rel="stylesheet" href="css/ajustes-font.css">

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<title>Sistema de Vendas</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Carros</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Carros</h1>
				<p>Cadastro de carros da Empresa.</p>
				<hr>
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="cor"><spam class="app-astericoRed">*</spam> Cor:</label>
							<select name="cor" id="cor" class="form-control" required>
								<option value="">Selecione</option>
								<option>Branco</option>
								<option>Preto</option>
								<option>Amarelo</option>
								<option>Azul</option>
								<option>Vermelho</option>
								<option>Verde</option>
								<option>Cinza</option>
								<option>Dourado</option>
								<option>Prateado</option>
								<option>Outra</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="marca">
								<spam class="app-astericoRed">*</spam> Marca:</label>
							<select name="marca" id="marca" class="form-control" required>
								<option value="">Selecione</option>
								<option>Fiat</option>
								<option>Ford</option>
								<option>Honda</option>
								<option>Nissan</option>
								<option>Renault</option>
								<option>Toyota</option>
								<option>Volkswagen</option>
								<option>Outra</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="modelo">
								<spam class="app-astericoRed">*</spam> Modelo:</label>
							<input type="text" name="modelo" id="modelo" class="form-control"  placeholder="Digite o Modelo" required>
						</div>
						
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="representante">
								<spam class="app-astericoRed">*</spam> Placa:</label>
							<input type="text" name="placa" id="placa" class="form-control"  placeholder="Digite a Placa" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
						<div>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>
					
					<button type="submit" name="acao" value="cadastrar" class="btn btn-primary btn-lg pull-right">Cadastrar</button>
					
				</form><br><br><br><br>

				<h1 class="zerarMargimH">Carros Cadastrados</h1>
				<p>Lista com todos os carros da empresa.</p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>N°</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Cor</th>
								<th>Placa</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php foreach($carro->readAll() as $key => $value_carro){  ?>
								<td scope="row"><?=$value_carro->id?></td>
								<td><?=$value_carro->marca?></td>
								<td><?=$value_carro->modelo?></td>
								<td><?=$value_carro->cor?></td>
								<td><?=$value_carro->placa?></td>
	
								<td class="app-btn-acoes text-center">
									<button type="button" 

									data-id="<?= $value_carro->id ?>"
									data-cor="<?= $value_carro->cor ?>"
									data-marca="<?= $value_carro->marca ?>"
									data-modelo="<?= $value_carro->modelo ?>"
									data-placa="<?= $value_carro->placa ?>"
									
									
									  class="editar btn btn-warning">Editar</button>
									  
									  
									<button type="button" 
									data-id="<?= $value_carro->id ?>"
									data-modelo="<?= $value_carro->modelo ?>"
									data-cor="<?= $value_carro->cor ?>"
									
									
									
									
									class="excluir btn btn-danger">Excluir</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<!--Modal Editar Funcionarios-->
	<div id="modalEditarCarro" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
							&nbsp; Editar Funcionário
						</strong>
      				</h4>
				</div>
				<div class="modal-body">
					<form action="" name="" method="post" enctype="multipart/form-data" autocomplete="off">		
					<div class="row">
					<input type="hidden" class="form-control" id="idEdit" name="id" value="" >
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						
							<label for="cor"><spam class="app-astericoRed">*</spam> Cor:</label>
								
							<select name="cor" id="corEdit" class="form-control" required>
							
								<option>Branco</option>
								<option>Preto</option>
								<option>Amarelo</option>
								<option>Azul</option>
								<option>Vermelho</option>
								<option>Verde</option>
								<option>Cinza</option>
								<option>Dourado</option>
								<option>Prateado</option>
								<option>Outra</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="marca">
								<spam class="app-astericoRed">*</spam> Marca:</label>
								
							<select id="marcaEdit" name="marca" class="form-control" required>
								
								
								<option>Fiat</option>
								<option>Ford</option>
								<option>Honda</option>
								<option>Nissan</option>
								<option>Renault</option>
								<option>Toyota</option>
								<option>Volkswagen</option>
								<option>Outra</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="modelo">
								<spam class="app-astericoRed">*</spam> Modelo:</label>
							<input type="text" name="modelo" id="modeloEdit" class="form-control"  placeholder="Digite o Modelo" required>
						</div>
						
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="representante">
								<spam class="app-astericoRed">*</spam> Placa:</label>
							<input type="text" name="placa" id="placaEdit" class="form-control"  placeholder="Digite a Placa" required>
						</div>
						
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="acao" value="atualizar" class="btn btn-info">Confirmar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	<!--Modal Excluir Carros-->
	<div id="modalExcluirCarro" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
							&nbsp; Excluir Funcionário
						</strong>
      				</h4>
				</div>
				<div class="modal-body">
					<strong><label class="laber-txt">Deseja excluir o Carro ?</label></strong><br>
					
					 <span class="modelo app-span"></span> <span class="cor app-span"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<a href="#" type="button" class="btn btn-info delete-yes">Confirmar</a>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		document.getElementById('corEdit').value = $( this ).data( 'cor' );
		document.getElementById('marcaEdit').value = $( this ).data( 'marca' );
		document.getElementById('modeloEdit').value = $( this ).data( 'modelo' );
		document.getElementById('placaEdit').value = $( this ).data( 'placa' );
		document.getElementById('idEdit').value = id;
		$( '#modalEditarCarro' ).modal( 'show' );
	} );
</script>

<script>
	$( '.excluir' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		$( 'span.modelo' ).text( $( this ).data( 'modelo' ) );
		$( 'span.cor' ).text( $( this ).data( 'cor' ) );

		$( 'a.delete-yes' ).attr('href', 'carros.php?acao=excluir&id='+id );
		$( '#modalExcluirCarro' ).modal( 'show' );
	} );
</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>