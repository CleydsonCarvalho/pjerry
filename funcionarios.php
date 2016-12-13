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
<link rel="stylesheet" href="css/layout-pag-funcionarios.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="app-h1-painel">Painel - Funcionário</h1>
		</div>
	</div>
</div>
<?php 
 include'menu.php';	
?>

<div class="container">
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
		<h1>Cadastro Funcionário</h1><p>Forneça Alguns Informações Sobre o Funcionário (a).</p><hr>
		<form>
		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 app-margimBotomCamposFomr">
					<label for="nome"><spam class="app-astericoRed">*</spam> Nome Completo:</label>
					<input type="text" class="form-control" id="nome" placeholder="Digete o Nome Completo">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="cnpj">RG:</label>
					<input type="text" class="form-control" id="cnpj" placeholder="Digite seu CPF">
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="cnpj">CPF:</label>
					<input type="text" class="form-control" id="cnpj" placeholder="Digite seu CPF">
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
					<label for="numero">Numero:</label>
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
				
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 app-margimBotomCamposFomr">
					<label for="representante">Celular 1:</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Fixo">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 app-margimBotomCamposFomr">
					<label for="representante">Celular 2:</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Movel">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">E-mail</label>
					<input type="text" class="form-control" id="numero" placeholder="E-mail">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
					<div><spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em></div>
				</div>
		
				</div>
				
		
		
		
		
			
			<button type="submit" class="btn btn-primary btn-lg pull-right">Gravar Dados</button>
		</form><br><br><br><br>
		
		
		
				<h1 class="zerarMargimH">Funcionários Cadastrados</h1><p>Lista com todos os funcionários da empresa.</p><hr>
			<div class="form-group">
    <input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
  </div>		
<div class="table-responsive">
  
  <table class="table table-hover lista-clientes" id="tabela">
    <thead>
      <tr>
       
        <th>Nome</th>
        <th>Telefone 1</th>
        <th>Telefone 2</th>
        
        <th >Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td>Ana Maria Pereira Leal Nunes</td>
        <td>86 98814-4785</td>
        <td>86 99514-8652</td>
        
        <td>
        	<button type="button" class="btn btn-success">Visualizar</button>
        	<button type="button" class="btn btn-warning">Editar</button>
        	<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
			<button type="button" class="btn btn-danger">Excluir</button>
       		</a>
        </td>
      </tr>
      
      </tr>
    </tbody>
  </table>
</div>
			
		</div>
				
		
		</div>
	</div>
</div>

<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>