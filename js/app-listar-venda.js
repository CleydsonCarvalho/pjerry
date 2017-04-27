angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngCurrencyMask']);

angular.module('app').controller('openModal', function ($scope, $http, $uibModalInstance, $filter) {
	
	$scope.valor_prestacao = $filter('currency')(0, "R$ ");
	$scope.sub_total = $filter('currency')($scope.dadosModal.sub_total, "R$ ");
	$scope.entrada = $filter('currency')($scope.dadosModal.entrada, "R$ ");
	$scope.total = $filter('currency')($scope.dadosModal.total, "R$ ");
	$scope.valor_prestacao = $filter('currency')($scope.dadosModal.valor_prestacao, "R$ ");
	$scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
	$scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
	$scope.prestacao3 = $filter('date')($scope.dadosModal.data_prestacao3, "dd/MM/yyyy");
	
		
	var id = $scope.dadosModal.id_venda;
console.log(id);
	$scope.buscarVendidos = function () {

		$http.post('/controller/controller_listar-vendas.php?acao=buscarVendidos&id='+id)
			.then(function (vendidos) {

				$scope.vendidosOk = vendidos.data;

				

			});



		
	};
$scope.buscarVendidos();

	$scope.cadastrar = function () {
		console.log($scope.dadosModal);
	};

	$scope.cancel = function () {
		$uibModalInstance.dismiss('cancel');
	};
});

angular.module('app').controller('app-listar-vendas', function ($scope, $http, $filter, $uibModal) {



	$scope.listarVendas = function () {

		$http.post('/controller/controller_listar-vendas.php?acao=listarVendas')
			.then(function (vendas) {

				$scope.vendasOk = vendas.data;



			});



		
	};


$scope.imprimir = function (venda){
	
	console.log(venda);
	
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



});
