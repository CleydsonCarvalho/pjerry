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

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout-pag-cadastro-produtos.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<script>
	$( '#myModal' ).on( 'shown.bs.modal', function () {
		$( '#myInput' ).focus()
	} )
</script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Produtos</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>

	<div class="container">
		<div class="row">

			<div class="col-lg-12">
				<h1>Produtos</h1>
				<p>Cadastro de produtos da Empresa.</p>
				<hr>
				<button type="button" class="btn btn-primary btn-lg pull-right app-buscarProduto" data-toggle="modal" data-target="#myModal">
		Cadastrar Produto
		</button>
			

				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">

					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Estoque</th>
								<th>Valor C</th>
								<th>Valor V</th>
								<th>Ganho %</th>
								<th>Retorno</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td scope="row">098</td>
								<td>Guarda Roupa 4 portas cinza</td>
								<td>2</td>
								<td>139,00</td>
								<td>222,40</td>
								<td>60%</td>
								<td>300,00</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
			<button type="button" class="btn btn-danger">Excluir</button>
       		</a>
								
								</td>
							</tr>
							<tr>
								<td scope="row">098</td>
								<td>Guarda Roupa 4 portas cinza</td>
								<td>2</td>
								<td>139,00</td>
								<td>222,40</td>
								<td>60%</td>
								<td>300,00</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
			<button type="button" class="btn btn-danger">Excluir</button>
       		</a>
								
								</td>
							</tr>
							<tr>
								<td scope="row">098</td>
								<td>Guarda Roupa 4 portas cinza</td>
								<td>2</td>
								<td>139,00</td>
								<td>222,40</td>
								<td>60%</td>
								<td>300,00</td>
								<td class="app-btn-acoes text-center">
									<button type="button" class="btn btn-warning">Editar</button>
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
			<button type="button" class="btn btn-danger">Excluir</button>
       		</a>
								
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
					<h1 class="modal-title" id="gridSystemModalLabel">Novo Produto</h1>
				</div>
				<form>
					<div class="modal-body">

						<div class="row">



							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" id="nome" placeholder="Nome">
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
								<label for="cnpj">CNPJ</label>
								<input type="text" class="form-control" id="cnpj" placeholder="Digite seu CNPJ">
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
								<label for="representante">Endereço</label>
								<input type="text" class="form-control" id="representante" placeholder="Digite o endreço. Ex: Rua, Avenida...">
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="bairro">Bairro</label>
								<input type="text" class="form-control" id="bairro" placeholder="Bairro">
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
								<label for="numero">Numero</label>
								<input type="text" class="form-control" id="numero" placeholder="Numero">
							</div>



						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary">Salvar</button>
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