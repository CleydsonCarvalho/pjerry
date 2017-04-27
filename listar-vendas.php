<!doctype html>

<html ng-app="app">

<head>
	<meta lang="pt-br">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Sistema de Vendas" content="">
	<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
	<link rel="icon" href="images/ico-app.png">
	<title>Sistema de Vendas</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/layout-pag-listar-vendas.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/ajustes-font.css">

	<script src="js/angular-1.6.1/angular.js"></script>
	<script src="js/angular-1.6.1/angular-animate.js"></script>
	<script src="js/angular-1.6.1/angular-touch.js"></script>
	<script src="js/angular-1.6.1/angular-sanitize.js"></script>
	<script src="js/ui-bootstrap-tpls-2.5.0.js.js"></script>
	<script src="js/app-listar-venda.js"></script>
	<script src="js/angular-locale_pt-br.js"></script>
	<script src="js/ng-currency-mask.min.js"></script>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/ng-template" id="detalhesModal.html">
		<div class="custom modal-header">
			<button type="button" class="close" data-dismiss="modal" ng-click="cancel()">&times;</button>
			<h4 class="modal-title">
				<strong class="size-text">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>
					&nbsp; Detalhes da Venda
				</strong>
			</h4>
		</div>
		
		<div class="modal-body">
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="row">
				
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="nome">
						 Nome do Cliente</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_cliente" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;Nome do Vendedor</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_vendedor" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;Rota</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_rota" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;Data Venda</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.data_venda" readonly>
					</div>
					
					
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="endereço1">&nbsp;Tipo de Pagamento</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.modo_pagamento" readonly>
					</div>

					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="endereço2">&nbsp;Total Parcelas</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.quantidade_parcelas" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="representante">&nbsp;Sub-Total</label>
						<input type="text" class="form-control mod" ng-model="sub_total" readonly>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="numero">&nbsp;Entrada</label>
						<input type="text" class="form-control mod" ng-model="entrada" readonly>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="bairro">&nbsp;Total</label>
						<input type="text" class="form-control mod" ng-model="total" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="numero">&nbsp;Valor Prestação</label>
						<input type="text" class="form-control mod" ng-model="valor_prestacao" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="numero">&nbsp;1ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao1" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label for="estado">&nbsp;2ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao2" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label for="representante">&nbsp;3ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao3" readonly>
					</div>
					
<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
			
			
				<div class="table-responsive">
					<table class="table table-hover lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Produto</th>
								
								<th class="text-center">Valor</th>
								
								<th class="text-center">Quantidade</th>
								<th>Total</th>
								
							</tr>
						</thead>
						
						<tbody>
							<tr ng-repeat="produto in vendidosOk">
								<td scope="row">
									{{$index+1}}.
								</td>
								
								<td>
									{{produto.nome_produto}}
								</td>
		
								<td class="text-center">
								
								
								R$ {{ produto.valor_produto | currency}}
								</td>
								
								<td class="text-center">
									{{produto.quantidade}}
								</td>
								
								<td>
								R$ {{ produto.total_produto | currency }}
									
								</td>

							</tr>
						</tbody>
					</table>
					
				
					
				</div>
</div>
</div>
				
			</div>
					
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-info" type="button" ng-click="cancel()">Fechar</button>
					
				</div>
				
			</form>
		</div>
	</script>
	
	
</head>

<body ng-controller="app-listar-vendas">

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="app-h1-painel">Painel - Despesas</h1>
		</div>
	</div>
</div>

<?php 
include'menu.php'
?>

	<div class="container">


	
		<br>
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
				<h3 class="text-center"><strong>VENDAS REALIZADAS</strong></h3>
				<hr class="corHr esp">
				
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				
				<div class="table-responsive">
					<table class="table table-hover lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Cliente</th>
								
								<th class="text-center">Data</th>
								
								<th>Pagamento</th>
								<th>Total</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						
						<tbody>
							<tr ng-repeat="venda in vendasOk">
								<td scope="row">
									{{$index+1}}.
								</td>
								
								<td>
									{{venda.nome_cliente}}
								</td>
		
								<td class="text-center">
								
								
								{{ venda.data_venda | date : 'dd/MM/yyyy'}}
								</td>
								
								<td>
									{{venda.modo_pagamento}}
								</td>
								
								<td>
								R$ {{ venda.total | currency : "" }}
									
								</td>
								
								<td class="app-btn-acoes text-center">
								
									<button type="button" class="btn btn-success" ng-click="detalhes(venda)">
									Detalhes
									</button>
									
									<button type="button" class="btn btn-warning">
									Editar
									</button>
								
									<button type="button" class="btn btn-danger">
									Excluir
									</button>
								
								</td>
								
							</tr>
						</tbody>
					</table>
					
					<div class="total pull-right">
						<strong>Total: </strong> R$ 375,00
					</div>
					<hr class="hr-mg">
					
				</div>
				<br>
			</div>
		</div>
	</div>
</body>
</html>