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
<link rel="stylesheet" href="css/layout-pag-carros.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="app-h1-painel">Painel - Carros</h1>
		</div>
	</div>
</div>
<?php 
 include'menu.php';	
?>

<div class="container">
	<div class="row">
	
		
	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
		<h1>Carros</h1><p>Cadastro de carros da Empresa.</p><hr>
		<form>
		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="nome"><spam class="app-astericoRed">*</spam> Marca:</label>
					<input type="text" class="form-control" id="nome" placeholder="Digite a Marca">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="cnpj"><spam class="app-astericoRed">*</spam> Modelo:</label>
					<input type="text" class="form-control" id="cnpj" placeholder="Digite o Modelo">
				</div>
			
				<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante"><spam class="app-astericoRed">*</spam> Cor:</label>
					<input type="text" class="form-control" id="numero" placeholder="Digite o Cor">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante"><spam class="app-astericoRed">*</spam> Placa:</label>
					<input type="text" class="form-control" id="numero" placeholder="Digite a Placa">
				</div>
				
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
					<div><spam class="app-astericoRed">*</spam> <em>Preenchimento obrigatório.</em></div>
				</div>-
		

			<button type="submit" class="btn btn-primary btn-lg pull-right">Cadastrar</button>
		</form><br><br><br><br>
		
		
		
				<h1 class="zerarMargimH">Carros Cadastrados</h1><p>Lista com todos os carros da empresa.</p><hr>
			<div class="form-group">
    <input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
  </div>		
<div class="table-responsive">
  
  <table class="table table-hover table-striped lista-clientes" id="tabela">
    <thead>
      <tr>
        <th>Código</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Cor</th>
        <th>Placa</th>
        
        <th class="app-btn-acoes text-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      
       <tr>
        <td scope="row">1</td>
        <td>Fiat</td>
        <td>Palio Elx</td>
        <td>Branco</td>
        <td>MIN-4257</td>
        
        <td class="app-btn-acoes text-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
       <tr>
        <td scope="row">1</td>
        <td>Fiat</td>
        <td>Palio Elx</td>
        <td>Branco</td>
        <td>MIN-4257</td>
        
        <td class="app-btn-acoes text-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
       <tr>
        <td scope="row">1</td>
        <td>Fiat</td>
        <td>Palio Elx</td>
        <td>Branco</td>
        <td>MIN-4257</td>
        
        <td class="app-btn-acoes text-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
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