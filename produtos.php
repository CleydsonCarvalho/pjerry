<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$fornecedor = new Fornecedor();
$db_produto = new Produtos();

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'cadastrar' ) {

	$produto = array_diff( $_POST, array( $_POST[ 'acao' ] ) );
	$res = count( $produto );

	if ( $res > 7 ) {

		$erro = 'Alteração Campos do Formulario';

	} else {

		$db_produto->create( $produto );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$produto = array_diff( $_POST, array( $_POST[ 'acao' ] ) );

	$db_produto->update( $produto );

}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$db_produto->delete( $id = $_GET[ 'id' ] );
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
				<h1 class="app-h1-painel">Painel - Produtos</h1>
			</div>
		</div>
	</div>
	
<?php include'menu.php'?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Produtos</h1>

				<button type="button" class="btn btn-info pull-right add" data-toggle="modal" 
				data-target="#myModal">
				<span><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Novo Produto</span>
				</button>

				<p>Cadastro de produtos da Empresa.</p>
				<hr>

				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Nome</th>
								<th class="text-center">Quant.</th>
								<th>Valor C</th>
								<th>Valor V</th>
								<th>Valor P</th>
								<th class="text-center">Lucro %</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $i = 0;
								foreach($db_produto->readAll() as $key => $valueProdutos){$i++;
								$v_compra = $valueProdutos->valor_compra;
								$v_vista = $valueProdutos->valor_venda; 
								$v_prazo = $valueProdutos->valor_prazo;									  
								$p_lucro = 0; 
								$p2_lucro = 0;

								while($v_compra + (($p_lucro / 100) * $v_compra) < $v_vista){
								 $p_lucro = $p_lucro + 0.1;
									$lucro1 = round($p_lucro, 1);
								}

								while($v_compra + (($p2_lucro / 100) * $v_compra) < $v_prazo){
								 $p2_lucro = $p2_lucro + 0.1;
									$lucro2 = round($p2_lucro, 1);
								}																					  
								?>
								<td scope="row">
									<?=$i ?>
								</td>
								
								<td>
									<?=$valueProdutos->nome ?>
								</td>
								
								<td class="text-center">
									<?=$valueProdutos->quantidade ?>
								</td>
								
								<td>R$
									<?=$valueProdutos->valor_compra ?>
								</td>
								
								<td>R$
									<?=$valueProdutos->valor_venda ?>
								</td>
								
								<td>R$
									<?=$valueProdutos->valor_prazo ?>
								</td>
								
								<td class="text-center">
									<?=$lucro1. "%";?> à
									<?=$lucro2. "%";?>
								</td>

								<td class="text-center">
									<button type="button" class="visualizar btn btn-success" 
									data-produto="<?=$valueProdutos->nome ?>" 
									data-marca="<?=$valueProdutos->marca ?>" 
									data-quantidade="<?=$valueProdutos->quantidade ?>" 
									data-id_fornecedor="<?=$valueProdutos->id_fornecedor ?>" 
									data-valor_compra="<?=$valueProdutos->valor_compra ?>" 
									data-valor_venda="<?=$valueProdutos->valor_venda ?>" 
									data-valor_prazo="<?=$valueProdutos->valor_prazo ?>">
									Visualizar</button>

									<button type="submit" class="editar btn btn-warning" 
									data-id_produto="<?=$valueProdutos->id_produto ?>" 
									data-nome="<?=$valueProdutos->nome ?>" 
									data-marca="<?=$valueProdutos->marca ?>" 
									data-quantidade="<?=$valueProdutos->quantidade ?>" 
									data-id_fornecedor="<?=$valueProdutos->id_fornecedor ?>" 
									data-valor_compra="<?=$valueProdutos->valor_compra ?>" 
									data-valor_venda="<?=$valueProdutos->valor_venda ?>" 
									data-valor_prazo="<?=$valueProdutos->valor_prazo ?>">
									Editar</button>

									<button type="button" class="excluir btn btn-danger"
									data-id_produto="<?= $valueProdutos->id_produto ?>" 
									data-nome="<?= $valueProdutos->nome ?>" 
									data-quantidade="<?=$valueProdutos->quantidade?>">
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

	<!--- MODAL DE CADASTRO DE PRODUTOS -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="gridSystemModalLabel">
						<spam class="fa fa-product-hunt margimDireitaIcon"></spam> <strong>Novo Produto</strong>
					</h3>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 app-margimBotomCamposFomr">
								<label for="nome">
									<spam class="app-astericoRed">*</spam> Nome do Produdo:</label>
								<input type="text" name="nome" class="myInput form-control" placeholder="Nome do Produto" required>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 app-margimBotomCamposFomr">
								<label for="marca">Marca:</label>
								<input type="text" name="marca" class="form-control" placeholder="Marca do Produto">
							</div>
							
							<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="quantidade">
									<spam class="app-astericoRed">*</spam> Quantidade:</label>
								<input type="text" name="quantidade" class="form-control" placeholder="Quantidade de Produtos" required>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-8 col-lg-8 app-margimBotomCamposFomr">
								<label for="fornecedor">Fornecedor:</label>
								<select class="form-control" name="id_fornecedor">
									<option>Selecione o Fornecedor</option>
									<?php foreach($fornecedor->readAll() as $key => $valueFornecedor){?>
									<option value="<?= $valueFornecedor->id_fornecedor ?>">
										<?= $valueFornecedor->nome ?>
									</option>
									<?php } ?>
								</select>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomrp">
								<label for="valor compra">
									<spam class="app-astericoRed">*</spam> Valor compra:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_compra" class="form-control" placeholder="Valor Entrada" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor venda">
									<spam class="app-astericoRed">*</spam> Valor venda:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_venda" class="form-control" placeholder="Valor a Vista" required>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor prazo">
									<spam class="app-astericoRed">*</spam> Valor a prazo:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_prazo" class="form-control" placeholder="Valor Prazo" required>
								</div>
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

	<!--- MODAL DE VISUALIZAR PRODUTOS -->
	<div id="visualizar_produto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">
							<span class="fa fa-product-hunt" aria-hidden="true"></span>&nbsp; <strong> Visualizar Produto</strong>
      				</h3>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 app-margimBotomCamposFomr">
								<label for="nome">Nome do Produdo:</label>
								<input type="text" name="nome" id="nome" class="myInput form-control mod" readonly>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 app-margimBotomCamposFomr">
								<label for="marca">Marca:</label>
								<input type="text" name="marca" id="marca" class="form-control mod" readonly>
							</div>
							
							<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="quantidade">Quantidade:</label>
								<input type="text" name="quantidade" id="quantidade" class="form-control mod" readonly>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-8 col-lg-8 app-margimBotomCamposFomr">
								<label for="fornecedor">Fornecedor:</label>
								<input class="form-control mod" id="id_fornecedor" readonly>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomrp">
								<label for="valor compra">Valor compra:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor_compra" id="valor_compra" class="form-control mod" readonly>
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor venda">Valor venda:</label>
								<div class="input-group mod">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor_venda" id="valor_venda" class="form-control mod" readonly>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor prazo">Valor a prazo:</label>
								<div class="input-group">
									<span class="input-group-addon mod">R$</span>
									<input type="text" name="valor_prazo" id="valor_prazo" class="form-control mod" readonly>
								</div>
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
	<div id="editar_produto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="fa fa-product-hunt" aria-hidden="true"></i>
							&nbsp; Editar Produto
						</strong>
      				</h4>
				</div>
				
				<form method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-body">
						<div class="row">
						
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 app-margimBotomCamposFomr">
								<label for="nome">
									<spam class="app-astericoRed">*</spam> Nome do Produdo:</label>
								<input type="hidden" name="id_produto" id="id_edit">
								<input type="text" name="nome" id="nome_edit" class="myInput form-control" placeholder="Nome do Produto">
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 app-margimBotomCamposFomr">
								<label for="marca">Marca:</label>
								<input type="text" name="marca" id="marca_edit" class="form-control" placeholder="Marca do Produto">
							</div>
							
							<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="quantidade">
									<spam class="app-astericoRed">*</spam> Quantidade:</label>
								<input type="text" name="quantidade" id="quantidade_edit" class="form-control" placeholder="Quantidade de Produtos">
							</div>

							<div class="col-xs-12 col-sm-4 col-md-8 col-lg-8 app-margimBotomCamposFomr">
								<label for="fornecedor">Fornecedor:</label>
								<select class="form-control" name="id_fornecedor" id="idFornecedor">
								</select>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomrp">
								<label for="valor compra">
									<spam class="app-astericoRed">*</spam> Valor compra:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_compra" id="compra_edit" class="form-control" placeholder="Valor Entrada">
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor venda">
									<spam class="app-astericoRed">*</spam> Valor venda:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_venda" id="venda_edit" class="form-control" placeholder="Valor a Vista">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 app-margimBotomCamposFomr">
								<label for="valor prazo">
									<spam class="app-astericoRed">*</spam> Valor a prazo:</label>
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" name="valor_prazo" id="prazo_edit" class="form-control" placeholder="Numero">
								</div>
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
							&nbsp; Excluir Produto
						</strong>
      				</h4>
				</div>
				
				<div class="modal-body">
					<strong><label class="laber-txt">Deseja excluir o Produto ? </label></strong><br>
					<span class="nome app-span"></span> - <span class="quantidade app-span"></span> unidades.
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

		var id_fornc = $( this ).data( 'id_fornecedor' );
		document.getElementById( 'nome' ).value = $( this ).data( 'produto' );
		document.getElementById( 'marca' ).value = $( this ).data( 'marca' );
		document.getElementById( 'quantidade' ).value = $( this ).data( 'quantidade' );
		document.getElementById( 'valor_compra' ).value = $( this ).data( 'valor_compra' );
		document.getElementById( 'valor_venda' ).value = $( this ).data( 'valor_venda' );
		document.getElementById( 'valor_prazo' ).value = $( this ).data( 'valor_prazo' );

		$( '#visualizar_produto' ).modal( 'show' );

		listar_fornecedor();

		function listar_fornecedor() {

			$.ajax( {
				type: "POST",
				url: 'controller/controller_produtos.php?acao=listarFornecedor&id_fornecedor=' + id_fornc,
				datatype: "json",
				success: function ( data ) {

					var fornecedor = JSON.parse( data );

					$.each( fornecedor, function ( key, value ) {
						document.getElementById( 'id_fornecedor' ).value = value.nome;
					} );
				}
			} );
		}
	} );
</script>

<script>
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id_fornecedor' );
		document.getElementById( 'id_edit' ).value = $( this ).data( 'id_produto' );
		document.getElementById( 'nome_edit' ).value = $( this ).data( 'nome' );
		document.getElementById( 'marca_edit' ).value = $( this ).data( 'marca' );
		document.getElementById( 'quantidade_edit' ).value = $( this ).data( 'quantidade' );
		document.getElementById( 'compra_edit' ).value = $( this ).data( 'valor_compra' );
		document.getElementById( 'venda_edit' ).value = $( this ).data( 'valor_venda' );
		document.getElementById( 'prazo_edit' ).value = $( this ).data( 'valor_prazo' );

		$( '#editar_produto' ).modal( 'show' );

		listarFornecedor();

		function listarFornecedor() {

			$.ajax( {
				type: "POST",
				url: 'controller/controller_produtos.php?acao=listarTodos',
				datatype: "json",

				success: function ( data ) {
					var todosFornecedor = JSON.parse( data );

					if ( todosFornecedor != null ) {

						var selectbox = $( '#idFornecedor' );
						selectbox.find( 'option' ).remove();

						$.each( todosFornecedor, function ( key, value ) {

							if ( value.id_fornecedor == id ) {

								$( '<option selected>' ).val( value.id_fornecedor ).text( value.nome ).appendTo( selectbox );
							} else {

								$( '<option>' ).val( value.id_fornecedor ).text( value.nome ).appendTo( selectbox );
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
		var id = $( this ).data( 'id_produto' );
		$( 'span.nome' ).text( $( this ).data( 'nome' ) );
		$( 'span.quantidade' ).text( $( this ).data( 'quantidade' ) );
		$( 'a.delete-yes' ).attr( 'href', 'produtos.php?acao=excluir&id=' + id );
		$( '#excluir_produto' ).modal( 'show' );
	} );
</script>

<script src="js/bootstrap.min.js"></script>
</body>

</html>