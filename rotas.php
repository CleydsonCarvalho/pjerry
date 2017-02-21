<?php
function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$rota = new Rota();
$relacao_rce = new Relacao_rce();
$estado = new Estados();
$cidade = new Cidades();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'gravarEstado' ) {

	$criar = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$res = count( $criar );

	if ( $res > $res ) {

		$erro = 'sim';

	} else {

		$rota->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'gravarCidade' ) {

	// CAMPOS NEGADOS
	$remover = array(
		$_POST[ 'acao' ],
		$_POST[ 'estado' ],
		$_POST[ 'rota' ],
	);
	// RETIRA DO ARRAY Os CAMPOS NEGADOS
	$resultado = array_diff( $_POST, $remover );
	$criar = array_filter( $resultado );


	$res = count( $criar );

	if ( $res > $res ) {

		$erro = 'sim';

	} else {

		$relacao_rce->create( $criar );
	}

}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'salvar' ) {

	//$buscaUsers = $users->readLine( $id = $_POST[ 'id' ] );

	// CAMPOS NEGADOS
	$remover = array(
		$_POST[ 'acao' ],
	);
	// RETIRA DO ARRAY Os CAMPOS NEGADOS
	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$users->update( $atualizar );
	//var_dump($atualizar);


}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$users->delete( $id = $_GET[ 'id' ] );
	$tipo_clientes->deletex( $id = $_GET[ 'id' ] );
	$sistemacliente->deletex( $id = $_GET[ 'id' ] );


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

<script src="angular.js"></script>

<!--<script>
	angular.module( "rota", [] );
	angular.module( "rota" ).controller( "controle", function ( $scope, $http ) {


		$scope.app= $('demoEstado').value;
			console.log($scope.app);
		var listarCidades = function(){
		
		
			//$http.get( '/controller/controller_rota.php?acao=listarCidades' )
				//.then( function ( dados ) {
						//$scope.cidades = dados.data;
				//console.log($scope.cidades);
						
					//} );
			};
		
	} );
</script>-->

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
				<form method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome da Rota:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
						</div>

						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="estado">
								<spam class="app-astericoRed">*</spam> Estado:</label>

							<select name="idEstado" id="estado" class="form-control" required>
								<option value="">Selecione o Estado</option>
								<?php foreach($estado->readAll() as $key => $value_estado){?>
								<option value="<?=$value_estado->idEstado?>">
									<?=$value_estado->estado?>
								</option>
								<?php }?>
							</select>

						</div>
						<div>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>

					<button type="submit" name="acao" value="gravarEstado" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
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
						<tbody ng-controller="controle">
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
									<?php foreach($estado->readLine($value_rota->idEstado) as $key => $valueEstado): ?>
									<?= $valueEstado->estado ?>

									<?php endforeach; ?>

								</td>

								<td>

									<input type="hidden" id="idEstado" value="<?=$valueEstado->idEstado; ?>">
									<input type="hidden" id="idRota" value="<?=$value_rota->idRota?>">

									<button type="button" data-nome="<?=$value_rota->nome?>" data-estado="<?= $valueEstado->estado; ?>" data-id_rota="<?=$value_rota->idRota?>" class="visualizar btn btn-success">Visualizar</button>

									<button type="button" id="btn" value="<?=$valueEstado->estado?>" data-rota="<?=$value_rota->nome?>" data-estado="<?=$valueEstado->estado?>" data-id_estado="<?=$valueEstado->idEstado?>" data-id_rota="<?=$value_rota->idRota?>" class="editar btn btn-warning">Cidades</button>

									<button type="button" data-nome="" class="excluir btn btn-danger">Excluir</button>

								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>

	<script>
		$( '.visualizar' ).on( 'click', function () {
			$( 'span.rota' ).text( $( this ).data( 'nome' ) );
			$( 'span.estado' ).text( $( this ).data( 'estado' ) );
			var idRota = document.getElementById( 'id_rota' ).value = $( this ).data( 'id_rota' );
			$( '#ModalvisualizarCarro' ).modal( 'show' );

			cidadesId();

			function cidadesId() {
				$.ajax( {
					url: '/controller/controller_rota.php?acao=cidadesId&idRota=' + idRota,
					datatype: "json",
					success: function ( data ) {

						var idCidades = JSON.parse( data );
						if ( idCidades != null ) {
							var i = 0;
							var div = $( '#demo_cidades' );
							div.find( 'span' ).remove();

							$.each( idCidades, function ( key, value ) {

								var cidade_idd = value.idCidade;

								$.ajax( {
									url: '/controller/controller_rota.php?acao=idCidade&idCidade=' + cidade_idd,
									datatype: "json",
									success: function ( data ) {

										var idCidades = JSON.parse( data );

										if ( idCidades != null ) {

											i++;

											$.each( idCidades, function ( key, value ) {


												$( '<span>' + i + '.' + value.nome + ' &nbsp;&nbsp;</span>' ).appendTo( div );

											} );
										}
									}
								} );
							} );
						}
					}
				} );
			}
		} );
	</script>

	<script>
		$( '.editar' ).on( 'click', function () {
			document.getElementById( 'rotaCidade' ).value = $( this ).data( 'rota' );
			var estado = document.getElementById( 'estadoCidade' ).value = $( this ).data( 'estado' );

			document.getElementById( 'id_rota' ).value = $( this ).data( 'id_rota' );
			document.getElementById( 'id_estado' ).value = $( this ).data( 'id_estado' );

			$( '#modalEditarCarro' ).modal( 'show' );

			listarCidades();

			function listarCidades() {

				$.ajax( {
					url: '/controller/controller_rota.php?acao=listarCidades&estado=' + estado,
					datatype: "json",
					success: function ( data ) {
						var cidades = JSON.parse( data );

						if ( cidades != null ) {

							var selectbox = $( '#selectCidades' );
							selectbox.find( 'option' ).remove();

							$.each( cidades, function ( key, value ) {

								console.log( value );

								$( '<option>' ).val( value.idCidade ).text( value.nome ).appendTo( selectbox );
							} );
						}
					}
				} );
			};
		} );
	</script>

	<!--- MODAL VISUALIZAR ROTAS -->
	<div id="ModalvisualizarCarro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="gridSystemModalLabel">
						<spam class="glyphicon glyphicon-road"></spam> Visualizar Rota</h1>
				</div>

				<form>
					<div class="modal-body">

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr font17">

								<span class="rota" id="demo"></span> - <strong><span class="estado" id="estadoo"></span></strong>.
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="cnpj">Cidades: &nbsp;</label>
								<span class="demo_cidades" id="demo_cidades"></span>
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

	<!--Modal Cidades-->
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
					<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="row">

							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-12 app-margimBotomCamposFomr">
								<label for="nome">
									<spam class="app-astericoRed">*</spam> Rota</label>

								<input type="hidden" class="form-control" name="idEstado" id="id_estado">
								<input type="hidden" class="form-control" name="idRota" id="id_rota">
								<input type="text" class="form-control" id="rotaCidade" name="rota" readonly>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 app-margimBotomCamposFomr">
								<label for="rg">Estado</label>

								<input type="text" class="estadoCidade form-control" id="estadoCidade" name="estado" readonly>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 app-margimBotomCamposFomr">
								<label for="rg">Cidades</label>

								<select name="idCidade" id="selectCidades" class="form-control" required>
									<option value=" ">Selecione a Cidade</option>
								</select>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="acao" value="gravarCidade" class="btn btn-info">Confirmar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>