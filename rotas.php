<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$rota = new Rota();
$relacao_rce = new Relacao_rce();
$estado = new Estados();
$cidade = new Cidade();

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
<html ng-app="rota">

<head>
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

</head>

<script>
	angular.module( "rota", [] );
	angular.module( "rota" ).controller( "controller", function ( $scope, $http ) {
		
		var reload = function () {
            window.location.reload(false); 
        };
		
		$scope.cadastar = function ($rota) {
			$http.post( '/controller/controller_rota.php', $rota )
				.then( function ( dados ) {
						$scope.statusCad = dados.data;
					console.log($scope.statusCad);
					} );
			reload ();
			};
		
		var listarEstado = function(){
			
			$http.get( '/controller/controller_rota.php?acao=listar' )
				.then( function ( dados ) {
						$scope.estados = dados.data;
						console.log($scope.estados);
					} );
			};
		listarEstado();
		}); 
										

	
</script>

<body ng-controller="controller">

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
							<input type="text" ng-model="rota.nome" class="form-control" placeholder="Nome da Rota" required>

							<input type="hidden" ng-model="rota.acao"  ng-init="rota.acao='cadastrar'" >
							
						</div>

						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="estado">
								<spam class="app-astericoRed">*</spam> Estado:</label>
							<select name="estado" ng-model="rota.idEstado"   class="form-control" 
							required>
								<option value="">Selecione o Estado</option>
								<option value="{{estados.idEstado}}" ng-repeat="estados in estados">{{estados.estado}}</option>
								
							</select>
						</div>
						<div>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>

					</div>


					<button type="submit" name="acao" ng-value="cadastrar" ng-click="cadastar(rota)" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
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
									<?php foreach($estado->readLine($value_rota->idEstado) as $key => $valueEstado): ?>
									<?php echo $valueEstado->estado; ?>

									<?php endforeach; ?>
								</td>

								<td>
									<input type="hidden" ng-model="idEstado" ng-init="idEstado='<?=$valueEstado->idEstado;?>'">
									<input type="hidden" ng-model="idRota" ng-init="idRota='<?=$value_rota->idRota?>'">


									<button type="button" data-nome="<?=$value_rota->nome?>" data-estado="<?=$value_rota->idRota?>" class="visualizar btn btn-success">Visualizar</button>

									<button type="button" data-rota="<?=$value_rota->nome?>" data-estado="<?=$valueEstado->estado?>" class="editar btn btn-warning">Cidades</button>
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
								<label for="cnpj">Cidades: </label> Teresina → Parnaiba → Piracura → Teresina → Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura,Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura, Teresina, Parnaiba, Piracura,
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

								<input type="hidden" class="form-control" name="idEstado" value="{{idEstado}}">
								<input type="hidden" class="form-control" name="idRota" value="{{idRota}}">


								<input type="text" class="form-control" id="rotaCidade" name="rota" value="" readonly>
							</div>


							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 app-margimBotomCamposFomr">
								<label for="rg">Estado</label>



								<input type="text" class="form-control" id="estadoCidade" name="estado" value="" readonly>


							</div>



							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 app-margimBotomCamposFomr">
								<label for="rg">Cidades</label>


								<?php $estadoForm = "Maranhão";?>
								<select name="idCidade" class="form-control" required>

									<option value=" ">Add Cidade</option>
									<?php foreach($cidade->buscaCidade($estadoForm) as $key => $valueCidade): ?>
									<option value="<?php echo $valueCidade->idCidade; ?>">
										<?php echo $valueCidade->nome; ?>
									</option>
									<?php endforeach; ?>


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






	<script>
		$( '.visualizar' ).on( 'click', function () {
			$( 'span.rota' ).text( $( this ).data( 'nome' ) );
			$( 'span.estado' ).text( $( this ).data( 'estado' ) );

			$( '#ModalvisualizarCarro' ).modal( 'show' );
		} );
	</script>

	<script>
		$( '.editar' ).on( 'click', function () {
			document.getElementById( 'rotaCidade' ).value = $( this ).data( 'rota' );
			document.getElementById( 'estadoCidade' ).value = $( this ).data( 'estado' );




			$( '#modalEditarCarro' ).modal( 'show' );
		} );
	</script>




	<script src="js/bootstrap.min.js"></script>
</body>

</html>