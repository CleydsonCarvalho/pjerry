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
<link rel="stylesheet" href="css/layout-pag-vendas.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<script type="text/javascript">
	
    function optionCheck(){
        var option = document.getElementById("options").value;
        if(option == "show"){
            document.getElementById("hiddenDiv").style.visibility ="visible";
        }
		if(option == "0"){
            document.getElementById("avista").style.visibility ="visible";
        }
        
    }
</script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<h1 class="app-h1-painel">Painel - Vendas1</h1>

			</div>
		</div>
	</div>
	<?php 
include'menu.php';	
?>

	<div class="container">
	
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<h1>Efetuar Nova Venda</h1>
				<p>Faça uma nova venda.</p>
				<hr>
				<form>

					<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 app-margimBotomCamposFomr">
							<input type="text" class="form-control" id="nome" placeholder="Pesquise por nome ou código">
						</div>

						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<button type="submit" class="btn btn-primary btn-block pull-right">Adicionar</button>
						</div>
					</div>


				</form><br><br>



				<h3 class="zerarMargimH">Compras no Carrinho</h3>
				<p>Lista com todos os até o momento.</p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">

					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>

								<th>Produto</th>
								<th class="text-center">Preço</th>
								<th>Qtd</th>

								<th class="text-center">Subtotal</th>
								<th class="app-btn-excluir">Excluir</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="nomedoProduto">Conjuto de Cadeiras</td>
								<td class="text-center">
									2,30
								</td>
								<td>
									<div class="form-group camposTabelas">	
										<input type="number" value="1" class="form-control" min='1' />
									</div>
								</td>

								<td class="text-center">2,30</td>

								<td class="text-center">
<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
<button type="button" class="btn btn-danger btn-block">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</a>
								

								</td>
							</tr>

							<tr>
								<td class="nomedoProduto">Conjuto de Cadeiras</td>
								<td class="text-center">
									2,30
								</td>
								<td>
									<div class="form-group camposTabelas">
										<input type="number" value="1" class="form-control" min='1' />
									</div>
								</td>

								<td class="text-center">2,30</td>

								<td class="text-center">
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
<button type="button" class="btn btn-danger btn-block">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</a>
								

								</td>
							</tr>
							<tr>
								<td class="nomedoProduto">Conjuto de Cadeiras</td>
								<td class="text-center">
									2,30
								</td>
								<td>
									<div class="form-group camposTabelas">
										<input type="number" value="1" class="form-control" min='1' />
									</div>
								</td>

								<td class="text-center">2,30</td>

								<td class="text-center">
									<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
<button type="button" class="btn btn-danger btn-block">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</a>
								

								</td>
							</tr>



						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 text-right">
				<h1>Total <span class="label label-default">$544,00</span></h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
			
			
			<select class="form-control" id="options" onchange="optionCheck()">


			<option value="0">Forma de Pagamento</option>
			<option value="show">Avista</option>
			<option value="show">Aprazo</option>

			</select>

			
			
			
			
			
			
			<hr>
				<div id="hiddenDiv" style="height:100px;width:300px;border:1px;visibility:hidden;">
				Eu estou visível agora!
				</div>
				
				<div id="avista" style="height:100px;width:300px;border:1px;visibility:hidden;">
				pagamento avista
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 pull-right">
				<button type="submit" class="btn btn-success btn-block">Pagamento</button>
			</div>
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 pull-right">
				<button type="submit" class="btn btn-warning btn-block">Guardar</button>					
			</div>
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 pull-right">	
				<button type="submit" class="btn btn-danger btn-block">Cancelar</button>				
			</div>	
		</div>
		
	</div>

	<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>