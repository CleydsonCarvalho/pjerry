<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$db_carro = new Carro();
$db_despesa = new Despesas();
$db_despCarro = new DespesasCarro();
$db_funcionario = new Funcionario();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'add_despesa' ) {

	$despesa = array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$count = count( $despesa );

	if ( $count > 2 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_despesa->create( $despesa );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'addDc' ) {

	$despCarro = array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$count = count( $despCarro );

	if ( $count > 5 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_despCarro->create( $despCarro );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$produto = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$db_produto->update( $produto );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {

	$id = $_GET[ 'id' ];
	$db_despesa->delete( $id );
}

?>


<!doctype html>
<html>

<head>
	<meta lang="pt-br">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Sistema de Vendas" content="">
	<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
	<link rel="icon" href="#">
	<title>Sistema de Vendas</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/layout-pag-despesas.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/ajustes-font.css">

	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.quick.search.js"></script>


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
			<p>Cadastrar Depesas da Empresa.</p>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
			<button type="button" class="btn btn-success btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#myModalTipo">
			Novo Tipo 
			</button>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
			<button type="button" class="btn btn-primary btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#myModal">
			Despesas em Geral
			</button>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
			<button type="button" class="btn btn-warning btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#despesaCarro">
			Despesa por Carro
			</button>
		</div>
		

		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<h4 class="zerarMargimH app-total-dispesas app-top-18"> R$ 4.567,00 </h4>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<hr class="hr-top">
		</div>
		<br>
	

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3 class="text-center"><strong>DESPESAS POR CARRO</strong></h3>

			<div class="form-group">
				<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
			</div>
			<div class="table-responsive">
				<table class="table table-hover lista-clientes" id="tabela">
					<thead>
						<tr>
							<th>Nº</th>
							<th>Carro</th>
							<th>Motorista</th>
							<th>Despesa</th>
							<th>Valor</th>
							<th>Data</th>
							<th class="app-btn-acoes text-center">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $i =0;
							foreach($db_despCarro->readAll() as $key => $valueDespCarro){ 

							$i++;
							$idCarro = $valueDespCarro->id_carro;
							$idMotorista = $valueDespCarro->id_motorista;
							$idDespesa = $valueDespCarro->id_despesa;

							foreach($db_carro->readLine($idCarro) as $key => $carro);
							foreach($db_funcionario->readLine($idMotorista) as $key => $motorista);
							foreach($db_despesa->readLine($idDespesa) as $key => $despesas);
							?>

							<td scope="row">
								<?=$i ?>.
							</td>
							<td>
								<?= $carro->modelo ?>
							</td>
							<td>
								<?= $motorista->nome ?>
							</td>
							<td>
								<?= $despesas->nome ?>
							</td>
							<td>R$
								<?=$valueDespCarro->valor ?>
							</td>
							<td>
								<?=$valueDespCarro->data ?>
							</td>

							<td class="app-btn-acoes text-center">
								<button type="button" class="btn btn-warning">Editar</button>
								<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
								<button type="button" class="btn btn-danger">Excluir</button>
								</a>

							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			<hr class="hr-mg">
			</div>
			
			
			
			
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3 class="text-center"><strong>DESPESAS EM GERAL</strong></h3>

			<div class="form-group">
				<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped lista-clientes" id="tabela">
					<thead>
						<tr>
							<th>Nº</th>
							<th>Carro</th>
							<th>Motorista</th>
							<th>Despesa</th>
							<th>Valor</th>
							<th>Data</th>
							<th class="app-btn-acoes text-center">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $i =0;
							foreach($db_despCarro->readAll() as $key => $valueDespCarro){ 

							$i++;
							$idCarro = $valueDespCarro->id_carro;
							$idMotorista = $valueDespCarro->id_motorista;
							$idDespesa = $valueDespCarro->id_despesa;

							foreach($db_carro->readLine($idCarro) as $key => $carro);
							foreach($db_funcionario->readLine($idMotorista) as $key => $motorista);
							foreach($db_despesa->readLine($idDespesa) as $key => $despesas);
							?>

							<td scope="row">
								<?=$i ?>.</td>
							<td>
								<?= $carro->modelo ?>
							</td>
							<td>
								<?= $motorista->nome ?>
							</td>
							<td>
								<?= $despesas->nome ?>
							</td>
							<td>R$
								<?=$valueDespCarro->valor ?>
							</td>
							<td>
								<?=$valueDespCarro->data ?>
							</td>

							<td class="app-btn-acoes text-center">
								<button type="button" class="btn btn-warning">Editar</button>
								<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
								<button type="button" class="btn btn-danger">Excluir</button>
								</a>

							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			<hr class="hr-mg">
			</div>

		</div>
	</div>
</div>

	<!--- MODAL DE CADASTRO DESPESAS EM GERAL -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel">Despesas Em Geral</h1>
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
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--- MODAL DE CADASTRO DESPESAS CARRO -->
	<div id="despesaCarro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">
							<span class="fa fa-car" aria-hidden="true"></span>&nbsp; <strong> Despesa por Carro</strong>
      				</h3>
				
				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="carro">Seleione o Carro:</label>

								<select name="id_carro" class="form-control" required>

									<option value=""> Selecione o Carro </option>
									<?php foreach($db_carro->readAll() as $key => $valueCarros){?>
									<option value="<?= $valueCarros->id_carro?>">
										<?= $valueCarros->modelo?>
									</option>
									<?php }?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="motorista">Motorista:</label>
								<select name="id_motorista" class="form-control">

									<option value="">Selecione o Motorista</option>

									<?php foreach($db_funcionario->buscarMotorista() as $key => $valueMotorista){?>
									<option value="<?= $valueMotorista->id_funcionario?>">
										<?= $valueMotorista->nome?>
									</option>
									<?php }?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="despesa">Tipo de Despesa:</label>
								<select name="id_despesa" class="form-control">
									<option>Selecione a Despesa</option>
									<?php foreach($db_despesa->readAll() as $key => $valueDespesas){?>
									<option value="<?= $valueDespesas->id_despesa?>">
										<?= $valueDespesas->nome?>
									</option>
									<?php }?>

								</select>
							</div>


							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="valor">Valor:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor" id="valor" class="form-control mod">
								</div>
							</div>



							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-6 app-margimBotomCamposFomr">
								<label for="data">Data da Despesa:</label>
								<input type="date" name="data" class="form-control" id="data">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="addDc" class="btn btn-info">Salvar</button>

					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--- MODAL TIPO DE DESPESAS -->
	<div id="myModalTipo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalTipo">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">
							<span class="fa fa-product-hunt" aria-hidden="true"></span>&nbsp; <strong> Novo Tipo Despesa</strong>
      				</h3>
				
				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="nome">Despesa:</label>
								<input type="text" class="form-control" name="nome" placeholder="Ex: Aguá, luz e etc." required>
							</div>

							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotomCamposFomr">
								<label for="descricao">Descrição:</label>
								<input type="text" class="form-control" name="descricao" placeholder="Anotações sobre a despesa">
							</div>


							<div class="col-lg-12">

								<div class="table-responsive">
									<table class="table table-hover" id="tabela">
										<thead>
											<tr>
												<th class="index">N</th>
												<th>Despesa</th>
												<th>Descrição</th>
												<th class="btn-excluir text-center">Excluir</th>
											</tr>
										</thead>
										<tbody>
											<tr>

												<?php $i = 0;
								foreach($db_despesa->readAll() as $key => $valueDespesas){$i++;?>
												<td scope="row">
													<?=$i ?>.</td>
												<td>
													<?=$valueDespesas->nome ?>
												</td>
												<td>
													<?=$valueDespesas->descricao ?>
												</td>

												<td class="excluir text-center">

													<a href="despesas.php?acao=excluir&id=<?=$valueDespesas->id_despesa ?>" type="button" class="delete-yes btn btn-danger">X</a>



												</td>

											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>

							</div>






						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="add_despesa" class="btn btn-info">Cadastrar</button>

					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<script>
		$( '#myModal' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )

		$( '#myModalTipo' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )

		$( '#despesaCarro' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )
	</script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>