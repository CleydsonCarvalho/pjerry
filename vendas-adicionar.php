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
	
function showDiv(div)
{
document.getElementById("avista").className = "invisivel";
document.getElementById("aprazo").className = "invisivel";


document.getElementById(div).className = "visivel";
}
</script>

</head>

<body>
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
			
			<select class="form-control" id="combobox" name="combobox" onChange="showDiv(this.value);">
				<option value="0">Metodo de Pagamento</option>
				<option value="avista">Avista</option>
				<option value="aprazo">Aprazo</option>
				
			</select>
			

			
			
			
			
			
			
			<hr>
				<div id="inicio" class="invisivel">Metado de Pagamento</div>
				<div id="avista" class="invisivel">Pagamento Avista</div>
				<div id="aprazo" class="invisivel">
					<?php 
					
		
					
						$valor = 444;
						$parcela = 4;
						$resultado = $valor/$parcela;
						$formatado = number_format($resultado, 2,",", "");

						echo "<p><small><b>Parcele em até '".$parcela."' X sem juros de '".$formatado."'</b></small><br />";
					
						for ( $i=1; $i <= $parcela; $i++ ) {
						echo '<small>'.$i.'x de '.$formatado = number_format($valor/$i, 2,",", "").'</small><br />';	
						}
						echo '</p>';

					
					?>
					
					<hr>
					
					
					
					
				<?php 
					
					function calcularParcelas($nParcelas, $dataPrimeiraParcela = null){
						if($dataPrimeiraParcela != null){
						$dataPrimeiraParcela = explode( "/",$dataPrimeiraParcela);
						$dia = $dataPrimeiraParcela[0];
						$mes = $dataPrimeiraParcela[1];
						$ano = $dataPrimeiraParcela[2];
						} else {
						$dia = date("d");
						$mes = date("m");
						$ano = date("Y");
						}

						for($x = 0; $x < $nParcelas; $x++){
						echo date("d/m/Y",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano))),"<br/>";
						}
					}

					echo "Calcula as parcela a partir de hoje<br/>";
					calcularParcelas(3);
					
					
					echo "<br/><br/>";
					echo "Calcula as parcela a partir de uma data qualquer<br/>";
					calcularParcelas(3, "20/12/2016");
					
					?>
					
					
					
					
					
					
					
					
					
					
					
					
					
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