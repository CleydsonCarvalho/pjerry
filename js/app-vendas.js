
angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngCurrencyMask']);

angular.module('app').controller('app-vendas', function ($scope, $http, $filter, $interval) {

	$scope.demo = "demo";
	$scope.produtos = [];
	$scope.status = false;
	$scope.subtotal = 0;
	$scope.entrada = 0;
	
	$scope.parcelaS = false;
	
	
	

	$scope.listarProdutos = function () {

		$http.post('/controller/controller_vendas.php?acao=listarProdutos')
			.then(function (produtos) {

				$scope.produtosOK = produtos.data;

			});
	};
	
	$scope.listarClientes = function () {

		$http.post('/controller/controller_clientes.php?acao=listarClientes')
			.then(function (clientes) {

				$scope.clientesOK = clientes.data;
			

		});
		
	};
	
	$scope.todosClientes = function(){
		
		$http.post('/controller/controller_clientes.php?acao=todosClientes')
			.then(function (clientes) {

				$scope.todosClientes = clientes.data;
			

		});
		
	};
	
	$scope.buscarVendedores = function () {
		
			$http.post('/controller/controller_vendas.php?acao=buscarVendedores')
			.then(function (funcionarios) {

			$scope.vendedores = funcionarios.data;
				console.log($scope.vendedores);
			

		});
		
	};
	
	$scope.SelecionarCliente = function (){
	
		$scope.clienteSelecionado = $scope.buscarCliente.nome;
		
		$scope.rotaSelecionado = $scope.buscarRota.nome;
		$scope.vendedorSelecionado = $scope.buscarVendedor.nome;
		$scope.status=true;
		
	};
	
	$scope.findCliente = function (){
	
		angular.forEach($scope.todosClientes, function(value, key){
      	if(value.nome==$scope.buscarCliente.nome){
			$scope.cpfCliente = value.cpf;
			
			$scope.statusCliente = value.status;
			
		
		
		};
  });
	};
	
	$scope.editarCliente = function (){
		$scope.status=false;
	};

	$scope.listarProduto = function (id) {
				
				
					
		$http.post('/controller/controller_vendas.php?acao=lerProduto&id=' + id)
			.then(function (produto) {

			
				var nome = produto.data[0].nome;
				var preco = produto.data[0].valor_venda;
				var quantidade = $scope.quantidade;
				var total = preco * quantidade;
				$scope.subtotal = $scope.subtotal + total; 
				$scope.sub_total = $scope.subtotal; 
				$scope.total = $scope.subtotal - $scope.entrada;

				var produto_add = {
					nome: nome,
					preco: preco,
					quantidade: quantidade,
					total: total
				};

				$scope.produtos.push(produto_add);
				$scope.buscarProduto = "";
				$scope.quantidade = 1;

			});
	};
	
	$scope.listarRotas = function () {

		$http.post('/controller/controller_rota.php?acao=lerRotas')
			.then(function (rotas) {

				$scope.rotas = rotas.data;
			
				

			});
	};
	
	$scope.apagar = function (produto){
		
	$scope.produtos.splice($scope.produtos.indexOf(produto), 1);
		
			};
	
	$scope.calcularTotal = function (){
			$scope.total = $scope.subtotal - $scope.entrada;
	};
	$scope.calcParcelas = function(){
		
		if($scope.select === undefined){
			$scope.parcelaS = false;
			
		}else{
			$scope.parcelaS = true;
			var valorParcelas = $scope.total / $scope.select;
			$scope.valorParcelas = valorParcelas.toFixed(2);
		

			
			
		}
		
	};
	
	$scope.listarClientes();
	$scope.listarProdutos();
	$scope.listarRotas();
	$scope.todosClientes();
	$scope.buscarVendedores();
	
	//$interval($scope.findCliente, 100, false);
	

});
