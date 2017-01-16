<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$rota = new Rota();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'cadastrar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$criar = array_filter( $resultado );
	$nColunas = count( $criar );

	if ( $nColunas > $nColunas ) {
		$erro = 'sim';
	} else {
		$rota->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$rota->update( $atualizar );
	 header("Location: carros.php");
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$rota->delete( $id = $_GET[ 'id' ] );
}
?>
<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Sistema de Vendas</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-rotas.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Rotas</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>

	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<h1>Rotas</h1>
				<p>Cadastro de rotas.</p>
				<hr>
				<form method="post" enctype="multipart/form-data" >

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome"><spam class="app-astericoRed">*</spam> Nome da Rota:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
						</div>

						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="estado"><spam class="app-astericoRed">*</spam> Estado:</label>
							<select name="estado" id="estado" class="form-control" required>
								<option value="">Selecione o Estado</option>
								<option >Piaui</option>
								<option >Maranhão</option>
							</select>
						</div>
						<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>

					</div>


					<button type="submit" name="acao" value="cadastrar" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
				</form><br><br><br><br>

				<!--Tabela de Clientes-->
				<h1 class="zerarMargimH">Rotas Cadastradas</h1>
				<p>Lista com todas as rotas.</p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
			
				<div class="table-responsive">
					<table class="table table-hover lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>N°</th>
								<th>Rota</th>
								<th>Estado</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $n=0;
								foreach($rota->readAll() as $key => $value_rota){ $n++;?>
								
								<td>
									<?=$n?>
								</td>
								<td>
									<?=$value_rota->nome?>
								</td>
								<td>
									<?=$value_rota->estado?>
								</td>

								<td class="app-btn-acoes">

									<button type="button" 
									data-id="<?= $value_rota->id ?>" 
									data-nome="<?= $value_rota->nome ?>" 
									data-estado="<?= $value_rota->estado ?>" 
									
									
									class="visualizar btn btn-success">Visualizar</button>

									<button type="button" 
									data-id="<?= $value_rota->id ?>" 
									data-nome="<?= $value_rota->nome ?>" 
									data-estado="<?= $value_rota->estado ?>" 
									
									class="editar btn btn-warning">Editar</button>
									
									<button type="button" 
										data-nome="<?= $value_rota->id ?>" 
									data-rg="<?= $value_rota->nome ?>" 
									data-cpf="<?= $value_rota->estado ?>" 
									
									class="excluir btn btn-info">+ Cidades</button>
									
									<button type="button" 
										data-nome="<?= $value_rota->id ?>" 
									data-rg="<?= $value_rota->nome ?>" 
									data-cpf="<?= $value_rota->estado ?>" 
									
									class="excluir btn btn-danger">Excluir</button>

								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
	</div>
	
	
	<!--- MODAL VISUALIZAR Carros -->
	<div id="ModalvisualizarCarro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel"><spam class="glyphicon glyphicon-road"></spam> Visualizar Rota</h1>
				</div>
				<form>
					<div class="modal-body">

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr font17">
								
								<span class="rota"></span> - <strong><span class="estado"></span></strong>.
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="cnpj">Cidades: </label>
								Teresina → Parnaiba → Piracura → Teresina → Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura,
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

	<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
	
	<!--Modal Editar Carros-->
	<div id="modalEditarCarro" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
							&nbsp; Editar Funcionário
						</strong>
      				</h4>
				</div>
				<div class="modal-body">
					<form action="" name="" method="post" enctype="multipart/form-data" autocomplete="off">		
					<div class="row">
					
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">			
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome Completo:</label>	
	<input type="hidden" class="form-control" id="idEdit" name="id" value="" >
							<input type="text" class="form-control" id="nomeEdit" name="nome" value="" placeholder="Digete o Nome Completo" required >
						</div>
						
						
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="rg">RG:</label>
							<input type="text" class="rdEdit form-control" id="rgEdit" name="rg" value="" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 app-margimBotomCamposFomr">
							<label for="cpf">CPF:</label>
							<input type="text" class="form-control" id="cpfEdit" name="cpf" value="" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="numero" >Status:</label>
							<select class="form-control" name="status" id="status">
								<option id="statusEdit"></option>
								<option>Ativo</option>
								<option>Negativado</option>
							</select>
						</div>
						
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="representante">Contato 1:</label>
							<input type="text" class="form-control" name="contato1" id="contato1Edit" placeholder="Telefone 1">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="representante">Contato 2:</label>
							<input type="text" class="form-control" name="contato2" id="contato2Edit" placeholder="Telefone 2">
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="referencia">Referência:</label>
							<input type="text" class="form-control" id="referenciaEdit" name="referencia" value="" placeholder="Digite seu CPF">
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="endereco">Endereço e complemento:</label>
							<input type="text" class="form-control" id="enderecoEdit" name="endereco" value="" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" id="bairroEdit" name="bairro" value="" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="regiao">Região:</label>
							<select class="form-control" name="regiao">
								<option id="regiaoEdit"></option>
								<option>Norte</option>
								<option>Sul</option>
								<option>Leste</option>
								<option>Centro</option>
								<option>Zona Rural</option>
								<option>Interior</option>
							</select>
						</div>
						
						
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="cidade">Ciade:</label>
							<input type="text" class="form-control" id="cidadeEdit" name="cidade" value="" placeholder="Cidade">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="estado">Estado:</label>
							<select class="form-control" id="estadoEditSel" name="estado">
								<option id="estadoEdit"></option>
								<option>PI</option>
								<option>MA</option>
							</select>
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="acao" value="atualizar" class="btn btn-info">Confirmar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	
	<script>
$( '.visualizar' ).on( 'click', function () {
	$( 'span.rota' ).text( $( this ).data( 'nome' ) );
	$( 'span.estado' ).text( $( this ).data( 'estado' ) );
	
	$( '#ModalvisualizarCarro' ).modal( 'show' );
} );
</script>

<script>
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		document.getElementById('nomeEdit').text = $( this ).data( 'nome' );
		document.getElementById('rgEdit').text = $( this ).data( 'rg' );
		document.getElementById('cpfEdit').text = $( this ).data( 'cpf' );
		document.getElementById('statusEdit').text = $( this ).data( 'status' );
		document.getElementById('contato1Edit').value = $( this ).data( 'contato1' );
		document.getElementById('contato2Edit').value = $( this ).data( 'contato1' );
		document.getElementById('referenciaEdit').value = $( this ).data( 'referencia' );
		document.getElementById('enderecoEdit').value = $( this ).data( 'endereco' );
		document.getElementById('bairroEdit').value = $( this ).data( 'bairro' );
		document.getElementById('regiaoEdit').text = $( this ).data( 'regiao' );
		document.getElementById('cidadeEdit').value = $( this ).data( 'cidade' );
		document.getElementById('estadoEdit').text = $( this ).data( 'estado' );
		document.getElementById('idEdit').value = id;
		$( '#modalEditarCarro' ).modal( 'show' );
	} );
</script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>