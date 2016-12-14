<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>S.G.V</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-rotas.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<script>
	$( '#visualizarModal' ).on( 'shown.bs.modal', function () {
		$( '#myInput' ).focus()
	} )
	
</script>

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
				<form>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome">Nome da Rota:</label>
							<input type="text" class="form-control" id="nome" placeholder="Nome">
						</div>

						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="numero">Estado:</label>
							<select class="form-control">
								<option>Piaui</option>
								<option>Maranhão</option>

							</select>
						</div>

					</div>


					<button type="submit" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
				</form><br><br><br><br>

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
								<th>Código</th>
								<th>Nome da Rota</th>
								<th>Estado</th>
								<th class="app-center">Ações</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td scope="row">79</td>
								<td>Espelho 2M</td>
								<td>2</td>

								<td class="app-center">
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#visualizarModal">Visulaizar</button>
									<button type="button" class="btn btn-warning" >Editar</button>
									<button type="button" class="btn btn-danger">Excluir</button>
								</td>
							</tr>


							
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