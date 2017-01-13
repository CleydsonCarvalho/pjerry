<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$rota = new Rota();

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
		$rota->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$rota->update( $atualizar );
	 header("Location: carros.php");
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$rota->delete( $id = $_GET[ 'id' ] );
}
?>
<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Sistema de Vendas</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-rotas.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Rotas</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>

	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<h1>Rotas</h1>
				<p>Cadastro de rotas.</p>
				<hr>
				<form method="post" enctype="multipart/form-data" >

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome"><spam class="app-astericoRed">*</spam> Nome da Rota:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
						</div>

						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="estado"><spam class="app-astericoRed">*</spam> Estado:</label>
							<select name="estado" id="estado" class="form-control" required>
								<option value="">Selecione o Estado</option>
								<option >Piaui</option>
								<option >Maranhão</option>
							</select>
						</div>
						<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>

					</div>


					<button type="submit" name="acao" value="cadastrar" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
				</form><br><br><br><br>

				<!--Tabela de Clientes-->
				<h1 class="zerarMargimH">Rotas Cadastradas</h1>
				<p>Lista com todas as rotas.</p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
			
				<div class="table-responsive">
					<table class="table table-hover lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>N°</th>
								<th>Rota</th>
								<th>Estado</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $n=0;
								foreach($rota->readAll() as $key => $value_rota){ $n++;?>
								
								<td>
									<?=$n?>
								</td>
								<td>
									<?=$value_rota->nome?>
								</td>
								<td>
									<?=$value_rota->estado?>
								</td>

								<td class="app-btn-acoes">

									<button type="button" 
									data-nome="<?= $value_rota->id ?>" 
									data-rg="<?= $value_rota->nome ?>" 
									data-cpf="<?= $value_rota->estado ?>" 
									
									
									class="visualizar btn btn-success">Visualizar</button>

									<button type="button" 
										data-nome="<?= $value_rota->id ?>" 
									data-rg="<?= $value_rota->nome ?>" 
									data-cpf="<?= $value_rota->estado ?>" 
									
									class="editar btn btn-warning">Editar</button>
									
									<button type="button" 
										data-nome="<?= $value_rota->id ?>" 
									data-rg="<?= $value_rota->nome ?>" 
									data-cpf="<?= $value_rota->estado ?>" 
									
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
	</div>
	
	
	<!--- MODAL VISUALIZAR ROTAS -->
	<div id="visualizarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel"><spam class="glyphicon glyphicon-road"></spam> Visualizar Rota</h1>
				</div>
				<form>
					<div class="modal-body">

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="nome">Rota: </label>
								Rota 5 - Sul do Estado.
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="cnpj">Cidades: </label>
								Teresina → Parnaiba → Piracura → Teresina → Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura,
							</div>
							
						</div>

					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-primary">Salvar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>