
angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap']);
angular.module('app').controller('app-vendas', function ($scope, $http, $filter) {


	$scope.produtos = [];

	$scope.listarProdutos = function () {

		$http.post('/controller/controller_vendas.php?acao=listarProdutos')
			.then(function (data) {

				$scope.produtosOK = data.data;

			});
	};

	$scope.listarProduto = function (id) {

		$http.post('/controller/controller_vendas.php?acao=lerProduto&id=' + id)
			.then(function (data) {

				var nome = data.data[0].nome;
				var preco = data.data[0].valor_venda;
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
	

	$scope.listarProdutos();

});
