<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$db_vale = new Vale();
$db_funcionario = new Funcionario();
$fornecedor = new Fornecedor();
$db_produto = new Produtos();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'cadastrar' ) {

	$vale = array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$res = count( $vale );

	if ( $res > 3 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_vale->create( $vale );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$vale = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$db_vale->update( $vale );

}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$db_vale->delete( $id = $_GET[ 'id' ] );
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
	<link rel="stylesheet" href="css/layout-pag-cadastro-produtos.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/ajustes-font.css">

	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.quick.search.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Vale</h1>
			</div>
		</div>
	</div>
	
<?php include'menu.php'?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Solicitação de Vale</h1>

				<button type="button" class="btn btn-info pull-right add" data-toggle="modal" 
				data-target="#myModal">
				<span><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Cadastrar Vale</span>
				</button>

				<p>Cadastro de Vale da Empresa.</p>
				<hr>

				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Solicitante</th>
								<th>Valor</th>
								<th>Data</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $i = 0;
								foreach($db_vale->readAll() as $key => $valueVale){$i++;
								foreach($db_funcionario->readLine($valueVale->id_funcionario) as $key => $valueFunc);
								$valoN = number_format( $valueVale->valor, 2, ',', '.' );
																													
								?>
								<td scope="row">
									<?=$i ?>
								</td>
								
								<td>
									<?=$valueFunc->nome ?>
								</td>
								
								<td >R$
									<?=$valoN ?>
								</td>
								
								<td>
									<?=$valueVale->data ?>
								</td>

								<td class="text-center">
									<button type="button" class="visualizar btn btn-success" 
									data-nome="<?=$valueFunc->nome ?>" 
									data-valor="<?=$valoN ?>" 
									data-data="<?=$valueVale->data ?>">
									Visualizar</button>

									<button type="submit" class="editar btn btn-warning"  
									data-id_funcionario="<?=$valueVale->id_funcionario ?>" 
									data-id_vale="<?=$valueVale->id_vale ?>" 
									data-valor="<?=$valueVale->valor ?>" 
									data-data="<?=$valueVale->data ?>"> 
									Editar</button>

									<button type="button" class="excluir btn btn-danger"
									data-id_vale="<?= $valueVale->id_vale ?>" 
									data-nome="<?= $valueFunc->nome ?>" 
									data-valor="<?=$valoN?>">
									Excluir</button>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>

	<!--- MODAL DE CADASTRO VALE -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="gridSystemModalLabel">
						<spam class="glyphicon glyphicon-list-alt margimDireitaIcon"></spam> <strong>Cadastrar Vale</strong>
					</h3>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							
							
								
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="id_funcionario">
									<spam class="app-astericoRed">*</spam> Solicitante:</label>
								<select class="form-control" name="id_funcionario">
									<option value="" disabled selected>Selecione o Funcionario</option>
									<?php foreach($db_funcionario->readAll() as $key => $valueFuncionario){?>
									<option value="<?= $valueFuncionario->id_funcionario ?>">
										<?= $valueFuncionario->nome ?>
									</option>
									<?php } ?>
								</select>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomrp">
								<label for="valor">
									<spam class="app-astericoRed">*</spam> Valor:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor" class="form-control" placeholder="Valor Entrada" required>
								</div>
							</div>
							
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="data">
									<spam class="app-astericoRed">*</spam> Data:</label>
								<input type="date" name="data" class="form-control" required>
							</div>

						</div>
						
						<div>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="cadastrar" class="btn btn-info">Salvar</button>
					</div>
					
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--- MODAL DE VISUALIZAR VALE -->
	<div id="visualizar_vale" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							&nbsp; Visualizar Vale
						</strong>
      				</h4>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="nome"> Solicitante:</label>
								<input type="text" id="nome" class="myInput form-control mod" readonly>
							</div>

							

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomrp">
								<label for="valor"> Valor:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" id="valor" class="form-control mod" readonly>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="data"> Data:</label>
								<input class="form-control mod" id="data" readonly>
							</div>

							
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--- MODAL EDITAR PRODUTOS -->
	<div id="editar_vale" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="fa fa-pencil" aria-hidden="true"></i>
							&nbsp; Editar Vale
						</strong>
      				</h4>
				</div>
				
				
				
				<form method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-body">
						<div class="row">

						<input type="hidden" name="id_vale" id="idEdit">
						
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
								<label for="fornecedor"> Solicitante:</label>
								<select class="form-control" name="id_funcionario" id="idFuncionario">
								</select>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomrp">
								<label for="valor"> Valor:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor" id="valorEdit" class="form-control" placeholder="Valor Entrada">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
								<label for="data"> Data:</label>
								<input type="date" name="data" id="dataEdit" class="form-control">
								
							</div>
							
						</div>
						
						<div>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="acao" value="atualizar" class="btn btn-info">Confirmar</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!--Modal Excluir Produtos-->
	<div id="excluir_produto" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
							&nbsp; Excluir Vale
						</strong>
      				</h4>
				</div>
				
				<div class="modal-body">
					<strong><label class="laber-txt">Deseja excluir o Vale? </label></strong><br>
					De: <span class="nome app-span"></span> - R$ <span class="quantidade app-span"></span>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<a href="#" type="button" class="btn btn-info delete-yes">Confirmar</a>
				</div>
			</div>
		</div>
	</div>
<!-- /.modal -->

<script>
	$( '.visualizar' ).on( 'click', function () {

		document.getElementById( 'nome' ).value = $( this ).data( 'nome' );
		document.getElementById( 'valor' ).value = $( this ).data( 'valor' );
		document.getElementById( 'data' ).value = $( this ).data( 'data' );

		$( '#visualizar_vale' ).modal( 'show' );

	} );
</script>

<script>
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id_funcionario' );
		document.getElementById( 'idEdit' ).value = $( this ).data( 'id_vale' );
		document.getElementById( 'valorEdit' ).value = $( this ).data( 'valor' );
		document.getElementById( 'dataEdit' ).value = $( this ).data( 'data' );

		$( '#editar_vale' ).modal( 'show' );

		listarFuncionario();

		function listarFuncionario() {

			$.ajax( {
				type: "POST",
				url: 'controller/controller_vale.php?acao=listarFuncionario',
				datatype: "json",

				success: function ( data ) {
					var todosFuncionarios = JSON.parse( data );

					if ( todosFuncionarios != null ) {

						var selectbox = $( '#idFuncionario' );
						selectbox.find( 'option' ).remove();

						$.each( todosFuncionarios, function ( key, value ) {

							if ( value.id_funcionario == id ) {

								$( '<option selected>' ).val( value.id_funcionario ).text( value.nome ).appendTo( selectbox );
							} else {

								$( '<option>' ).val( value.id_funcionario ).text( value.nome ).appendTo( selectbox );
							};
						} );
					}
				}
			} );
		};
	} );
</script>

<script>
	$( '.excluir' ).on( 'click', function () {
		var id = $( this ).data( 'id_vale' );
		$( 'span.nome' ).text( $( this ).data( 'nome' ) );
		$( 'span.quantidade' ).text( $( this ).data( 'valor' ) );
		$( 'a.delete-yes' ).attr( 'href', 'vale.php?acao=excluir&id=' + id );
		$( '#excluir_produto' ).modal( 'show' );
	} );
</script>

<script src="js/bootstrap.min.js"></script>
</body>

</html>