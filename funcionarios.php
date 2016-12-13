<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Sistema de Vendas" content="">
<meta name="Cleydson Carvalho & Jhonatas de Oliveira" content="">
<link rel="icon" href="#">
<title>S.G.V</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout-pag-funcionarios.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/ajustes-font.css">
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.quick.search.js"></script>
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

<div class="container">
	<div class="row">
	
		
	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
		<h1>Funcionários</h1><p>Cadastro de funcionários da Empresa.</p><hr>
		<form>
		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-margimBotomCamposFomr">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" placeholder="Nome">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 app-margimBotomCamposFomr">
					<label for="cnpj">CNPJ</label>
					<input type="text" class="form-control" id="cnpj" placeholder="Digite seu CNPJ">
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 app-margimBotomCamposFomr">
					<label for="representante">Endereço</label>
					<input type="text" class="form-control" id="representante" placeholder="Digite o endreço. Ex: Rua, Avenida...">
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="bairro">Bairro</label>
					<input type="text" class="form-control" id="bairro" placeholder="Bairro">
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="numero">Numero</label>
					<input type="text" class="form-control" id="numero" placeholder="Numero">
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 app-margimBotomCamposFomr">
					<label for="numero">Região</label>
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
					<label for="representante">Representante</label>
					<input type="text" class="form-control" id="numero" placeholder="Nome do proprientário">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">Contato</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Fixo">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">Contato Movel</label>
					<input type="text" class="form-control" id="numero" placeholder="Telefone Movel">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 app-margimBotomCamposFomr">
					<label for="representante">E-mail</label>
					<input type="text" class="form-control" id="numero" placeholder="E-mail">
				</div>
				
				</div>
		
		
		
		
			
			<button type="submit" class="btn btn-primary btn-lg">Gravar Dados</button>
		</form><br><br><br><br>
		
		
		
				<h1 class="zerarMargimH">Funcionários Cadastrados</h1><p>Lista com todos os funcionários da empresa.</p><hr>
			<div class="form-group">
    <input type="text" class="form-control input-search" alt="lista-clientes" placeholder="Buscar na Lista">
  </div>		
<div class="table-responsive">
  
  <table class="table table-hover lista-clientes" id="tabela">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Estoque</th>
        <th>Valor C</th>
        <th>Valor V</th>
        <th>Ganho %</th>
        <th>Retorno</th>
        <th class="app-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">098</td>
        <td>Guarda Roupa 4 portas cinza</td>
        <td>2</td>
        <td>139,00</td>
        <td>222,40</td>
        <td>60%</td>
        <td>300,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
        	<a href="" onClick="return confirm('Deseja realmente deletar o produto!')">
			<button type="button" class="btn btn-danger">Excluir</button>
       		</a>
        </td>
      </tr>
       <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
        	<button type="button" class="btn btn-warning">Editar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      
             <tr>
        <td scope="row">79</td>
        <td>Espelho 2M</td>
        <td>2</td>
        <td>50,00</td>
        <td>120,00</td>
        <td>100%</td>
        <td>200,00</td>
        <td class="app-center">
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