angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngCurrencyMask']);

angular.module('app').controller('openModal', function ($scope, $http, $uibModalInstance, $filter) {
	
	$scope.check = true;
	$scope.produtoAdicionar = false;
	$scope.statusAlert = false;
	$scope.valor_prestacao = $filter('currency')(0, "R$ ");
	$scope.sub_total = $filter('currency')($scope.dadosModal.sub_total, "R$ ");
	$scope.entrada = $filter('currency')($scope.dadosModal.entrada, "R$ ");
	$scope.total = $filter('currency')($scope.dadosModal.total, "R$ ");
	$scope.valor_prestacao = $filter('currency')($scope.dadosModal.valor_prestacao, "R$ ");
	$scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
	$scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
	$scope.prestacao3 = $filter('date')($scope.dadosModal.data_prestacao3, "dd/MM/yyyy");

	var id = $scope.dadosModal.id_venda;

	$scope.listarProdutos = function () {

		$http.get('/controller/controller_listar-vendas.php?acao=listarProdutos')
			.then(function (produtos) {

			$scope.produtosOK = produtos.data;		
		});
	}; 	

	$scope.buscarVendidos = function () {

		$http.get('/controller/controller_listar-vendas.php?acao=buscarVendidos&id='+id)
			.then(function (vendidos) {

				$scope.vendidosOk = vendidos.data;
		});
	};

	$scope.atualizar = function (produto, index) {

		$scope.produtoUpdate = angular.copy(produto);
		$scope.produtoUpdate.produto_anterior = $scope.produtoUpdate.id_produto;
		$scope.produtoUpdate.quantidade_anterior = $scope.produtoUpdate.quantidade;
		$scope.nomeProduto = produto.nome_produto;
		$scope.quantidadeProduto = produto.quantidade;

      	$scope.index = index;
	};

    $scope.salvar = function(id) {

    	if (id  === undefined ){

    		$scope.produtoUpdate.total_produto = $scope.produtoUpdate.valor_produto * $scope.produtoUpdate.quantidade ;
    		
    		$http.post('/controller/controller_listar-vendas.php?acao=atualizarProduto&id='+$scope.produtoUpdate.id_vendidos, $scope.produtoUpdate )
				.then(function (produtoAtualizado) {

				$scope.produtoAtualizadoOK = produtoAtualizado.data;
				console.log($scope.produtoAtualizadoOK );	
			});

    		$scope.buscarVendidos();
			$scope.produtoUpdate = "";
			$scope.check = true;
    	}

    	else{
    		
    		$http.get('/controller/controller_listar-vendas.php?acao=lerProduto&id='+id)
			.then(function (produto) {

				$scope.produtoOK = produto.data[0];
				$scope.produtoUpdate.id_produto = $scope.produtoOK.id_produto;
				$scope.produtoUpdate.nome_produto = $scope.produtoOK.nome;
				$scope.produtoUpdate.valor_produto = $scope.produtoOK.valor_venda;
				$scope.produtoUpdate.total_produto = $scope.produtoOK.valor_venda * $scope.produtoUpdate.quantidade ;
				

				$http.post('/controller/controller_listar-vendas.php?acao=atualizarProduto&id='+$scope.produtoUpdate.id_vendidos, $scope.produtoUpdate )
				.then(function (produtoAtualizado) {

				$scope.produtoAtualizadoOK = produtoAtualizado.data;
				console.log($scope.produtoAtualizadoOK );
				
				});

				$scope.buscarVendidos();
				$scope.produtoUpdate = "";
				$scope.check = true;
			});
    	}
    }

    $scope.exitDiv = function (){
    	$scope.produtoUpdate = "";
    	$scope.check = true;	
    }

    $scope.exitAdd = function (){
    	
    	$scope.produtoAdicionar = false;	
    }


    $scope.setCheck = function (){

    	$scope.check = false;
    };

	$scope.cancel = function () {

		$uibModalInstance.dismiss('cancel');
	};

	$scope.deletarProduto = function (produto){

		$http.post('/controller/controller_listar-vendas.php?acao=deletarProduto&id='+produto.id_vendidos, produto)
		.then(function (produtoDeletado) {

			$scope.produtoDeletar = produto.id_vendidos;
			console.log(produtoDeletado.data );	
			$scope.buscarVendidos();
		});

		//console.log(produto);
	}

	$scope.adicionarProduto = function (){

		$scope.produtoAdicionar = true;
	}

	$scope.addProduto = function (add){

		$http.get('/controller/controller_listar-vendas.php?acao=lerProduto&id='+add.produto.id_produto)
		.then(function (produtoFind) {

			$scope.quantidadeProd = produtoFind.data.quantidade;
			var quantidadeForm = add.quantidade;

			if (parseInt(quantidadeForm) > parseInt($scope.quantidadeProd)){
				$scope.statusAlert = true;
			}else{
				console.log( 'Pode Adicionar' );	
			}

			
			
			//$scope.statusAlert = true;
		//console.log(add.produto);
		
		});

		
	}

	$scope.closeAlert = function () {

		$scope.statusAlert = false;
	};

	$scope.listarProdutos ();
	$scope.buscarVendidos();

});

angular.module('app').controller('app-listar-vendas', function ($scope, $http, $filter, $uibModal) {



	$scope.listarVendas = function () {

		$http.get('/controller/controller_listar-vendas.php?acao=listarVendas')
			.then(function (vendas) {

				$scope.vendasOk = vendas.data;
				

			});



		
	};



	
	
	$scope.listarVendas();






//location.reload();


	////////////////////////// Data Picker ////////////////////////////////////

	$scope.dataHoje = function () {
		$scope.dataVenda = new Date();
	};

	$scope.open1 = function () {
		$scope.popup1.opened = true;
	};

	$scope.open2 = function () {
		$scope.popup2.opened = true;
	};

	$scope.popup1 = {
		opened: false
	};

	$scope.popup2 = {
		opened: false
	};

	$scope.setDate = function () {
		var date = new Date();
		var ano = date.getFullYear();
		var proxMes = date.getMonth() + 1;
		var d = $scope.dataVenda;
		var dia = d.getDate();
		

		$scope.data_venc = new Date(ano, proxMes, dia);
	};

	/*****************************************************************************/

	////////////////////////// Modal Detalhes //////////////////////////////////

	$scope.detalhes = function (venda) {

		$scope.dadosModal = venda;
		$uibModal.open({
			animation: true,
			templateUrl: 'detalhesModal.html',
			controller: 'openModal',
			scope: $scope,
			 size: 'lg'

		});
	};

	/*****************************************************************************/


	////////////////////////// Modal Editar //////////////////////////////////

	$scope.editar = function (venda) {

		$scope.dadosModal = venda;
		$uibModal.open({
			animation: true,
			templateUrl: 'editarModal.html',
			controller: 'openModal',
			scope: $scope,
			 size: 'lg'

		});
	};

	/*****************************************************************************/












});
