angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngCurrencyMask']);

angular.module('app').controller('openModal', function($scope, $uibModalInstance) {

  $scope.cadastrar = function() {
    console.log('cadastrando');
  };

  $scope.cancel = function() {
    $uibModalInstance.dismiss('cancel');
  };
});

angular.module('app').controller('app-vendas', function ($scope, $http, $filter, $interval,  $uibModal) {

	$scope.produtos = [];
	$scope.status = false;
	$scope.subtotal = 0;
	$scope.entrada = 0;
	$scope.parcelaS = false;
	$scope.entradaStatus = false;
	$scope.statusAlert = false;
	$scope.sBuscProd = true;
	$scope.statusSelect = true;
	$scope.btStatus = true;
	$scope.valorParcelas = 0;
	$scope.parcela = '';


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

	$scope.todosClientes = function () {

		$http.post('/controller/controller_clientes.php?acao=todosClientes')
			.then(function (clientes) {

				$scope.todosClientes = clientes.data;
			});

	};

	$scope.buscarVendedores = function () {

	$http.post('/controller/controller_vendas.php?acao=buscarVendedores')
			.then(function (funcionarios) {

				$scope.vendedores = funcionarios.data;

			});
	};

	$scope.SelecionarCliente = function () {

		$scope.clienteSelecionado = $scope.buscarCliente.nome;
		$scope.rotaSelecionado = $scope.buscarRota.nome;
		$scope.vendedorSelecionado = $scope.buscarVendedor.nome;
		$scope.status = true;
		$scope.sBuscProd = false;

	};

	$scope.findCliente = function () {

		angular.forEach($scope.todosClientes, function (value, key) {
			if (value.nome == $scope.buscarCliente.nome) {

				$scope.cpfCliente = value.cpf;
				$scope.statusCliente = value.status;
				$scope.id_cliente = value.id;
			};
		});
	};

	$scope.findVendedor = function () {

		angular.forEach($scope.vendedores, function (value, key) {
			if (value.nome == $scope.buscarVendedor.nome) {

				$scope.id_vendedor = value.id_funcionario;
			};
		});
	};

	$scope.findRota = function () {

		$scope.id_rota = $scope.buscarRota;
	};

	$scope.editarCliente = function () {
		$scope.status = false;
	};

	$scope.listarProduto = function (id) {

		$http.post('/controller/controller_vendas.php?acao=lerProduto&id=' + id)
			.then(function (produto) {

				$scope.nome = produto.data[0].nome;
				$scope.preco = produto.data[0].valor_venda;
				$scope.quantidade_produto = produto.data[0].quantidade;

				if (parseInt($scope.quantidade_produto) >= parseInt($scope.quantidade)) {

					
					var total = $scope.preco * $scope.quantidade;
					$scope.subtotal = $scope.subtotal + total;
					$scope.sub_total = $scope.subtotal;
					$scope.total = $scope.subtotal - $scope.entrada;

					var produto_add = {
						id_produto: id,
						nome: $scope.nome,
						preco: $scope.preco,
						quantidade: $scope.quantidade,
						total: total
					};

					$scope.statusAlert = false;
					$scope.produtos.push(produto_add);
					$scope.buscarProduto = "";
					$scope.quantidade = 1;

				} else {

					$scope.statusAlert = true;
					$scope.buscarProduto = "";
					$scope.quant = $scope.quantidade;
					$scope.quantidade = 1;

				}
			$scope.statusSelect = false;

			});
	};

	$scope.listarRotas = function () {

		$http.post('/controller/controller_rota.php?acao=lerRotas')
			.then(function (rotas) {

				$scope.rotas = rotas.data;
			});
	};

	$scope.apagar = function (produto) {

		$scope.produtos.splice($scope.produtos.indexOf(produto), 1);

	};

	$scope.calcularTotal = function () {
		$scope.total = $scope.subtotal - $scope.entrada;
		var valorParcelas = $scope.total / $scope.parcelas;
		$scope.valorParcelas = valorParcelas.toFixed(2);
	};

	$scope.calcParcelas = function () {

		if ($scope.parcelas === "0") {
			$scope.parcelaS = false;
			$scope.entradaStatus = false;
			$scope.modPag = "À Vista";
			$scope.entrada = 0;
			$scope.total = $scope.sub_total;

		} else {
			$scope.parcelaS = true;
			$scope.entradaStatus = true;
			$scope.modPag = "Parcelado";
			var valorParcelas = $scope.total / $scope.parcelas;
			$scope.valorParcelas = valorParcelas.toFixed(2);
		}
		
		if($scope.parcelas !== undefined){
			$scope.btStatus = false;
			
		}
		$scope.quantidade_parcelas();

	};

	$scope.quantidade_parcelas = function () {
		var data = $filter('date')($scope.data_venc, "yyyy-MM-dd");
		var vezes = $scope.parcelas;

		$http.post('/controller/controller_vendas.php?acao=calcularParcelas&&parcelas=' + vezes + '&&data=' + data)
			.then(function (parcelas) {

				$scope.parcela = parcelas.data;

			});
	};

	$scope.finalizarVenda = function () {

		$scope.venda_add = {
			id_cliente: $scope.id_cliente,
			id_vendedor: $scope.id_vendedor,
			data_venda: $filter('date')($scope.dataVenda, "yyyy-MM-dd"),
			id_rota: $scope.id_rota,
			sub_total: $scope.sub_total,
			entrada: $scope.entrada,
			total: $scope.total,
			modo_pagamento: $scope.modPag,

			quantidade_parcelas: $scope.parcelas,
			valor_prestacao: $scope.valorParcelas,
			data_prestacao1: $scope.parcela[0],
			data_prestacao2: $scope.parcela[1],
			data_prestacao3: $scope.parcela[2],
			data_prestacao4: $scope.parcela[3],
			data_prestacao5: $scope.parcela[4],
			data_prestacao6: $scope.parcela[5]

		};





		$http.post('/controller/controller_vendas.php?acao=cadastrarVenda', $scope.venda_add)
			.then(function (id_venda) {

				$scope.id_venda = id_venda.data.id_venda;


				$http.post('/controller/controller_vendas.php?acao=cadastrarProdutos&id_venda=' + $scope.id_venda, $scope.produtos)
					.then(function (produtos) {

						$scope.produtosmeu = produtos.data;

location.reload(); 
					});

			});
		

	};

	$scope.closeAlert = function () {
		$scope.statusAlert = false;
	};


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

		
	////////////////////////// Modal Cadastro //////////////////////////////////
		
    $scope.abrirModal = function () {
       $uibModal.open({
          animation: true,
          templateUrl: 'cadastroModal.html',
          controller: 'openModal'
     
        });
    };
	
	/*****************************************************************************/
		
	$scope.dataHoje();
	$scope.setDate();
	$scope.listarClientes();
	$scope.listarProdutos();
	$scope.listarRotas();
	$scope.todosClientes();
	$scope.buscarVendedores();

	//$interval($scope.findCliente, 100, false);

});





