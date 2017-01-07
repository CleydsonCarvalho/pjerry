<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$cliente = new Cliente();

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
		$cliente->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$cliente->update( $atualizar );
	 header("Location: clientes.php");
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$cliente->delete( $id = $_GET[ 'id' ] );
}
?>
<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
<link rel="icon" href="#">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout-pag-cliente.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/ajustes-font.css">

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<title>Sistema de Vendas</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Clientes</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>
<!--Cadastro-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Cadastro Cliente</h1>
				<p>Forneça Alguns Informações Sobre o Novo Cliente.</p>
				<hr>
			<form method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome Completo:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do cliente" required>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="cnpj">RG:</label>
							<input type="text" class="form-control" name="rg" id="rg" placeholder="RG do cliente">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="cnpj">CPF:</label>
							<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF do cliente">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="representante">Endereço:</label>
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Cidade:</label>
							<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Região:</label>
							<select class="form-control" name="regiao" id="regiao">
								<option>Selecionar</option>
								<option>Norte</option>
								<option>Sul</option>
								<option>Leste</option>
								<option>Centro</option>
								<option>Zona Rural</option>
								<option>Interior</option>
							</select>
						</div>
						
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="estado">Estado:</label>
							<select class="form-control" name="estado">
								<option>PI</option>
								<option>MA</option>
							</select>
						</div>

						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="representante">Contato 1:</label>
							<input type="text" class="form-control" name="contato1" id="contato1" placeholder="Telefone 1">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="representante">Contato 2:</label>
							<input type="text" class="form-control" name="contato2" id="contato2" placeholder="Telefone 2">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="representante">Referência:</label>
							<input type="text" class="form-control" name="referencia" id="referencia" placeholder="Contato de Referência">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero" >Status:</label>
							<select class="form-control" name="status" id="status">
								<option>Ativo</option>
								<option>Negativado</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>
						</div>
					</div>
					
					<button type="submit" name="acao" value="cadastrar" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
				</form><br><br><br><br>

			
			<!--Tabela de Clientes-->
				<h1 class="zerarMargimH">Clientes Cadastrados</h1>
				<p>Lista com todos os clientes da empresa.</p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Telefone 1</th>
								<th>Telefone 2</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach($cliente->readAll() as $key => $value_cliente){ ?>
								
								<td>
									<?=$value_cliente->nome?>
								</td>
								<td>
									<?=$value_cliente->contato1?>
								</td>
								<td>
									<?=$value_cliente->contato2?>
								</td>

								<td class="app-btn-acoes">

									<button type="button" 
									data-nome="<?= $value_cliente->nome ?>" 
									data-rg="<?= $value_cliente->rg ?>" 
									data-cpf="<?= $value_cliente->cpf ?>" 
									data-endereco="<?= $value_cliente->endereco ?>" 
									data-bairro="<?= $value_cliente->bairro ?>" 
									data-regiao="<?= $value_cliente->regiao ?>" 
									data-cidade="<?= $value_cliente->cidade ?>" 
									data-estado="<?= $value_cliente->estado ?>" 
									data-contato1="<?= $value_cliente->contato1 ?>" 
									data-contato2="<?= $value_cliente->contato2 ?>" 
									data-referencia="<?= $value_cliente->referencia ?>" 
									data-status="<?= $value_cliente->status ?>" 
									
									class="visualizar btn btn-success">Visualizar</button>

									<button type="button" 
									data-id="<?= $value_cliente->id ?>"
									data-nome="<?= $value_cliente->nome ?>" 
									data-rg="<?= $value_cliente->rg ?>" 
									data-cpf="<?= $value_cliente->cpf ?>" 
									data-status="<?= $value_cliente->status ?>" 
									data-contato1="<?=$value_cliente->contato1 ?>"
									data-contato2="<?=$value_cliente->contato2 ?>"  
									data-referencia="<?= $value_cliente->referencia ?>" 
									data-endereco="<?= $value_cliente->endereco ?>" 
									data-bairro="<?= $value_cliente->bairro ?>" 
									data-cidade="<?= $value_cliente->cidade ?>" 
									data-regiao="<?= $value_cliente->regiao ?>" 
									data-estado="<?= $value_cliente->estado ?>"
									
									class="editar btn btn-warning">Editar</button>
									
									<button type="button" 
									data-id="<?= $value_cliente->id ?>" 
									data-nome="<?= $value_cliente->nome ?>" 
									
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
	
	
	<!--Modal Visualizar Cliente-->
	<div id="modalVisualizarCliente" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<h4 class="modal-title">
						<strong class="size-text">
							<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							&nbsp; Dados do Cliente
						</strong>
					</h4>
				</div>
				<div class="modal-body esp">
					<div class="row">
						<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 margim-botton center">
							<strong class="nome nomeRed"></strong>
						</div>
						
						
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 margim-botton">
							<label for="rg">RG: </label>
							<span class="rg"></span>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 margim-botton">
							<label for="cpf">CPF: </label>
							<span class="cpf"></span>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 margim-botton">
							<label for="status">Status: </label>
							<span class="status"></span>
						</div>
						
						
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 margim-botton">
							<label for="contato1">Contato 1: </label>
							<span class="contato1"></span>
						</div>
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 margim-botton">
							<label for="contato2">Contato 2: </label>
							<span class="contato2"></span>
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margim-botton">
							<label for="referencia">Referência: </label>
							<span class="referencia"></span>
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margim-botton">
							<label for="endereco">Endereço: </label>
							<span class="endereco"></span>
						</div>
						
						
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margim-botton">
							<label for="bairro">Bairro: </label>
							<span class="bairro"></span>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margim-botton">
							<label for="regiao">Região: </label>
							<span class="regiao"></span>
						</div>
						
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margim-botton">
							<label for="cidade">Ciade: </label>
							<span class="cidade"></span>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margim-botton">
							<label for="estado">Estado: </label>
							<span class="estado"></span>
						</div>
						
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--Modal Editar Funcionarios-->
	<div id="modalEditarCliente" class="modal fade" role="dialog">
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

	<!--Modal Excluir Funcionarios-->
	<div id="modalExcluirCliente" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
							&nbsp; Excluir Funcionário
						</strong>
      				</h4>
				</div>
				<div class="modal-body">
					<strong><label class="laber-txt">Deseja excluir o cliente(a) ? </label></strong><br>
					<span class="nome app-span"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<a href="#" type="button" class="btn btn-info delete-yes">Confirmar</a>
				</div>
			</div>
		</div>
	</div>
	
<script>
$( '.visualizar' ).on( 'click', function () {
	$( 'strong.nome' ).text( $( this ).data( 'nome' ) );
	$( 'span.rg' ).text( $( this ).data( 'rg' ) );
	$( 'span.cpf' ).text( $( this ).data( 'cpf' ) );
	$( 'span.status' ).text( $( this ).data( 'status' ) );
	$( 'span.contato1' ).text( $( this ).data( 'contato1' ) );
	$( 'span.contato2' ).text( $( this ).data( 'contato2' ) );
	$( 'span.referencia' ).text( $( this ).data( 'referencia' ) );
	$( 'span.endereco' ).text( $( this ).data( 'endereco' ) );
	$( 'span.bairro' ).text( $( this ).data( 'bairro' ) );
	$( 'span.regiao' ).text( $( this ).data( 'regiao' ) );
	$( 'span.cidade' ).text( $( this ).data( 'cidade' ) );
	$( 'span.estado' ).text( $( this ).data( 'estado' ) );
	$( '#modalVisualizarCliente' ).modal( 'show' );
} );
</script>

<script>
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		document.getElementById('nomeEdit').value = $( this ).data( 'nome' );
		document.getElementById('rgEdit').value = $( this ).data( 'rg' );
		document.getElementById('cpfEdit').value = $( this ).data( 'cpf' );
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
		$( '#modalEditarCliente' ).modal( 'show' );
	} );
</script>

<script>
	$( '.excluir' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		$( 'span.nome' ).text( $( this ).data( 'nome' ) );
		$( 'span.funcao' ).text( $( this ).data( 'funcao' ) );

		$( 'a.delete-yes' ).attr('href', 'clientes.php?acao=excluir&id='+id );
		$( '#modalExcluirCliente' ).modal( 'show' );
	} );
</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>