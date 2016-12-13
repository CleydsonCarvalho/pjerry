<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>S.G.V</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/layout-pag-empresa.css">
<link rel="stylesheet" href="css/ajustes-font.css">

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
	
		
	
		<div class="col-lg-12">
			
		<h1>Cadastro Empresa</h1><p>Forneça Alguns Informações Sobre a Empresa.</p><hr>
		<form>
		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
					<label for="nome"><spam class="app-astericoRede">*</spam> Nomeda Empresa:</label>
					<input type="text" class="form-control" id="nome" placeholder="Nome" required title="This field should not be left blank.">
					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
					<label for="cnpj">CNPJ:</label>
					<input type="text" class="form-control" id="cnpj" placeholder="Digite seu CNPJ">
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
					<label for="representante">Endereço:</label>
					<input type="text" class="form-control" id="representante" placeholder="Digite o endreço. Ex: Rua, Avenida...">
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="bairro">Bairro:</label>
					<input type="text" class="form-control" id="bairro" placeholder="Bairro">
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="numero">Número:</label>
					<input type="text" class="form-control" id="numero" placeholder="Numero">
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="numero">Região:</label>
						<select class="form-control">
							<option>Região</option>
							<option>Norte</option>
							<option>Sul</option>
							<option>Leste</option>
							<option>Oeste</option>
							<option>Centro</option>
						</select>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10 app-margimBotomCamposFomr">
					<label for="representante">Proprietário:</label>
					<input type="text" class="form-control" id="numero" placeholder="Nome do proprientário">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">Telefone:</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Fixo">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">Contato Movel:</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Movel">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">E-mail:</label>
					<input type="text" class="form-control" id="numero" placeholder="E-mail">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
					<div><spam class="app-astericoRede">*</spam> <em>Preenchimento obrigatório.</em></div>
				</div>
					
				</div>

			<button type="submit" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
		</form><br><br><br><br>
		
				<h1 class="zerarMargimH">Informações Atuais</h1><p>Dados Cadastrais da Empresa.</p><hr>
				<address>
				<strong>Empresa</strong><br> 
				<em><h2 class="zerarMargimH">Comercial Super Jerry</h2></em><br>
				<strong>Cidade:</strong> <em>Teresina - PI</em><br>
				<strong>Endereço:</strong> <em>Avenida Airton Sena</em><br>
				<strong>Bairro:</strong> <em>Porto Alegre</em> <em>Nº 3456</em>/<em>Sul</em><br>
				<strong>Contato Fixo:</strong> <em>(86) 3219-2345</em><br>
				<strong>Contato Movel:</strong> <em>(86) 9999-4378</em><br>
				<strong>E-mail:</strong> <em>comercialsuper2jerry.com.br</em><br>
				</address>

				<address>
				<strong>Responsável</strong><br>
				<em>Jerry Maia Sena</em>
				</address>
				
					<button type="submit" class="btn btn-primary">Editar Informações</button><br><br><br>
				
		
		</div>
	</div>
</div>
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>