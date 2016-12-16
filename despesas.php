<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
<link rel="icon" href="#">
<title>S.G.V</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout-pag-despesas.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/ajustes-font.css">

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<script>
	$('#myModal').on('shown.bs.modal', function(){
		$('#myInput').focus()
	})

	$('#myModalTipo').on('shown.bs.modal', function(){
		$('#myInput').focus()
	})
</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Despesas</h1>
			</div>
		</div>
	</div>

<?php include'menu.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h1>Despesas</h1>
				<p>Despesas da Empresa.</p>
				<hr>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<button type="button" class="btn btn-success btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#myModalTipo">
				Novo Tipo 
				</button>			
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<button type="button" class="btn btn-primary btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#myModal">
				Cadastrar Despesa
				</button>		
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<h2 class="zerarMargimH app-total-dispesas app-top-18">4.567.00</h2>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Código</th>
								<th>Produto</th>
								<th>Quant.</th>
								<th>Valor Compra</th>
								<th>Valor à Vista</th>
								<th>Valor a Prazo</th>
								<th>Lucro à Vista / Prazo</th>
								<th>Retorno %</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td scope="row">098</td>
								<td>Shampoo</td>
								<td>12</td>
								<td>R$ 25,00 und.</td>
								<td>R$ 35,00</td>
								<td>R$ 42,00</td>
								<td>R$ 10,00 / R$ 17,00</td>
								<td>30 %</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
									<button type="button" class="btn btn-danger">Excluir</button>
									</a>							
								</td>
							</tr>
							<tr>
								<td scope="row">79</td>
								<td>Creme Esfoliante para bebe 2 anos</td>
								<td>25</td>
								<td>R$ 27,00 und.</td>
								<td>R$ 42,00</td>
								<td>R$ 55,00</td>
								<td>R$ 22,00 / R$ 27,00</td>
								<td>20 %</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<button type="button" class="btn btn-danger">Excluir</button>
								</td>
							</tr>
							<tr>
								<td scope="row">69</td>
								<td>Sabonete Intimo</td>
								<td>16</td>
								<td>R$ 22,00 und.</td>
								<td>R$ 37,00</td>
								<td>R$ 51,00</td>
								<td>R$ 16,00 / R$ 19,00</td>
								<td>42 %</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<button type="button" class="btn btn-danger">Excluir</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>

	<!--- MODAL DE CADASTRO DE PRODUTOS -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel">Nova Despesas</h1>
				</div>
				<form>
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-12 app-margimBotomCamposFomr">
								<label for="data">Tipo de Despesa:</label>
								<select class="form-control">
									<option>Carro</option>
									<option>Manuntenção</option>
									<option>Alimentação</option>
									<option>Luz</option>
									<option>Água</option>
									<option>Viagem</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-12 app-margimBotomCamposFomr">
								<label for="data">Seleione o Carro:</label>
								<select class="form-control">
									<option>Palio Branco </option>
									<option>Kombis</option>
									<option>Fiat Uno</option>
									<option>Strada</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-12 app-margimBotomCamposFomr">
								<label for="data">Motorista:</label>
								<select class="form-control">
									<option>Carlos</option>
									<option>Roberto</option>
									<option>Jose</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 app-margimBotomCamposFomr">
								<label for="valor">Valor:</label>
								<input type="text" class="form-control" id="valor" placeholder="Digite uma valor">
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-6 app-margimBotomCamposFomr">
								<label for="data">Data da Despesa:</label>
								<input type="date" class="form-control" id="data">
							</div>
						</div>
					</div>				
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">Salvar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div id="myModalTipo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalTipo">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel">Novo Tipo de Despesas</h1>
				</div>
				<form>
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="valor">Nome</label>
								<input type="text" class="form-control" id="valor" placeholder="Digite um nome">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">Salvar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<script src="js/bootstrap.min.js"></script>
</body>
</html>