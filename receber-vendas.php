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
	<script src="js/angular-1.6.1/angular-touch.js"></script>
	<script src="js/angular-1.6.1/angular-sanitize.js"></script>
	<script src="js/ui-bootstrap-tpls-2.5.0.js.js"></script>
	<script src="js/app-vendas.js"></script>
	<script src="js/angular-locale_pt-br.js"></script>
	<script src="js/ng-currency-mask.min.js"></script>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/ng-template" id="alert.html">
		<div ng-transclude></div>
	</script>
	
	<script type="text/ng-template" id="cadastroModal.html">
		<div class="custom modal-header">
			<button type="button" class="close" data-dismiss="modal" ng-click="cancel()">&times;</button>
			<h4 class="modal-title">
				<strong class="size-text">
					<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
					&nbsp; Cadastrar Cliente
				</strong>
			</h4>
		</div>
		
		<div class="modal-body">
			<form method="post" enctype="multipart/form-data" autocomplete="off" ng-submit="ok()">
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<label for="nome">
							<spam class="app-astericoRed">*</spam> Nome Completo:</label>
						<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do cliente" required>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;Data de Nasc.:</label>
						<input type="date" class="form-control" name="data_nasc" id="data_nasc">
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;RG:</label>
						<input type="text" class="form-control" name="rg" id="rg" placeholder="RG do cliente">
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;CPF:</label>
						<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF do cliente">
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<label for="endereço1">&nbsp;Endereço 1:</label>
						<input type="text" class="form-control" name="endereco1" id="endereco1" placeholder="Digite o endreço. Ex: Rua, Avenida...">
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<label for="endereço2">&nbsp;Endereço 2:</label>
						<input type="text" class="form-control" name="endereco2" id="endereco2" placeholder="Digite o endreço. Ex: Rua, Avenida...">
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<label for="representante">&nbsp;Referência:</label>
						<input type="text" class="form-control" name="referencia" id="referencia" placeholder="Ponto de Referência">
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
						<label for="numero">&nbsp;Referência do:</label>
						<select class="form-control" name="regiao" id="regiao">
							<option>Endereço 1</option>
							<option>Endereço 2</option>
						</select>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotomCamposFomr">
						<label for="bairro">&nbsp;Bairro:</label>
						<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="numero">&nbsp;Cidade:</label>
						<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="numero">&nbsp;Região:</label>
						<select class="form-control" name="regiao" id="regiao">
							<option>Selecionar</option>
							<option>Norte</option>
							<option>Sul</option>
							<option>Leste</option>
							<option>Centro</option>
							<option>Zona Rural</option>
							<option>Interior</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label for="estado">&nbsp;Estado:</label>
						<select class="form-control" name="estado">
							<option value="Piauí">PI</option>
							<option value="Maranhão">MA</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="representante">&nbsp;Contato 1:</label>
						<input type="text" class="form-control" name="contato1" id="contato1" placeholder="Telefone 1">
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="representante">&nbsp;Contato 2:</label>
						<input type="text" class="form-control" name="contato2" id="contato2" placeholder="Telefone 2">
					</div>

					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">

						<label for="numero">&nbsp;Status:</label>
						<select class="form-control" name="status" id="status">
							<option>Ativo</option>
							<option>Negativado</option>
						</select>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="mP">
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>
					
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-danger" type="button" ng-click="cancel()">Cancel</button>
					<button class="btn btn-info" type="button" ng-click="cadastrar()">cadastrar</button>
				</div>
				
			</form>
		</div>
	</script>

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
			<br>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<p class="pMod label label-primary">Dados da Venda</p>
				<button type="button" class="btn btn-default pull-right topMod" ng-click="abrirModal()">
				<i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Novo Cliente</button>
				</p>
				<hr class="corHr esp">
			</div>
		</div>

		<form method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="row" ng-hide="status">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotom">
					<label for="cliente">Cliente:</label>
					<input type="text" ng-model="buscarCliente" uib-typeahead="cliente as cliente.nome for cliente in clientesOK | filter:$viewValue | limitTo:8" class="form-control input-search" placeholder="Pesquisar por nome do cliente" autofocus autocomplete="off" ng-blur="findCliente()" required>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
					<label for="cliente">CPF</label>
					<input type="text" ng-model="cpfCliente" class="form-control text-center" placeholder="CPF" readonly>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
					<label for="cliente">Status</label>
					<input type="text" ng-model="statusCliente" class="form-control text-center" placeholder="Status" readonly>
				</div>

				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 app-margimBotom">
					<label for="cliente">Vendedor:</label>
					<input type="text" ng-model="buscarVendedor" uib-typeahead="vendedor as vendedor.nome for vendedor in vendedores | filter:$viewValue | limitTo:8" class="form-control input-search" placeholder="Pesquisar por nome do vendedor" autofocus autocomplete="off" ng-blur="findVendedor()" required>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
					<label for="cliente">Data da Venda:</label>
					<p class="input-group">
						<input type="text" class="form-control" uib-datepicker-popup="dd-MM-yyyy" ng-model="dataVenda" is-open="popup1.opened" ng-required="true" show-button-bar="false" ng-change="setDate()"/>
						<span class="input-group-btn">
						<button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
					  </span>
					
					</p>
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
					<label for="cliente">Rota:</label>
					<select class="form-control" ng-model="buscarRota" required ng-change="findRota()">
						<option value="">Selecione a Rota</option>
						<option ng-repeat="rota in rotas" ng-value="{{rota.idRota}}">{{rota.nome}}</option>
					</select>
				</div>

				<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotom">
					<label for="cliente">&nbsp;</label>
					<button type="submit" ng-click="SelecionarCliente()" class="btn btn-info">Selecionar</button>
				</div>
			</div>
		</form>

		<!--Div Selecionado-->
		<div class="row meu" ng-show="status">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 app-margimBotom">
				<label for="cliente">Cliente</label>
				<input type="text" ng-model="clienteSelecionado" class="form-control altCor" readonly>
			</div>

			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotom">
				<label for="cliente">Status</label>
				<input type="text" ng-model="statusCliente" class="form-control altCor text-center" placeholder="Status" readonly>
			</div>

			<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotom">
				<label for="cliente">&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<button type="submit" ng-click="editarCliente()" class="btn btn-warning">
						&nbsp;<Spam class="fa fa-pencil-square-o"></spam>&nbsp;Editar&nbsp;&nbsp;</button>
			
			</div>
		</div>

		<br>
		<div class="text-center alert-warning" uib-alert close="closeAlert()" ng-if="statusAlert" dismiss-on-timeout="8000">
			<alert>
				A quantidade <strong>{{quant}}</strong> do produto selecionado e maior do que a quantidade <strong>{{quantidade_produto}}</strong> de produto em estoque!
			</alert>

		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="pMod label label-primary">Adicionar Produtos</p>
				<hr class="corHr esp">

				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 app-margimBotomCamposFomr">
						<label for="cliente">Produto</label>
						<input type="text" ng-model="buscarProduto" uib-typeahead="produto1 as produto1.nome for produto1 in produtosOK | filter:$viewValue | limitTo:5" class="form-control input-search" placeholder="Pesquise por nome do produto ou código" autocomplete="off" ng-disabled="sBuscProd">
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr text-center">
						<label for="cliente">Quantidade</label>
						<input type="text" ng-init="quantidade=1" ng-model="quantidade" class="form-control text-center "/>
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr">
						<label for="cliente">&nbsp;</label>
						<button type="submit" ng-click="listarProduto(buscarProduto.id_produto)" class="btn btn-primary">Adicionar</button>
					</div>
				</div>

				<div class="table-responsive" ng-show="produtos.length>0">

					<table class="table table-hover lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Produto</th>
								<th>Preço</th>
								<th class="quant text-center">Quant.</th>
								<th>Total</th>
								<th class="app-btn-excluir">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="produto in produtos">
								<td class="nomedoProduto">{{produto.nome}}</td>

								<td>
									R$ {{ produto.preco | currency : "" }}
								</td>

								<td class="text-center">
									{{produto.quantidade}}
								</td>

								<td>R$ {{ produto.total | currency : "" }}</td>

								<td class="text-center">

									<button type="button" ng-click="apagar(produto)" class="btn btn-danger btn-block">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</button>
								
								</td>
							</tr>
						</tbody>

					</table>

					<hr class="modHr corHr">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<spam class="pull-right fontMod"><strong>Sub-Total:</strong> {{sub_total | currency: "R$ "}}</spam>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3 class="text-center">Finalizar Venda</h3>
				<hr class="corHr">

				<form>
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label for="valor compra">Pagamento:</label>
						<select class="form-control" ng-model="parcelas" ng-change="calcParcelas()" ng-disabled="statusSelect" ng-required="true">
							<option value="" disabled="disabled">Selecionar</option>
							<option value="0">À Vista</option>
							<option value="1">1X</option>
							<option value="2">2X</option>
							<option value="3">3X</option>
							
						</select>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label for="valor compra">Entrada</label>
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="text" ng-model="entrada" class="form-control" ng-change="calcularTotal()" ng-disabled="!entradaStatus" ng-currency-mask>
						</div>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label for="valor compra">Total</label>
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="text" ng-model="total" class="form-control" placeholder="00,00" ng-currency-mask readonly>
						</div>
					</div>

					<div ng-show="parcelaS">
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="valor compra">Valor Prest.</label>
							<div class="input-group">
								<span class="input-group-addon">R$</span>
								<input type="text" ng-model="valorParcelas" class="form-control" ng-currency-mask readonly>
							</div>
						</div>

						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="valor compra">Data do Venc.</label>
							<p class="input-group">
								<input type="text" class="form-control" uib-datepicker-popup="dd-MM-yyyy" ng-model="data_venc" is-open="popup2.opened" ng-change="quantidade_parcelas()" ng-required="true" show-button-bar="false"/>
								<span class="input-group-btn">
							<button type="button" class="btn btn-default" ng-click="open2()"><i class="glyphicon glyphicon-calendar"></i></button>
					  			</span>
							
							</p>
						</div>
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr">
						<label>&nbsp;</label>
						<button class="btn btn-danger btn-block">Cancelar</button>
					</div>

					<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 app-margimBotomCamposFomr">
						<label>&nbsp;</label>
						<button class="btn btn-success btn-block" ng-click="finalizarVenda()" ng-disabled="btStatus">Finalizar</button>
					</div>
				</form>

			</div>
		</div>
		<br>
</body>

</html>