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
	<title> Sistema de Vendas </title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/layout-pag-listar-vendas.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/ajustes-font.css">

	<script src="js/angular-1.6.1/angular.js"></script>
	<script src="js/angular-1.6.1/angular-animate.js"></script>
	<script src="js/angular-1.6.1/angular-touch.js"></script>
	<script src="js/angular-1.6.1/angular-sanitize.js"></script>>
	<script src="js/ui-bootstrap-tpls-2.5.0.js.js"></script>
	<script src="js/app-listar-venda.js"></script>
	<script src="js/angular-locale_pt-br.js"></script>
	<script src="js/ng-currency-mask.min.js"></script>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	

	<!---********************************** Modal Detalhes *******************************************-->
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
			<form method="post" enctype="multipart/form-data" autocomplete="off" >
				<div class="row">
				
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr" >
						<label for="nome">
						 Cliente</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_cliente" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label for="cnpj">&nbsp;Vendedor</label>
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
						<label for="endereço2">&nbsp;Quant. Parcelas</label>
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
	<!--- Fim do Modal Detalhes -->	

<!---*********************************** Modal Editar **************************-->
<script type="text/ng-template" id="editarModal.html">
		<div class="custom modal-header">
			<button type="button" class="close" data-dismiss="modal" ng-click="cancel()">&times;</button>
			<h4 class="modal-title">
				<strong class="size-text">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					&nbsp; Editar da Venda
				</strong>
			</h4>
		</div>
		
		<div class="modal-body">

		<!---************ Form Visualizar ***********-->
		<div ng-if="setEdit">
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="row">
				
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label class="textRed" for="nome">
						 Cliente</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_cliente" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label class="textRed" for="cnpj">&nbsp;Vendedor</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_vendedor" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label class="textRed" for="cnpj">Rota</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.nome_rota" readonly>
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label class="textRed" for="cnpj">&nbsp;Data da Venda</label>
						<input type="text" class="form-control mod" ng-model="data_venda" readonly>
					</div>
					
					
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label class="textRed" for="endereço1">&nbsp;Pagamento</label>
						<input type="text" class="form-control mod" ng-model="dadosModal.quantidade_parcelas"  readonly>
					</div>

				
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr" >
						<label class="textRed" for="representante">&nbsp;Sub-Total</label>
						<input type="text" class="form-control mod" ng-model="sub_total" readonly>
					</div>
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed" for="numero">&nbsp;Entrada</label>
						<input type="text" class="form-control mod" ng-model="entrada" readonly>
					</div>






					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed" for="bairro">&nbsp;Total</label>
						<input type="text" class="form-control mod" ng-model="total" readonly>
					</div>








					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed" for="numero">&nbsp;Valor Prestação</label>
						<input type="text" class="form-control mod" ng-model="valor_prestacao" readonly>
					</div>
					
				
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
					<label class="textRed" for="numero">&nbsp;1ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao1" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed"  for="estado">&nbsp;2ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao2" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label class="textRed" for="representante">&nbsp;3ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center mod" ng-model="prestacao3" readonly>
					</div>
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<button class="btn btn-default pull-right"  type="button" ng-click="editarVenda()">

							Alterar Dados

						</button>


					</div>

	



				</div>
			</form>
		</div>
		<!--Fim-->

				<!---************ Form Editar ***********-->
		<div ng-if="!setEdit">
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="row">
				
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label class="textRed" for="nome">
						 Cliente</label>
						<input type="text" uib-typeahead="cliente.nome for cliente in clientesOK | filter:$viewValue | limitTo:5" class="form-control" ng-model="dadosModal.nome_cliente" autofocus autocomplete="off" ng-blur="findCliente()" required>
						
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
						<label class="textRed" for="cnpj">&nbsp;Vendedor</label>
						<input type="text" class="form-control" ng-model="dadosModal.nome_vendedor" uib-typeahead="vendedor.nome for vendedor in vendedores | filter:$viewValue | limitTo:5" ng-blur="findVendedor()" autofocus autocomplete="off"  required>
						
					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label class="textRed" for="cnpj">Rota</label>
							<select class="form-control" ng-model="dadosModal.id_rota" ng-change="setNomeRota(dadosModal.id_rota)" >
							<option ng-selected="rota.idRota == dadosModal.id_rota" ng-repeat="rota in rotas" ng-value="{{rota.idRota}}"
							
							>{{rota.nome}}</option>
						</select>

					</div>
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
						<label class="textRed" for="cnpj">&nbsp;Data da Venda</label>
							<p class="input-group">
								<input type="text" class="form-control " uib-datepicker-popup="dd/MM/yyyy" ng-model="data_vendaView" is-open="popup2.opened"  ng-required="true" show-button-bar="false" ng-change="setPrestacoes(dadosModal.quantidade_parcelas, data_vendaView)"/>
								<span class="input-group-btn">
							<button type="button" class="btn btn-default" ng-click="open2()"><i class="glyphicon glyphicon-calendar"></i></button>
					  			</span>
							
							</p>
					</div>
					
				
					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
						<label class="textRed" for="valor compra">&nbsp;Pagamento</label>
						<select class="form-control" ng-model="dadosModal.quantidade_parcelas" ng-required="true" ng-change="updatePrestacoes(dadosModal.quantidade_parcelas, prestacao1Edit)" >
						
							<option ng-selected="dadosModal.quantidade_parcelas == 'À Vista'" value="0">À Vista</option>
							<option ng-selected="dadosModal.quantidade_parcelasdadosModal.quantidade_parcelasdadosModal.quantidade_parcelas == 1" value="1">1X</option>
							<option ng-selected="dadosModal.quantidade_parcelasdadosModal.quantidade_parcelas == 2" value="2">2X</option>
							<option ng-selected="dadosModal.quantidade_parcelas == 3" value="3">3X</option>
							
						</select>
					</div>


					
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr" >
						<label class="textRed" for="representante">&nbsp;Sub-Total</label>
						<input type="text" class="form-control" ng-model="sub_total" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" ng-if="!entradaSet">
						<label class="textRed" for="numero">&nbsp;Entrada</label>

						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="text" ng-model="entradaEdit" class="form-control" ng-change="calcEntrada(entradaEdit, dadosModal.quantidade_parcelas)"  ng-currency-mask>
						</div>

					</div>


					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" ng-if="entradaSet">
						<label class="textRed" for="numero">&nbsp;Entrada</label>

						
							<input type="text" ng-model="entradaSet" class="form-control" readonly="" />
						

					</div>




					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed" for="bairro">&nbsp;Total</label>
						<input type="text" class="form-control" ng-model="total" readonly>
					</div>




					
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label class="textRed" for="numero">&nbsp;Valor Prestação</label>
						<input type="text" class="form-control" ng-model="valor_prestacao" readonly>
					</div>


					
		

				

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 " ng-if="!prest1">
					<label class="textRed" for="numero">&nbsp;1ª&nbsp; Prestação</label>

						<input type="text" class="form-control text-center" uib-datepicker-popup="dd/MM/yyyy" ng-model="prestacao1Edit" is-open="popupPrest.opened"  ng-required="true" show-button-bar="false" ng-click="popup1prest()" ng-change="updatePrestacoes(dadosModal.quantidade_parcelas, prestacao1Edit)"/>
								
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 " ng-if="prest1">
					<label class="textRed" for="numero">&nbsp;1ª&nbsp; Prestação</label>

						<input type="text" class="form-control text-center" ng-model="prestacao1" readonly />
								
					</div>
				



					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
						<label class="textRed"  for="estado">&nbsp;2ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center" ng-model="prestacao2" readonly>
					</div>

					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr" >
						<label class="textRed" for="representante">&nbsp;3ª&nbsp; Prestação</label>
						<input type="text" class="form-control text-center" ng-model="prestacao3" readonly>
					</div>

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
						<button class="btn btn-info pull-right"  type="button" ng-click="salvarVenda(data_vendaView)" >

							Salvar Dados

						</button>


					</div>

	



				</div>
			</form>
		</div>
	<!--Fim-->

				
<div class="row">			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
		<div class="table-responsive">
			<table class="table table-hover lista-clientes borderTable0" id="tabela">
				<thead>
					<tr>
						<th>Nº</th>
						<th>Produto</th>		
						<th class="text-center">Valor</th>		
						<th class="text-center">Quantidade</th>
						<th>Total</th>
						<th class="largBt text-center">Ações</th>			
					</tr>
				</thead>
						
				<tbody>
					<tr ng-repeat="produto in vendidosOk" style="cursor:pointer">
						<td scope="row">
							{{$index+1}}.
						</td>
								
						<td>
							<div>
							{{produto.nome_produto}}
							</div>
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

						<td>
							<button class="btn btn-warning" type="button" ng-click="atualizar(produto, $index)" ng-disabled="produtoAdicionar">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</button>
							<button class="btn btn-danger" type="button" ng-click="deletarProduto(produto)">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>	
		</div>

		<div ng-if="produtoUpdate" >

				<h4>
					<label > Editar Produto</label>
				</h4>

				<hr class="modHr">

				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">	
					<label>Produto</label>
					<input type="text" uib-typeahead="produto as produto.nome for produto in produtosOK | filter:$viewValue | limitTo:3" class="form-control" ng-model="nomeProduto" autocomplete="off" ng-change="setCheck()">
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">	
					<label>Quantidade</label>
					<input type="text" class="form-control text-center" ng-model="produtoUpdate.quantidade"  ng-change="setCheck()" >
				</div>
				

			<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" >
				<label>&nbsp</label>
				<button type="submit" class="btn btn-success btn-block" type="button" ng-click="salvar(nomeProduto.id_produto)" ng-if="!check">
					<i class="fa fa-check" aria-hidden="true"></i>
				</button>


				<button type="submit" class="btn btn-danger btn-block" type="button" ng-click="exitDiv()" ng-if="check">
					<span class="fa fa-sign-out" aria-hidden="true"></span>
				</button>
			</div>
		</div>

		<div ng-if="produtoAdicionar" class="animate-if">

				<h4>
					<label > Adicionar Produto</label>
				</h4>

				<hr class="modHr">

				<div class="text-center alert-warning" uib-alert close="closeAlert()" ng-if="statusAlert" dismiss-on-timeout="8000">
					<alert>
						A quantidade <strong>{{add.quantidade}}</strong> do produto selecionado e maior do que a quantidade <strong>{{quantidadeProd}}</strong> de produto em estoque!
					</alert>

				</div>

				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">	
					<label>Produto</label>
					<input type="text" uib-typeahead="produto as produto.nome for produto in produtosOK | filter:$viewValue | limitTo:3" class="form-control" ng-model="add.produto" autocomplete="off" ng-change="setCheck()">
				</div>

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">	
					<label>Quantidade</label>
					<input type="text" ng-init="add.quantidade=1" ng-model="add.quantidade" class="form-control text-center "/>
				</div>
				

			<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1" >
				<label>&nbsp</label>
				<button type="submit" class="btn btn-success btn-block" type="button" ng-click="addProduto(add)" ng-if="!check">
					<i class="fa fa-check" aria-hidden="true"></i>
				</button>


				<button type="submit" class="btn btn-danger btn-block" type="button" ng-click="exitAdd()" ng-if="check">
					<span class="fa fa-sign-out" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>
</div>
				
			</div>
					
				</div>
			
				<div class="modal-footer">
					<button class="btn btn-info" type="button" ng-click="adicionarProduto()" ng-disabled="produtoUpdate">
						Adicionar Produto <i class="fa fa-cart-plus" aria-hidden="true"></i>
					</button>	
				</div>
			</form>
		</div>
	</script>
<!-- Fim do Modal Editar -->


<!---********************************** Modal Excluir *******************************************-->
	<script type="text/ng-template" id="excluirModal.html">
		<div class="custom modal-header">
			<button type="button" class="close" data-dismiss="modal" ng-click="cancel()">&times;</button>
			<h4 class="modal-title">
				<i class="fa fa-trash" aria-hidden="true"></i>
				<strong class="size-text">
				
					&nbsp; Excluir Venda
				</strong>
			</h4>
		</div>
		
		<div class="modal-body">
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
		<strong><label >Deseja excluir a venda ? </label></strong><br>
					<strong>De: </strong><span >{{dadosModal.nome_cliente}}</span> - <strong>Valor: </strong><span >{{total}}</span>.
				</div>
		
					
			</div>
		</div>
		
				<div class="modal-footer">
					<button class="btn btn-warning" type="button" ng-click="deletar()">Deletar</button>
					<button class="btn btn-info" type="button" ng-click="cancel()">Fechar</button>
					
				</div>
	 </script>
<!--- Fim do Modal Detalhes -->	

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
									
									<button type="button" class="btn btn-warning" ng-click="editar(venda)">
									Editar
									</button>
								
									<button type="button" class="btn btn-danger" ng-click="excluir(venda)">
									Excluir
									</button>
								
								</td>
								
							</tr>
						</tbody>
					</table>
					
				
					<hr class="corHr m">
						
					
				</div>
				<br>
			</div>
		</div>
	</div>
</body>
</html>