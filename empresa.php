<?php 
function __autoload( $class_name ) {
	require_once 'classes/' . $class_name . '.php';
}

/* INTANCIANDO CLASS QUE VOU USAR */
$empresa = new Empresa();

	if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'gravar' ) {
		
		// CAMPOS NEGADOS
		$remover = array(
			$_POST[ 'acao' ],
		);
		// RETIRA DO ARRAY Os CAMPOS NEGADOS
		$resultado = array_diff( $_POST, $remover );
		$criar = array_filter($resultado);
		
		
		$res = count($criar);
		
		if($res > 10){
			
			$erro = 'sim';
			
		}else{
			
			$empresa->create($criar);
		}
		
		
		
		
	    //$users->testarForm($demo);
		

		var_dump($res);
		echo"<hr>";
		var_dump($_POST);
	
		
	
		
	
		
	}

	if ( isset( $_POST[ 'acao' ] ) && $_POST[ 'acao' ] == 'salvar' ) {

		//$buscaUsers = $users->readLine( $id = $_POST[ 'id' ] );
		
		// CAMPOS NEGADOS
		$remover = array(
			$_POST[ 'acao' ],
		);
		// RETIRA DO ARRAY Os CAMPOS NEGADOS
		$resultado = array_diff( $_POST, $remover );
		$atualizar = array_filter($resultado);
	    
	    $empresa->update($atualizar);
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
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
<link rel="icon" href="#">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-empresa.css">
<link rel="stylesheet" href="css/ajustes-font.css">

<title>Sistema de Vendas</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="app-h1-painel">Painel - Empresa</h1>
			</div>
		</div>
	</div>
	<?php 
 include'menu.php';	
?>

	<div class="container">
		<div class="row">
		
		<?php 
			if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == 'editar' ) {

				$buscaEmpresa = $empresa->readLine( $id = $_GET[ 'id' ] );

		?>
		<!-- Editar da Empresa-->
		<div class="col-lg-12">
				<h1>Editar Empresa</h1>
				<p>Forneça alguns informações sobre a Empresa.</p>
				<hr>
				<form  action="" name="" method="post" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" name="id" value="<?=$buscaEmpresa->id?>">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome da Empresa:</label>
							<input type="text" class="form-control" id="nome" name="nome" value="<?=$buscaEmpresa->nome?>" placeholder="Digite o nome da empresa" required>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="cnpj">CNPJ:</label>
							<input type="text" class="form-control" id="nome" name="cnpj" value="<?=$buscaEmpresa->cnpj?>" placeholder="Digite cnpj" required>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
							<label for="endereco">Endereço e complemento:</label>
							<input type="text" class="form-control" id="enderco" name="endereco" value="<?=$buscaEmpresa->endereco?>" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" id="bairro" name="bairro" value="<?=$buscaEmpresa->bairro?>" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Número:</label>
							<input type="text" class="form-control" id="numero" name="numero" value="<?=$buscaEmpresa->numero?>" placeholder="Numero">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Região:</label>
							<select class="form-control" name="regiao" required>
							
								<option selected value="value="<?=$buscaEmpresa->regiao?>""><?=$buscaEmpresa->regiao?></option>
								<option value="Norte">Norte</option>
								<option value="Sul">Sul</option>
								<option value="Leste">Leste</option>
								<option value="centro">Centro</option>
								<option value="Zona Rural">Zona Rural</option>
								<option value="Interior">Interior</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10 app-margimBotomCamposFomr">
							<label for="proprietario">Proprietário:</label>
							<input type="text" class="form-control" id="proprietario" name="proprietario" value="<?=$buscaEmpresa->proprietario?>" placeholder="Nome do proprientário">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="telefoneFixo">Telefone:</label>
							<input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" value="<?=$buscaEmpresa->telefoneFixo?>" placeholder="Telefone Fixo">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="telefoneCelular">Contato Movel:</label>
							<input type="text" class="form-control" id="numero" name="telefoneCelular" value="<?=$buscaEmpresa->telefoneCelular?>"  placeholder="Telefone Movel">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="email">E-mail:</label>
							<input type="text" class="form-control" id="email" name="email" value="<?=$buscaEmpresa->email?>" placeholder="E-mail">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
							<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>
						</div>
					</div>

					<button type="submit" name="acao" value="salvar" class="btn btn-primary btn-lg pull-right">Salvar</button>

				</form><br><br><br><br>
			</div>
				
		<?php }else{ ?>
		
		<!-- Cadastro da Empresa-->
			<div class="col-lg-12">
				<h1>Cadastrar Empresa</h1>
				<p>Forneça alguns informações sobre a Empresa.</p>
				<hr>
				<form  action="" name="" method="post" enctype="multipart/form-data" autocomplete="off">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
							<label for="nome">
								<spam class="app-astericoRed">*</spam> Nome da Empresa:</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da empresa" required>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
							<label for="cnpj">CNPJ:</label>
							<input type="text" class="form-control" id="nome" name="cnpj" placeholder="Digite cnpj" required>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
							<label for="endereco">Endereço e complemento:</label>
							<input type="text" class="form-control" id="enderco" name="endereco" placeholder="Digite o endreço. Ex: Rua, Avenida...">
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="bairro">Bairro:</label>
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Número:</label>
							<input type="text" class="form-control" id="numero" name="numero" placeholder="Numero">
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
							<label for="numero">Região:</label>
							<select class="form-control" name="regiao" required>
								<option selected value="">Selecione</option>
								<option value="Norte">Norte</option>
								<option value="Sul">Sul</option>
								<option value="Leste">Leste</option>
								<option value="centro">Centro</option>
								<option value="Zona Rural">Zona Rural</option>
								<option value="Interior">Interior</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10 app-margimBotomCamposFomr">
							<label for="proprietario">Proprietário:</label>
							<input type="text" class="form-control" id="proprietario" name="proprietario" placeholder="Nome do proprientário">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="telefoneFixo">Telefone:</label>
							<input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" placeholder="Telefone Fixo">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="telefoneCelular">Contato Movel:</label>
							<input type="text" class="form-control" id="numero" name="telefoneCelular" placeholder="Telefone Movel">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
							<label for="email">E-mail:</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
							<div>
								<spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em>
							</div>
						</div>
					</div>

					<button type="submit" name="acao" value="gravar" class="btn btn-primary btn-lg pull-right">Cadastrar</button>

				</form><br><br><br><br>
			</div>
							
	
		<?php } ?>
		
					<div class="col-lg-12">

				<h1 class="zerarMargimH">Informações Atuais</h1>
				<p>Dados Cadastrais da Empresa.</p>
				<hr>
				<?php foreach($empresa->readAll() as $key => $value_empresa){ ?>
				<address>
				<strong>Empresa</strong><br> 
				<em><h2 class="zerarMargimH"><?=$value_empresa->nome?></h2></em><br>
				<strong>Cidade:</strong> <em><?=$value_empresa->cidade?> - <?=$value_empresa->estado?></em><br>
				<strong>Endereço:</strong> <em><?=$value_empresa->endereco?></em><br>
				<strong>Bairro:</strong> <em><?=$value_empresa->bairro?></em> <em>Nº <?=$value_empresa->numero?></em>/<em>Sul</em><br>
				<strong>Contato Fixo:</strong> <em><?=$value_empresa->telefoneFixo?></em><br>
				<strong>Contato Movel:</strong> <em><?=$value_empresa->telefoneCelular?>/</em><br>
				<strong>E-mail:</strong> <em><?=$value_empresa->email?></em><br>
				</address>
			
				<address>
				<strong>Responsável</strong><br>
				<em><?=$value_empresa->proprietario?></em>
				</address>
			
				<a href="empresa.php?acao=editar&id=<?=$value_empresa->id?>">
				<button type="submit" class="btn btn-primary">Editar Informações</button><br><br><br>
				</a>
			</div>
			<?php } ?>
			
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>