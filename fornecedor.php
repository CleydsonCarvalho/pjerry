<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$fornecedor = new Fornecedor();

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
		$fornecedor->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);

	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$fornecedor->update( $atualizar );
	 header("Location: funcionarios.php");
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$fornecedor->delete( $id = $_GET[ 'id' ] );
}
?>

<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson & Jhonatas de Oliveira" content="">
<link rel="icon" href="#">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-fornecedor.css">
<link rel="stylesheet" href="css/ajustes-font.css">

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>

<title>Sistema de Vendas</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Fornecedor</h1>
			</div>
		</div>
	</div>

	<?php include'menu.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Fornecedor</h1>
				<p><em>Cadastro de fornecedor da Empresa.</em></p>
				<hr>
				
				
				<form method="post" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Empresa / nome:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da empresa ou o nome do fornecedor" required>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="cnpj">CNPJ / CPF:</label>
							<input type="text" class="form-control" name="cnpjCpf" id="cnpjCpf" placeholder="Digite o CNPJ ou CPF">
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
							<label for="representante">Endereço:</label>
							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
						</div>
						
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Região:</label>
							<select class="form-control" name="regiao">
								<option>Região</option>
								<option>Norte</option>
								<option>Sul</option>
								<option>Leste</option>
								<option>Centro</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotomCamposFomr">
							<label for="representante">Representante</label>
							<input type="text" class="form-control" name="representante" id="representante" placeholder="Nome do proprientário">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="representante">E-mail</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="representante">Contato Fixo</label>
							<input type="text" class="form-control" name="contatoFixo" id="contatoFixo" placeholder="Telefone Fixo">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="representante">Contato Movel</label>
							<input type="text" class="form-control" name="contatoMovel" id="contatoMovel" placeholder="Telefone Celular">
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12>
							<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
						</div>
					</div>
					
					<button type="submit" name="acao" value="cadastrar" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
				</form><br><br><br><br>

				<h1 class="zerarMargimH">Fornecedores Cadastrados</h1>
				<p><em>Lista com todos os fornecedores da empresa.</em></p>
				<hr>
				<div class="form-group">
					<input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped lista-clientes" id="tabela">
						<thead>
							<tr>
								<th>N°</th>
								<th>Fornecedor</th>
								<th>CNPJ / CPF</th>
								<th>Telefone</th>
								<th class="app-btn-acoes text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
						
							<tr>
							<?php $n=0; 
							foreach($fornecedor->readAll() as $key => $value_fornecedor){ $n++;?>
								<td><?=$n?></td>
								<td><?=$value_fornecedor->nome?></td>
								<td><?=$value_fornecedor->cnpjCpf?></td>
								<td><?=$value_fornecedor->contatoFixo?></td>
								
								<td class="app-btn-acoes">
								
									<button type="button" 
									data-nome="<?= $value_fornecedor->nome ?>" 
									data-cnpj="<?= $value_fornecedor->cnpjCpf ?>"
									data-endereco="<?= $value_fornecedor->endereco ?>" 
									data-bairro="<?= $value_fornecedor->bairro ?>" 
									data-regiao="<?= $value_fornecedor->regiao ?>" 
									data-representante="<?= $value_fornecedor->representante ?>" 
									data-email="<?= $value_fornecedor->email ?>" 
									data-contatofixo="<?= $value_fornecedor->contatoFixo ?>" 
									data-contatomovel="<?= $value_fornecedor->contatoMovel ?>"  
									
									class="visualizar btn btn-success">Visualizar</button>

									<button type="button" 
									data-id="<?= $value_fornecedor->id ?>"
									data-nome="<?= $value_fornecedor->nome ?>" 
									data-rg="<?= $value_fornecedor->cnpjCpf ?>" 
									data-cpf="<?= $value_fornecedor->endereco ?>" 
									data-endereco="<?= $value_fornecedor->bairro ?>" 
									data-bairro="<?= $value_fornecedor->regiao ?>" 
									data-regiao="<?= $value_fornecedor->representante ?>" 
									data-cidade="<?= $value_fornecedor->email ?>" 
									data-estado="<?= $value_fornecedor->contatoFixo ?>" 
									data-contato1="<?= $value_fornecedor->contatoMovel ?>"  
									
									class="editar btn btn-warning">Editar</button>
									
									<button type="button" 
									data-id="<?= $value_fornecedor->id ?>" 
									data-nome="<?= $value_fornecedor->nome ?>" 
									
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
	
	<!--Modal Visualizar Fornecedor-->
	<div id="modalVisualizarFornecedor" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<h4 class="modal-title">
      					<strong class="size-text">
							<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							&nbsp; Dados Fornecedor
						</strong>
      				</h4>
				</div>
				
				<div class="modal-body esp">
					<div class="row">
						
						<form enctype="multipart/form-data" >
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="nome">
								Empresa / nome:</label>
							<input type="text" class="form-control app-borda0" id="nomeV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="cnpj">CNPJ / CPF:</label>
							<input type="text" class="form-control app-borda0" id="cnpjCpfV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-margimBotomCamposFomr">
							<label for="representante">Endereço:</label>
							<input type="text" class="form-control app-borda0" id="enderecoV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control app-borda0" id="bairroV" readonly="true">
						</div>
						
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="numero">Região:</label>
							<input type="text" class="form-control app-borda0" id="regiaoV" readonly="true">

						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="numero">Estado:</label>
							<input type="text" class="form-control app-borda0" id="estadoV" value="Piauí" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="representante">Representante</label>
							<input type="text" class="form-control app-borda0" id="representanteV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="email">E-mail</label>
							<input type="text" class="form-control app-borda0" id="emailV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="representante">Contato Fixo</label>
							<input type="text" class="form-control app-borda0" id="contatoFixoV" readonly="true">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="representante">Contato Movel</label>
							<input type="text" class="form-control app-borda0" id="contatoMovelV" readonly="true">
						</div>
						
					</div>
					
				</form>
						
					</div>
					
					
					
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--Modal Editar Fornecedor-->
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
							<input type="text" class="form-control" readonly="true" id="cpfEdit" name="cpf" value="" placeholder="Digite seu CPF">
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

	<!--Modal Excluir Fornecedor-->
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
	document.getElementById('nomeV').value = $( this ).data( 'nome' );
	document.getElementById('cnpjCpfV').value = $( this ).data( 'cnpj' );
	document.getElementById('enderecoV').value = $( this ).data( 'endereco' );
	document.getElementById('bairroV').value = $( this ).data( 'bairro' );
	document.getElementById('regiaoV').value = $( this ).data( 'regiao' );
	document.getElementById('representanteV').value = $( this ).data( 'representante' );
	document.getElementById('emailV').value = $( this ).data( 'email' );
	document.getElementById('contatoFixoV').value = $( this ).data( 'contatofixo' );
	document.getElementById('contatoMovelV').value = $( this ).data( 'contatomovel' );
	
	$( '#modalVisualizarFornecedor' ).modal( 'show' );
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