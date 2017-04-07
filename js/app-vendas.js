
angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap']);
angular.module('app').controller('app-vendas', function ($scope, $http, $filter) {


	$scope.produtos = [];

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
	
		console.log("ok");
	};
	
	$scope.SelecionarCliente = function (){
	
		$scope.clienteSelecionado = $scope.buscarCliente.nome;
		$scope.status=true;
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
				
				var add = {
					nome: nome,
					preco: preco,
					quantidade: quantidade,
					total: total
				};

				$scope.produtos.push(add);
				$scope.buscarProduto = "";
				$scope.quantidade = 1;

			});
	};
	
	$scope.apagar = function (produto){
		
	$scope.produtos.splice($scope.produtos.indexOf(produto), 1);
		
			};
	
	$scope.listarClientes();
	$scope.listarProdutos();

});
