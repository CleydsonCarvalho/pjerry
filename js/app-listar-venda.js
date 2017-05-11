angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngCurrencyMask']);

angular.module('app').controller('openModal', function ($scope, $http, $uibModalInstance, $filter) {
	
	$scope.check = true;
	$scope.produtoAdicionar = false;
	$scope.statusAlert = false;
	$scope.setEdit = true;
	$scope.StPrest1 = false;

	$scope.pagamento = $scope.dadosModal.quantidade_parcelas;
	$scope.valor_prestacao = $filter('currency')(0, "R$ ");
	$scope.sub_total = $filter('currency')($scope.dadosModal.sub_total, "R$ ");
	$scope.entrada = $filter('currency')($scope.dadosModal.entrada, "R$ ");
	$scope.total = $filter('currency')($scope.dadosModal.total, "R$ ");
	$scope.valor_prestacao = $filter('currency')($scope.dadosModal.valor_prestacao, "R$ ");
	
	var d = new Date($scope.dadosModal.data_venda);
	var ano = d.getFullYear();
	var proxMes = d.getMonth();
	var dia = d.getDate()+1;

	//$scope.data_vendaE = new Date(ano, proxMes, dia);
	$scope.dadosModal.data_venda = new Date(ano, proxMes, dia);
		
	var anoM = d.getFullYear();
	var proxMesM = d.getMonth()+1;
	var diaM = d.getDate()+1;

	$scope.prestacao1Edit = new Date(anoM, proxMesM, diaM);

	$scope.data_venda = $filter('date')($scope.dadosModal.data_venda, "dd/MM/yyyy");



	$scope.nomeEdit = $scope.dadosModal.nome_cliente;
	$scope.vendedorEdit = $scope.dadosModal.nome_vendedor;
	$scope.dadosModal.id_rota = parseInt($scope.dadosModal.id_rota);
	

	var id = $scope.dadosModal.id_venda;

	$scope.pagamentoEdit = $scope.dadosModal.quantidade_parcelas;


	$scope.tipoPag = function (){

		if ($scope.dadosModal.quantidade_parcelas == 0){

			$scope.pagamento = "À Vista";

		}else{
			$scope.pagamento = $scope.dadosModal.quantidade_parcelas+'X';
		}
	}
		
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

				

				$scope.sub_total = $filter('currency')(produtoAtualizado.data.sub_total, "R$ ");

				$scope.valor_prestacao = $filter('currency')(produtoAtualizado.data.valor_prestacao.toFixed(2), "R$ ");

				$scope.total = $filter('currency')(produtoAtualizado.data.total.toFixed(2), "R$ ");

					$scope.buscarVendidos();

					console.log(produtoAtualizado.data);
			});

    	
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
				


				$scope.sub_total = $filter('currency')(produtoAtualizado.data.sub_total, "R$ ");

				$scope.valor_prestacao = $filter('currency')(produtoAtualizado.data.valor_prestacao.toFixed(2), "R$ ");

				$scope.total = $filter('currency')(produtoAtualizado.data.total.toFixed(2), "R$ ");

					

					console.log(produtoAtualizado.data.sub_total);



				
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
		.then(function (vendaSearch) {

			
		
				$scope.sub_total = $filter('currency')(vendaSearch.data.sub_total, "R$ ");

				$scope.valor_prestacao = $filter('currency')(vendaSearch.data.valor_prestacao.toFixed(2), "R$ ");

				$scope.total = $filter('currency')(vendaSearch.data.total.toFixed(2), "R$ ");

					$scope.buscarVendidos();

					console.log(vendaSearch.data);
		
		});	
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
			}

			else{

				var total = produtoFind.data.valor_venda * add.quantidade;
				var produto = {id_venda: $scope.dadosModal.id_venda, 
							   id_produto: produtoFind.data.id_produto,
						       valor_produto: produtoFind.data.valor_venda,
						       quantidade: add.quantidade,
						       total_produto: total 
						  	   }


			$http.post('/controller/controller_listar-vendas.php?acao=adicionarProduto', produto)
			.then(function (produtoAdd) {
					
					$scope.sub_total = $filter('currency')(produtoAdd.data.sub_total, "R$ ");

					$scope.valor_prestacao = $filter('currency')(produtoAdd.data.valor_prestacao.toFixed(2), "R$ ");

					$scope.total = $filter('currency')(produtoAdd.data.total.toFixed(2), "R$ ");

					$scope.buscarVendidos();

					console.log(produtoAdd.data);
				});	
			}
		});

		$scope.statusAlert = false;	
		$scope.check = true;
		$scope.produtoAdicionar = false;	
	}

	$scope.closeAlert = function () {

		$scope.statusAlert = false;
	}

	$scope.deletar = function(){

		$http.get('/controller/controller_listar-vendas.php?acao=deletarVenda&id='+id)
		.then(function (vendaDeletada) {

			$scope.listarVendas();
			$scope.cancel();
			console.log(vendaDeletada.data);


		});
	}

	$scope.editarVenda = function (){

		$scope.setEdit = !$scope.setEdit;
		

		console.log('entrou');
	}

	$scope.salvarVenda = function (nomeEdit){

		$scope.setEdit = !$scope.setEdit;
		$scope.data_venda = $filter ('date')($scope.dadosModal.data_venda, 'dd/MM/yyyy')

		console.log($scope.dadosModal.nome_cliente);
	}

	$scope.listarClientes = function () {

		$http.post('/controller/controller_clientes.php?acao=listarClientes')
			.then(function (clientes) {

				$scope.clientesOK = clientes.data;
			});
	};

	$scope.buscarVendedores = function () {
		
		$http.post('/controller/controller_vendas.php?acao=buscarVendedores')
			.then(function (funcionarios) {

				$scope.vendedores = funcionarios.data;

			});
	};

	$scope.listarRotas = function () {

		$http.post('/controller/controller_rota.php?acao=lerRotas')
			.then(function (rotas) {

				$scope.rotas = rotas.data;
			});
	};

	$scope.set1Prest = function (pag, data_vendaE){



		switch (parseInt(pag)) {

		 case 0:
		    $scope.prestacao1Edit = "";
		    $scope.prestacao2 = "";
		    $scope.prestacao3 = "";

		    console.log(pag);
		    break;

		  
		  case 1:

		  	var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+1;
			var dia = d.getDate();
			var prest1update = new Date(ano, proxMes, dia);

			$scope.prestacao1Edit = prest1update;
			$scope.prestacao2 = '---';
		    $scope.prestacao3 = '---';
			console.log(prest1update);
		    break;
		  
		  case 2:

		  	var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+1;
			var dia = d.getDate();
			var prest1update = new Date(ano, proxMes, dia);

			var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+2;
			var dia = d.getDate();
			var prest2update = new Date(ano, proxMes, dia);

		  	$scope.prestacao1Edit = prest1update;
		  	$scope.prestacao2 = $filter('date')(prest2update, "dd/MM/yyyy");
		    $scope.prestacao3 = '---';
		  	console.log(prest2update);
		    break;
		  
		   case 3:

		    var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+1;
			var dia = d.getDate();
			var prest1update = new Date(ano, proxMes, dia);

			var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+2;
			var dia = d.getDate();
			var prest2update = new Date(ano, proxMes, dia);

			var d = new Date(data_vendaE);
			var ano = d.getFullYear();
			var proxMes = d.getMonth()+3;
			var dia = d.getDate();
			var prest3update = new Date(ano, proxMes, dia);

		  	$scope.prestacao1Edit = prest1update;
		  	$scope.prestacao2 = $filter('date')(prest2update, "dd/MM/yyyy");
		  	$scope.prestacao3 = $filter('date')(prest3update, "dd/MM/yyyy");
		  	console.log(pag);
		    break;
		  
		}
	}

	$scope.update1Prest = function (pag, dataPrest1){

			var d = new Date(dataPrest1);
			var ano = d.getFullYear();
			var proxMes = d.getMonth();
			var dia = d.getDate();
		 switch (parseInt(pag)) {

		 case 0:
		 	$scope.calcPrestacao(pag, dataPrest1);
		 	$scope.StPrest1 = true;
		 	$scope.entradaEdit = $filter('currency')(0, "R$ ");
		 	$scope.total = $filter('currency')($scope.sub_total, "R$ ");

		    $scope.prest1 = '---';
		    $scope.prestacao2 = '---';
		    $scope.prestacao3 = '---';

		   // console.log(pag);
		    break;

		  
		  case 1:

		  	$scope.StPrest1 = false;
		  	$scope.calcPrestacao(pag, dataPrest1);
		  	
			var prest1update = new Date(ano, proxMes, dia);

			$scope.prestacao1Edit = prest1update;
			$scope.prestacao2 = '---';
		    $scope.prestacao3 = '---';
			console.log(pag);
		    break;
		  
		  case 2:

		  	$scope.StPrest1 = false;
		  	$scope.calcPrestacao(pag, dataPrest1);

		  
			var prest1update = new Date(ano, proxMes, dia);
			var prest2update = new Date(ano, proxMes+1, dia);

		  	$scope.prestacao1Edit = prest1update;
		  	$scope.prestacao2 = $filter('date')(prest2update, "dd/MM/yyyy");
		    $scope.prestacao3 = '---';
		  	console.log(pag);
		    break;
		  
		   case 3:
		   $scope.calcPrestacao(pag, dataPrest1);

		   	$scope.StPrest1 = false;

	
			var prest1update = new Date(ano, proxMes, dia);

		
			var prest2update = new Date(ano, proxMes+1, dia);

		
			var prest3update = new Date(ano, proxMes+2, dia);

		  	$scope.prestacao1Edit = prest1update;
		  	$scope.prestacao2 = $filter('date')(prest2update, "dd/MM/yyyy");
		  	$scope.prestacao3 = $filter('date')(prest3update, "dd/MM/yyyy");
		  	console.log(pag);
		    break;
		  
		 }
	}

	$scope.setPrestacao = function (){
		switch (parseInt($scope.dadosModal.quantidade_parcelas)) {

		  case 1:
		    $scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = '---';
		    $scope.prestacao3 = '---';
		    break;
		  case 2:
		  	$scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
		    $scope.prestacao3 = '---';
		    break;

		    case 3:
		    $scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
		    $scope.prestacao3 = $filter('date')($scope.dadosModal.data_prestacao3, "dd/MM/yyyy");
		    break;
		  
		}
	}

	$scope.calcPrestacao = function (pagamentoEdit, data_vendaE){

		if (pagamentoEdit == parseInt(0)){
			//$scope.pagamentoEdit = 0;
			//console.log(pagamentoEdit);
			var valor_prestacao = 0;
			$scope.valor_prestacao = $filter('currency')(valor_prestacao, "R$ ")

			console.log('passou 0');
		}

		else{

			var valor_prestacao = $scope.dadosModal.total / pagamentoEdit;
			$scope.valor_prestacao = $filter('currency')(valor_prestacao, "R$ ");
			//console.log($scope.valor_prestacao);
			console.log('passou valor');

		}	
	}

	$scope.calcEntrada = function (entradaEdit, pagamentoEdit){

		if( entradaEdit == "" || entradaEdit == 0){

			$scope.entradaEdit = "0";

		
			



			console.log('passou aqui');
		}

		if(entradaEdit < parseFloat($scope.dadosModal.sub_total)){

			var updateTotal = parseFloat($scope.dadosModal.sub_total) - entradaEdit
			

				
				$scope.dadosModal.total = updateTotal;
				$scope.total = $filter('currency')(updateTotal, "R$ ");	
			$scope.calcPrestacao (pagamentoEdit);
			//console.log(parseInt($scope.dadosModal.sub_total));

		}
		else{
			// Colocar para emitir uma alerta

			console.log('Não pode inserir esse valor');
		}

		$scope.entrada = $filter ('currency')(entradaEdit, 'R$ ');
	}

	$scope.updatePrestacao = function (){
		
		switch (parseInt($scope.dadosModal.quantidade_parcelas)) {

		  case 1:
		    $scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = '---';
		    $scope.prestacao3 = '---';
		    break;
		  case 2:
		  	$scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
		    $scope.prestacao3 = '---';
		    break;

		    case 3:
		    $scope.prestacao1 = $filter('date')($scope.dadosModal.data_prestacao1, "dd/MM/yyyy");
		    $scope.prestacao2 = $filter('date')($scope.dadosModal.data_prestacao2, "dd/MM/yyyy");
		    $scope.prestacao3 = $filter('date')($scope.dadosModal.data_prestacao3, "dd/MM/yyyy");
		    break;
		  
		}
	}

	$scope.popup1prest = function () {
		$scope.popupPrest.opened = true;
	  }

	$scope.popupPrest = {
		opened: false
	 
	 }

	$scope.setNomeRota = function (rota){

		angular.forEach($scope.rotas, function (value, key) {
			if (value.idRota == rota) {

				$scope.dadosModal.nome_rota = value.nome;

				console.log('Essa é a '+value.nome);
			};
		});
		

		
	}


	$scope.tipoPag ();
    $scope.setPrestacao ();
	$scope.listarClientes();
	$scope.buscarVendedores();
	$scope.listarRotas();
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

	////////////////////////// Modal Editar //////////////////////////////////

	$scope.excluir = function (venda) {

		$scope.dadosModal = venda;
		$uibModal.open({
			animation: true,
			templateUrl: 'excluirModal.html',
			controller: 'openModal',
			scope: $scope,
			 size: 'md'

		});
	};

	/*****************************************************************************/
});
