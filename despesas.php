<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$db_carro = new Carro();
$db_despesa = new Despesas();
$db_despCarro = new DespesasCarro();
$db_funcionario = new Funcionario();
$db_tipoDesp = new TipoDespesas();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'add_despesa' ) {

	$despesa = array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$count = count( $despesa );

	if ( $count > 4 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_despesa->create( $despesa );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'add_tipoDespesa' ) {

	$tipDesp= array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$count = count( $tipDesp );
	

	if ( $count > 2 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_tipoDesp->create( $tipDesp );
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

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizarDespesa' ) {

	$despesa = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$db_despesa->update( $despesa );
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizarDespCarro' ) {

	$despesa = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$db_despCarro->update( $despesa );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluirTipo' ) {

	$id = $_GET[ 'id' ];
	$db_tipoDesp->delete( $id );
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
			<button type="button" class="btn btn-success btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#modalTipo">
			Novo Tipo 
			</button>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
			<button type="button" class="btn btn-primary btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#despesaGeral">
			Despesas em Geral
			</button>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
			<button type="button" class="btn btn-warning btn-lg btn-block app-buscarProduto app-top-18" data-toggle="modal" data-target="#despesaCarro">
			Despesa por Carro
			</button>
		</div>
		

		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<h4 class="zerarMargimH app-total-dispesas app-top-18" > R$ <span class="valorTotal"></span> </h4>
			
			
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
							<?php 
							$i =0;
							$totalDesp=0;
							foreach($db_despCarro->readAll() as $key => $valueDespCarro){ 
								$totalDesp += $valueDespCarro->valor;

							$i++;
							$idCarro = $valueDespCarro->id_carro;
							$idMotorista = $valueDespCarro->id_motorista;
							$idDespesa = $valueDespCarro->id_tipoDespesa;

							foreach($db_carro->readLine($idCarro) as $key => $carro);
							foreach($db_funcionario->readLine($idMotorista) as $key => $motorista);
							foreach($db_tipoDesp->readLine($idDespesa) as $key => $despesas);
						
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
								<button type="button" class="editar_despCarro btn btn-warning"
								data-id="<?=$valueDespCarro->id_dc ?>"
								data-id_carro="<?=<?=$valueDespCarro->id_carro ?>"
								data-id_motorista="<?=<?=$valueDespCarro->id_motorista ?>"
								data-id_tipoDespesa="<?=<?=$valueDespCarro->id_tipoDespesa ?>"
								data-valor="<?=<?=$valueDespCarro->id_valor ?>"
								data-data="<?=<?=$valueDespCarro->id_data ?>"
								>
								>Editar</button>
								
								
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
							<th>Despesa</th>
							<th>Descrição</th>
							<th>Valor</th>
							<th>Data</th>
							
							<th class="app-btn-acoes text-center">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $ii =0;
							$tDespCarro = 0;
							foreach($db_despesa->readAll() as $key => $valueDespesas){
								$tDespCarro += $valueDespesas->valor;

							$ii++;
							
							$id_tipoDespesa = $valueDespesas->id_tipoDespesa;

							foreach($db_tipoDesp->readLine($id_tipoDespesa) as $key => $despesas);
							?>

							<td scope="row">
								<?=$ii ?>.</td>
							<td>
								<?= $despesas->nome ?>
							</td>
							<td>
								<?= $valueDespesas->descricao ?>
							</td>
							<td>
								<?= $valueDespesas->valor ?>
							</td>
							
							<td>
								<?=$valueDespesas->data ?>

							</td>

							<td class="app-btn-acoes text-center">
							
								<button type="button" class="editar_despGeral btn btn-warning"
								data-id="<?=$valueDespesas->id_tipoDespesa ?>"
								data-id_despesa="<?=$valueDespesas->id_despesa ?>"
								data-descricao="<?=$valueDespesas->descricao ?>"
								data-valor="<?=$valueDespesas->valor ?>"
								data-data="<?=$valueDespesas->data ?>">
								Editar</button>
								
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

<?php
 $utilizador = number_format($totalDesp+$tDespCarro, 2,',','.');
	
  echo '<script> var utilizador = "'. $utilizador .'";
  		</script>';
?>

<script>
	
	
	$( 'span.valorTotal' ).text(utilizador ) ;

</script>
	
	
	<!--- MODAL DE CADASTRO DESPESAS EM GERAL -->
	<div id="despesaGeral" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="despesaGeral">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">
							<span class="fa fa-car" aria-hidden="true"></span>&nbsp; <strong> Despesa em Geral</strong>
      				</h3>
				
				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							
							
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 app-margimBotomCamposFomr">
								<label for="despesa">Despesa:</label>
								<select name="id_tipoDespesa" class="form-control" required>
									<option value="">Selecione a Despesa</option>
									<?php foreach($db_tipoDesp->readAll() as $key => $valueTipoDespesas){?>
									<option value="<?= $valueTipoDespesas->id_tipoDespesa?>">
										<?= $valueTipoDespesas->nome?>
									</option>
									<?php }?>

								</select>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 app-margimBotomCamposFomr">
								<label for="descrição">Descrição:</label>

								<input type="text" name="descricao" class="form-control" required>
									
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="valor">Valor:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor" id="valor" class="form-control mod" required>
								</div>
							</div>



							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-6 app-margimBotomCamposFomr">
								<label for="data">Data da Despesa:</label>
								<input type="date" name="data" class="form-control" id="data" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="add_despesa" class="btn btn-info">Salvar</button>

					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--- MODAL DE CADASTRO DESPESAS CARRO -->
	<div id="despesaCarro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="despesaCarro">
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
								<select name="id_tipoDespesa" class="form-control">
									<option>Selecione a Despesa</option>
									<?php foreach($db_tipoDesp->readAll() as $key => $valueTipoDespesas){?>
									<option value="<?= $valueTipoDespesas->id_tipoDespesa?>">
										<?= $valueTipoDespesas->nome?>
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

	<!--- MODAL CADASTRO TIPO DE DESPESAS -->
	<div id="modalTipo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTipo">
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
												foreach($db_tipoDesp->readAll() as $key => $tipoDespesas){$i++;
												
												
												?>
												
												<td scope="row">
													<?=$i ?>.</td>
												<td>
													<?=$tipoDespesas->nome ?>
												</td>
												<td>
													<?=$tipoDespesas->descricao ?>
												</td>

												<td class="excluir text-center">

													<a href="despesas.php?acao=excluirTipo&id=<?=$tipoDespesas->id_tipoDespesa ?>" type="button" class="delete-yes btn btn-danger">X</a>

												</td>
											</tr>
											<?php }
											 $utilizador = number_format($totalDesp + $tDespCarro, 2, ',', '.');;
    											echo '<script> utilizador  = "'. $utilizador .'";</script>';
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						
						<button type="submit" name="acao" value="add_tipoDespesa" class="btn btn-info">Cadastrar</button>

					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	
	
	
	<!--- MODAL EDITAR DESPESAS EM GERAL -->
	<div id="editDespesaGeral" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="despesaGeral">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">
							<span class="fa fa-car" aria-hidden="true"></span>&nbsp; <strong> Despesa em Geral</strong>
      				</h3>
				
				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							
							<input type="hidden" id="id_despesa" name="id_despesa">
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 app-margimBotomCamposFomr">
								<label for="despesa">Despesa:</label>
								<select name="id_tipoDespesa" id="despesa_edit" class="form-control">
									
								</select>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 app-margimBotomCamposFomr">
								<label for="descrição">Descrição:</label>

								<input type="text" name="descricao" id="descricao_edit" class="form-control">
									
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="valor">Valor:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor" id="valor_edit" class="form-control mod">
								</div>
							</div>



							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-6 app-margimBotomCamposFomr">
								<label for="data">Data da Despesa:</label>
								<input type="date" name="data" class="form-control" id="data_edit">
							</div>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="atualizarDespesa" class="btn btn-info">Atualizar</button>

					</div>
					
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!--- MODAL EDITAR DESPESAS CARRO -->
	<div id="editDespesaCarro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editDespesaCarro">
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
								<select name="id_tipoDespesa" class="form-control">
									<option>Selecione a Despesa</option>
									<?php foreach($db_tipoDesp->readAll() as $key => $valueTipoDespesas){?>
									<option value="<?= $valueTipoDespesas->id_tipoDespesa?>">
										<?= $valueTipoDespesas->nome?>
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
	
	
	
<script>
	$( '.editar_despGeral' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		document.getElementById( 'id_despesa' ).value = $( this ).data( 'id_despesa' );
		document.getElementById( 'descricao_edit' ).value = $( this ).data( 'descricao' );
		document.getElementById( 'valor_edit' ).value = $( this ).data( 'valor' );
		document.getElementById( 'data_edit' ).value = $( this ).data( 'data' );


		$( '#editDespesaGeral' ).modal( 'show' );

		listarDespesa();

		function listarDespesa() {

			$.ajax( {
				type: "POST",
				url: 'controller/controller_tipoDespesas.php?acao=listarTodos',
				datatype: "json",

				success: function ( data ) {
					var todasDespesas = JSON.parse( data );

					if ( todasDespesas != null ) {

						var selectbox = $( '#despesa_edit' );
						selectbox.find( 'option' ).remove();

						$.each( todasDespesas, function ( key, value ) {
	
							if ( value.id_tipoDespesa == id ) {

								$( '<option selected>' ).val( value.id_tipoDespesa ).text( value.nome ).appendTo( selectbox );
							} else {

								$( '<option>' ).val( value.id_tipoDespesa ).text( value.nome ).appendTo( selectbox );
							};
						} );
					}
				}
			} );
		};
	} );
</script>	
	
	
<script>	
		
		$( '#despesaGeral' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )

		$( '#modalTipo' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )

		$( '#despesaCarro' ).on( 'shown.bs.modal', function () {
			$( '#myInput' ).focus()
		} )
	</script>
	
	
	
	
	<script src="js/bootstrap.min.js"></script>
</body>

</html>