<!doctype html>
<html ng-app="app">

<head>
	<title>Sistema de Vendas</title>
	<meta lang="pt-br">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Sistema de Vendas" content="">
	<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
	<link rel="icon" href="images/ico-app.png">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/layout-pag-vendas.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/ajustes-font.css">

	<script src="js/angular-1.6.1/angular.js"></script>
	<script src="js/angular-1.6.1/angular-animate.js"></script>
	<script src="js/angular-1.6.1/angular-sanitize.js"></script>
	<script src="js/ui-bootstrap-tpls-2.5.0.js.js"></script>
	<script src="js/app-vendas.js"></script>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body ng-controller="app-vendas">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Vendas</h1>
			</div>
		</div>
	</div>

	<?php 
include'menu.php';	
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="pMod">Cadastrar nova venda</p>
				<hr class="corHr">
			</div>
		</div>
	
		<form method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="row" ng-hide="status">
				
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotom">
						<label for="cliente">Cliente:</label>
						<input type="text" ng-model="buscarCliente" uib-typeahead="cliente as cliente.nome for cliente in clientesOK | filter:$viewValue | limitTo:8" class="form-control input-search" placeholder="Pesquisar por nome do cliente" autofocus autocomplete="off" ng-blur="findCliente()" required>
					</div>
					
					
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">CPF</label>
						<input type="text" ng-model="cpfCliente" class="form-control altCor" placeholder="CPF" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotom">
						<label for="cliente">Cidade</label>
						<input type="text" ng-model="cidadeCliente" class="form-control altCor" placeholder="Cidade" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotom">
						<label for="cliente">Estado</label>
						<input type="text" ng-model="estadoCliente" class="form-control altCor" placeholder="Estado" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">Status</label>
						<input type="text" ng-model="estatusCliente" class="form-control altCor" placeholder="Estatus" readonly>
					</div>
					
					
					
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 app-margimBotom">
						<label for="cliente">Vendedor:</label>
						
						<input type="text" ng-model="buscarCliente" uib-typeahead="cliente as cliente.nome for cliente in clientesOK | filter:$viewValue | limitTo:8" class="form-control input-search" placeholder="Pesquisar por nome do cliente" autofocus autocomplete="off" required>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">Data da Venda:</label>
						<input type="date" ng-model="dataVenda" class="form-control input-search" placeholder="Data" required>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">Rota:</label>
						
						<select class="form-control" ng-model="buscarRota" required >
							<option value="" >Selecione a Rota</option>
							<option ng-repeat="rota in rotas" ng-value="{{rota}}">{{rota.nome}}</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotom">
						<label for="cliente">&nbsp;</label>
						<button type="submit" ng-click="SelecionarCliente()" class="btn btn-info" >Selecionar</button>
					</div>
				</div>
		</form>
			
			
				
					
					
					
					
				<!--Div Selecionado-->
				<div class="row meu" ng-show="status">
					
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 app-margimBotom">
						<label for="cliente">Cliente</label>
						<input type="text" ng-model="clienteSelecionado" class="form-control altCor" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">Data da Venda</label>
						<input type="date" ng-model="dataVenda" class="form-control altCor" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
						<label for="cliente">Rota</label>
						
						<input type="text" ng-model="rotaSelecionado" class="form-control altCor" readonly>
					</div>	
					
					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotom">
					<label for="cliente">&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<button type="submit" ng-click="editarCliente()" class="btn btn-warning" >
						&nbsp;<Spam class="fa fa-pencil-square-o"></spam>&nbsp;Editar&nbsp;&nbsp;</button>
					</div>
				</div>
				


		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<hr class="corHr esp">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 app-margimBotomCamposFomr">
						<label for="cliente">Produto</label>
						<input type="text" ng-model="buscarProduto"  uib-typeahead="produto1 as produto1.nome for produto1 in produtosOK | filter:$viewValue | limitTo:8" class="form-control input-search" placeholder="Pesquise por nome ou código do produto" autocomplete="off">
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr text-center">
						<label for="cliente" >Quantidade</label>
						<input type="text" ng-init="quantidade=1" ng-model="quantidade" class="form-control text-center "/>
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr">
						<label for="cliente">&nbsp;</label>
						<button type="submit" ng-click="listarProduto(buscarProduto.id_produto)" class="btn btn-primary">Adicionar</button>
					</div>
				</div>

				<div class="table-responsive" ng-show="produtos.length>0">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Produto</th>
								<th >Preço</th>
								<th class="quant text-center">Quant.</th>
								<th>Total</th>
								<th class="app-btn-excluir">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="produto in produtos">
								<td class="nomedoProduto">{{produto.nome}}</td>
								<td >
									R$ {{produto.preco}}
								</td>
								<td class="text-center">
									{{produto.quantidade}}
								</td>

								<td>R$ {{produto.total}} </td>

								<td class="text-center">
								
										<button type="button" ng-click="apagar(produto)" class="btn btn-danger btn-block">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</button>
									
								
								</td>
							</tr>



						</tbody>
					</table>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3 class="text-center">Finalizar Venda</h3>
				<hr class="corHr">
				

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="valor compra">Sub-total</label>
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" value="350,00" class="form-control modW" readonly>
					</div>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="valor compra">Desconto:</label>
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" value="00.00" class="form-control">
					</div>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="valor compra">Entrada</label>
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" value="00.00" class="form-control modW">
					</div>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="valor compra">Pagamento:</label>
					<select class="form-control">
						<option>A Vista</option>
						<option>1 X</option>
						<option>2 X</option>
						<option>3 X</option>
						<option>4 X</option>
						<option>5 X</option>
						<option>6 X</option>
					</select>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="valor compra">Total</label>
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" value="350,00" class="form-control modW" readonly>
					</div>
				</div>

				
				<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
				<label>&nbsp;</label>
					<button type="submit" class="btn btn-danger btn-block">Cancelar</button>
				</div>

				<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
				<label>&nbsp;</label>
					<button type="submit" class="btn btn-success btn-block">Finzalizar</button>
				</div>
				
			</div>
		</div>
	</div>
	<br>

</body>

</html>