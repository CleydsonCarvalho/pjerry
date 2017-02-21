<?php

function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

$funcionario = new Funcionario();

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
		$funcionario->create( $criar );
	}
}

if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'atualizar' ) {

	$remover = array(
		$_POST[ 'acao' ],
	);
	
	$resultado = array_diff( $_POST, $remover );
	$atualizar = array_filter( $resultado );

	$funcionario->update( $atualizar );
	
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'excluir' ) {
	$funcionario->delete( $id = $_GET[ 'id' ] );
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
<link rel="stylesheet" href="css/layout-pag-funcionarios.css">
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
				<h1 class="app-h1-painel">Painel - Funcionários</h1>
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
				<h1>Cadastro Funcionário</h1>
				<p>Forneça Alguns Informações Sobre o Funcionário (a).</p>
				<hr>
				<form action="" name="" method="post" enctype="multipart/form-data" autocomplete="off">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome Completo:</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Digete o Nome Completo" required>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="rg">RG:</label>
							<input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="cpf">CPF:</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-8 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="endereco">Endereço e complemento:</label>
							<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="cidade">Ciade:</label>
							<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="regiao">Região:</label>
							<select class="form-control" name="regiao">
								<option>Selecionar</option>
								<option>Norte</option>
								<option>Sul</option>
								<option>Leste</option>
								<option>Centro</option>
								<option>Zona Rural</option>
								<option>Interior</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="estado">Estado:</label>
							<select class="form-control" name="estado">
								<option>PI</option>
								<option>MA</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 app-margimBotomCamposFomr">
							<label for="celular1">Celular 1:</label>
							<input type="text" class="form-control" id="celular1" name="celular1" placeholder="Primeiro contato">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 app-margimBotomCamposFomr">
							<label for="celular2">Celular 2:</label>
							<input type="text" class="form-control" id="celular2" name="celular2" placeholder="Segundo contato">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="funcao">
								<spam class="app-astericoRed">*</spam> Função</label>
							<select class="form-control" name="funcao" required>
								<option selected value="">Selecionar</option>
								<option value="Vendedor">Vendedor</option>
								<option value="Cobrador">Cobrador</option>
								<option value="Motorista">Motorista</option>
								<option value="Supervisor">Supervisor</option>
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

<!--Tabela Funcionarios-->
				<h1 class="zerarMargimH">Funcionários Cadastrados</h1>
				<p>Lista com todos os funcionários da empresa.</p>
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
								<th class="app-btn-acoes text-center"> Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach($funcionario->readAll() as $key => $value_funcionario){ ?>
								<td>
									<?=$value_funcionario->nome?>
								</td>
								<td>
									<?=$value_funcionario->celular1?>
								</td>
								<td>
									<?=$value_funcionario->celular2?>
								</td>

								<td class="app-btn-acoes">

									<button type="button" 
									data-nome="<?= $value_funcionario->nome ?>" 
									data-rg="<?= $value_funcionario->rg ?>" 
									data-cpf="<?= $value_funcionario->cpf ?>" 
									data-endereco="<?= $value_funcionario->endereco ?>" 
									data-bairro="<?= $value_funcionario->bairro ?>" 
									data-regiao="<?= $value_funcionario->regiao ?>" 
									data-cidade="<?= $value_funcionario->cidade ?>" 
									data-estado="<?= $value_funcionario->estado ?>" 
									data-funcao="<?= $value_funcionario->funcao ?>" 
									data-celular1="<?= $value_funcionario->celular1 ?>" 
									data-celular2="<?= $value_funcionario->celular2 ?>" 
									
									class="visualizar btn btn-success">Visualizar</button>

									<button type="button" 
									data-id="<?= $value_funcionario->id_funcionario ?>"
									data-nome="<?= $value_funcionario->nome ?>" 
									data-rg="<?= $value_funcionario->rg ?>" 
									data-cpf="<?= $value_funcionario->cpf ?>" 
									data-endereco="<?= $value_funcionario->endereco ?>" 
									data-bairro="<?= $value_funcionario->bairro ?>" 
									data-regiao="<?= $value_funcionario->regiao ?>" 
									data-cidade="<?= $value_funcionario->cidade ?>" 
									data-estado="<?= $value_funcionario->estado ?>" 
									data-funcao="<?= $value_funcionario->funcao ?>" 
									data-celular1="<?= $value_funcionario->celular1 ?>" 
									data-celular2="<?= $value_funcionario->celular2 ?>" 
									
									class="editar btn btn-warning">Editar</button>


									<button type="button" 
									data-id="<?= $value_funcionario->id_funcionario ?>" 
									data-nome="<?= $value_funcionario->nome ?>" 
									data-funcao="<?= $value_funcionario->funcao ?>" 
									
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
	
	
	<!--Modal Visualizar Funcionarios-->
	<div id="modalVisualizarFuncionario" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="custom modal-header">
					<h4 class="modal-title">
						<strong class="size-text">
							<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							&nbsp; Dados do Funcionário
						</strong>
					</h4>
				</div>
				<div class="modal-body esp">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margim-botton center">
							<strong class="nome nomeRed"></strong>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margim-botton">
							<label for="rg">RG: </label>
							<span class="rg"></span>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 margim-botton">
							<label for="cpf">CPF: </label>
							<span class="cpf"></span>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margim-botton">
							<label for="celular1">Celular 1: </label>
							<span class="celular1"></span>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margim-botton">
							<label for="celular2">Celular 2: </label>
							<span class="celular2"></span>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margim-botton">
							<label for="funcao">Função: </label>
							<span class="funcao"></span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 margim-botton">
							<label for="endereco">Endereço: </label>
							<span class="endereco"></span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 margim-botton">
							<label for="bairro">Bairro: </label>
							<span class="bairro"></span>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-5 col-lg-5 margim-botton">
							<label for="regiao">Região: </label>
							<span class="regiao"></span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 margim-botton">
							<label for="cidade">Ciade: </label>
							<span class="cidade"></span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 margim-botton">
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
	<div id="modalEditarFuncionario" class="modal fade" role="dialog">
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
	<input type="hidden" class="form-control" id="idEdit" name="id_funcionario">
							<input type="text" class="form-control" id="nomeEdit" name="nome" value="" placeholder="Digete o Nome Completo" required>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="rg">RG:</label>
							<input type="text" class="rdEdit form-control" id="rgEdit" name="rg" value="" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="cpf">CPF:</label>
							<input type="text" class="form-control" id="cpfEdit" name="cpf" value="" placeholder="Digite seu CPF">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="funcao">
								<spam class="app-astericoRed">*</spam> Função</label>
								
							<select class="form-control" name="funcao" >
								<option id="funcaoEdit" ></option>
								<option value="Vendedor">Vendedor</option>
								<option value="Cobrador">Cobrador</option>
								<option value="Motorista">Motorista</option>
								<option value="Supervisor">Supervisor</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-12 col-lg-12 app-margimBotomCamposFomr">
							<label for="endereco">Endereço e complemento:</label>
							<input type="text" class="form-control" id="enderecoEdit" name="endereco" value="" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" id="bairroEdit" name="bairro" value="" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 app-margimBotomCamposFomr">
							<label for="cidade">Ciade:</label>
							<input type="text" class="form-control" id="cidadeEdit" name="cidade" value="" placeholder="Cidade">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 app-margimBotomCamposFomr">
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
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="estado">Estado:</label>
							<select class="form-control" id="estadoEditSel" name="estado">
								<option id="estadoEdit"></option>
								<option>PI</option>
								<option>MA</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="celular1">Celular 1:</label>
							<input type="text" class="form-control" id="celular1Edit" name="celular1" value="" placeholder="Primeiro contato">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="celular2">Celular 2:</label>
							<input type="text" class="form-control" id="celular2Edit" name="celular2" value="" placeholder="Segundo contato">
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
	<div id="modalExcluirFuncionario" class="modal fade" role="dialog">
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
					<strong><label class="laber-txt">Deseja excluir <span class="funcao app-span"></span> (a) ? </label></strong><br>
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
		$( 'span.funcao' ).text( $( this ).data( 'funcao' ) );
		$( 'span.endereco' ).text( $( this ).data( 'endereco' ) );
		$( 'span.bairro' ).text( $( this ).data( 'bairro' ) );
		$( 'span.regiao' ).text( $( this ).data( 'regiao' ) );
		$( 'span.cidade' ).text( $( this ).data( 'cidade' ) );
		$( 'span.estado' ).text( $( this ).data( 'estado' ) );
		$( 'span.celular1' ).text( $( this ).data( 'celular1' ) );
		$( 'span.celular2' ).text( $( this ).data( 'celular2' ) );
		$( '#modalVisualizarFuncionario' ).modal( 'show' );
	} );
</script>

<script>
	
	
	$( '.editar' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		document.getElementById('nomeEdit').value = $( this ).data( 'nome' );
		document.getElementById('rgEdit').value = $( this ).data( 'rg' );
		document.getElementById('cpfEdit').value = $( this ).data( 'cpf' );
		document.getElementById('funcaoEdit').text = $( this ).data( 'funcao' );
		document.getElementById('enderecoEdit').value = $( this ).data( 'endereco' );
		document.getElementById('bairroEdit').value = $( this ).data( 'bairro' );
		document.getElementById('regiaoEdit').text = $( this ).data( 'regiao' );
		document.getElementById('cidadeEdit').value = $( this ).data( 'cidade' );
		document.getElementById('estadoEdit').text = $( this ).data( 'estado' );
		document.getElementById('celular1Edit').value = $( this ).data( 'celular1' );
		document.getElementById('celular2Edit').value = $( this ).data( 'celular2' );
		document.getElementById('idEdit').value = id;
		
		
		//$( 'editar-yes' ).attr('href', 'funcionarios.php?acao=atualizar&id='+id );
		$( '#modalEditarFuncionario' ).modal( 'show' );
	} );
</script>

<script>
	$( '.excluir' ).on( 'click', function () {
		var id = $( this ).data( 'id' );
		$( 'span.nome' ).text( $( this ).data( 'nome' ) );
		$( 'span.funcao' ).text( $( this ).data( 'funcao' ) );

		$( 'a.delete-yes' ).attr('href', 'funcionarios.php?acao=excluir&id='+id );
		$( '#modalExcluirFuncionario' ).modal( 'show' );
	} );
</script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>